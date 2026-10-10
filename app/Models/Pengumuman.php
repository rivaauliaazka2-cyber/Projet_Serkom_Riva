<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pengumuman extends Model
{
    use HasUuids;

    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status',
        'id_user'
    ];
}
