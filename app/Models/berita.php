<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;

class Berita extends Model
{
    use HasUuids;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_berita',
        'judul',
        'slug',
        'isi',
        'tanggal',
        'status',
        'gambar',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
