<?php

namespace App\Mahasiswa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_mahasiswa';
    protected $primaryKey = "npm";
    public $incrementing = false;
}
