<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole{
    protected $fillable = ['display_name', 'description'];
}