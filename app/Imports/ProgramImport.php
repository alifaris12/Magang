<?php

namespace App\Imports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Program([
            'tahun'    => $row['tahun'] ?? $row['Tahun'] ?? $row['TAHUN'] ?? null,
            'kategori' => $row['kategori'] ?? $row['Kategori'] ?? $row['KATEGORI'] ?? null,
            'skema'    => $row['skema'] ?? $row['Skema'] ?? $row['SKEMA'] ?? null,
            'judul'    => $row['judul'] ?? $row['Judul'] ?? $row['JUDUL'] ?? null,
            'ketua'    => $row['ketua'] ?? $row['Ketua'] ?? $row['KETUA'] ?? null,
            'anggota'  => $row['anggota'] ?? $row['Anggota'] ?? $row['ANGGOTA'] ?? null,
            'dana'     => isset($row['dana']) 
                            ? (int) preg_replace('/\D/', '', $row['dana']) 
                            : (isset($row['Dana']) ? (int) preg_replace('/\D/', '', $row['Dana']) : 0),
                            
        ]);
    }
}



