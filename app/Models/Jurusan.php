<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
        'id',
        'jurusan',
    ];

    public function studi()
    {
        return $this->hasMany(Studi::class);
    }

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
