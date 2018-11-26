<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisIndikator extends Model
{
    use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $table = 'tb_jenis_indikator';
    protected $primaryKey = 'id_jenis_indikator';
    protected $fillable = ['nm_jenis_indikator','ket'];
}
