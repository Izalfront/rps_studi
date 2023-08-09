<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;
use App\Models\Studi;

class Matkul extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'matkul';

    protected $fillable = [
        'matkul',
        'sks',
        'semester',
        'prodi_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function studi()
    {
        return $this->hasMany(Studi::class);
    }
}
