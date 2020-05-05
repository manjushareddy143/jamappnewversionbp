<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $name;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'users_roles');
    }
}
