<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission{
    protected $fillable = ['display_name', 'description'];
}