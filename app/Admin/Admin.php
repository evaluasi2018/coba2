<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';
    protected $guard = 'admin';
}
