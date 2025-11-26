<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    // Pastikan sesuai dengan nama tabel di database
    protected $table = 'programs';

    // Karena tabel kamu punya created_at & updated_at, tidak perlu matikan timestamps
    public $timestamps = true;

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'tahun',
        'kategori',
        'skema',
        'judul',
        'ketua',
        'anggota',
        'dana',
    ];
}
