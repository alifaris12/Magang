<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerjasama;
use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan Carbon diimpor
use Illuminate\Support\Facades\Log; // Pastikan Log diimpor

class ProgramKerjasamaController extends Controller
{
    public function show($id)
    {
        try {
            $program = ProgramKerjasama::findOrFail($id);

            // Log untuk memastikan data yang diterima
            Log::info('Program Kerjasama:', ['data' => $program]);

            return response()->json([
                'mitra_kerjasama' => $program->mitra_kerjasama,
                'tahun' => $program->tahun,
                'jangka_waktu' => $program->jangka_waktu,
                'tanggal_mulai' => Carbon::parse($program->tanggal_mulai)->format('d-m-Y'),
                'tanggal_selesai' => Carbon::parse($program->tanggal_selesai)->format('d-m-Y'),
                'tingkat' => $program->tingkat
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching program data: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function edit($id)
    {
        $program = ProgramKerjasama::findOrFail($id);

        // Kembalikan data untuk diisi dalam form edit
        return response()->json($program);
    }

    public function update(Request $request, $id)
    {
        $program = ProgramKerjasama::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('daftar.kerjasama.nasional')->with('success', 'Program Kerjasama berhasil diperbarui');
    }

    public function destroy($id)
    {
        $program = ProgramKerjasama::findOrFail($id);
        $program->delete();

        return redirect()->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil dihapus.');
    }
}