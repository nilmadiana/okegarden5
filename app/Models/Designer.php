<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;

    protected $table = 'tb_project';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_project', 'keterangan', 'status'];
}
