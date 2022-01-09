<?php

namespace App;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRolesAndPermissions; //new trait

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $table = "users";

    protected $fillable = [
        'first_name','last_name', 'email', 'password','image', 'gender', 'languages' ,'contact','type_id',
        'term_id', 'org_id', "social_signin", "google_id","facebook_id"
    ];


    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }
        /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role) 
    {
      return null !== $this->roles()->where('slug', $role)->first();
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() {
        return ucfirst($this->first_name) .' '. ucfirst($this->last_name);
    }

    public function services() {
        return $this->hasManyThrough(ProviderServiceMapping::class, services::class,
        'id' , 'user_id', 'id')->with('service')->with('categories');

        // return $this->services()->with('service');
    }

    public function orderAsCustomer() {
        return $this->hasMany(Booking::class, 'user_id' , 'id');
    }

    public function orersAsProvider() {
        return $this->hasMany(Booking::class, 'provider_id' , 'id');//->where('provider_id', 'id');
    }

    public function jobs() {
        return $this->hasMany(Booking::class, 'provider_id' , 'id');
        // $jobsCount =  $jobs->where()
        // return  $this->orersAsProvider()->selectRaw('COUNT(provider_id) AS jobs, provider_id');
        // ->whereHas('orersAsProvider', function (Builder $query) {
        //     $query->where('provider_id', '=', 'id');
        // });
    }

    public function providerDetail()
    {
        return $this->hasMany(ProviderServiceMapping::class, 'user_id', 'id');
    }


    public function experince() {
        return $this->hasMany(Experience::class, 'rate_to', 'id');
    }

    public function reviews() {
        return $this->hasMany(Experience::class, 'rate_to', 'id')->with('rate_by');
    }

    public function organisation() {
        return $this->hasOne(organisation::class, 'id', 'org_id');
    }

    public function rate()
    {
        return  $this->experince()->selectRaw('AVG(rating) as rate, rate_to,
        COUNT(rating) AS reviews')
        ->groupBy('rate_to');
    }

    public function type()
    {
        return $this->hasOne(UserTypes::class, 'id', 'type_id');
    }

    public function address() {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function customerAddress() {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    public function addressWithServiceRadius() {
        // $data = $this->provider();
        // printf($data);

        return $this->hasMany(Address::class, 'user_id', 'id')->with('checkRadius');
    }

    public function servicePrice() {
        return $this->hasOne(ProviderServiceMapping::class, 'user_id', 'id');
    }



    public function provider() {
        return $this->hasOne(ServiceProvider::class, 'user_id', 'id');
    }


    public function documents() {
        return $this->hasMany(Document::class, 'user_id', 'id');
    }



}
