<?php

namespace App\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'tb_saran';
    protected $fillable = ['id_jadwal_perkuliahan','npm','saran'];
    protected $primaryKey = 'id_saran';
}
