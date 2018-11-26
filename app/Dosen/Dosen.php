<?php

namespace App\Dosen;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Dosen extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_dosen';
    protected $guard = 'dosen';
    protected $primaryKey = "nip";
}
