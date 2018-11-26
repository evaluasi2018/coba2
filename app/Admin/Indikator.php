<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indikator extends Model
{
  	use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $table ='tb_indikator_penilaian';
    protected $primaryKey = 'id_indikator';
    protected $fillable = ['indikator','id_jenis_indikator'];
}
