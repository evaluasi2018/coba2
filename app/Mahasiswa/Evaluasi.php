<?php

namespace App\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $dates=['deleted_at'];
    protected $table = 'tb_evaluasi';
    protected $fillable = ['id_jadwal_perkuliahan','npm','id_indikator','nilai'];
    protected $primaryKey = 'id_evaluasi';
}
