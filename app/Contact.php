<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone_number'];

    public function Users(){
        return $this->belongsToMany(User::class);
    }
}
