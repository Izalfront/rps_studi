<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Matkul;

class Studi extends Model
{
    use HasFactory;

    protected $table = 'studi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jurusan_id',
        'prodi_id',
        'matkul_id',
        'semester',
        'status',
        'file',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function Matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id');
    }
}
