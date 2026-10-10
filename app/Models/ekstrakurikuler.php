<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ekstrakurikuler extends Model
{
    use HasUuids;

    protected $table = 'ekstrakurikuler';

    protected $primaryKey = 'id_ekskul';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar'
    ];
}
