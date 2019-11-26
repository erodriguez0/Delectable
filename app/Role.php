<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Roles can have many users
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
