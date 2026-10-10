<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Prestasi extends Model
{
    use HasUuids;

    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_prestasi',
        'nama_prestasi',
        'slug',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}
