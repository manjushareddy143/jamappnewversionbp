<?php

namespace App;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'term_id', 'org_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userservices() {
        return $this->hasManyThrough(services::class, ProviderServiceMapping::class, 'user_id' , 'id');
    }

    

//    public function servicesuser() {
//        return $this->hasMany('provider_service_mappings', 'service_id', 'id');
//    }


}
