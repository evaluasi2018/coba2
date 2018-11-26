<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PengaturanAdmin extends Model
{
    use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = ['nm_admin','username','password','deleted_at'];
}
