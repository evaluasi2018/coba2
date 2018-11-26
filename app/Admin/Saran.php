<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
	protected $dates=['deleted_at'];
    protected $table ='tb_saran';
    protected $primaryKey = 'id_indikator';
}
