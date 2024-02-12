<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'tanggal_lahir',
        'kelas_id',
        'alamat',
        'gender_id',
        'gambar'
    ];
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nis', 'like', '%' . $search . '%')
                ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('kelas_id', 'like', '%' . $search . '%')
                ->orWhere('gender_id', 'like', '%' . $search . '%');
        });
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
