<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProfilSekolah extends Model
{
    use HasUuids;

    protected $table = 'profil_sekolah';

    protected $primaryKey = 'id_profil';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
