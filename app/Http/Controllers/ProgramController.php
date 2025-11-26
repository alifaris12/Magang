<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramKerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProgramImport;

class ProgramController extends Controller
{
    /** ====================================================
     * INDEX: Daftar Program Penelitian & Pengabdian
     * ==================================================== */
    public function index(Request $request)
    {
        $query = Program::query();

        // Filter skema
        if ($request->filled('skema')) {
            $query->where('skema', $request->skema);
        }

        // Filter tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ketua', 'like', "%{$search}%")
                    ->orWhere('anggota', 'like', "%{$search}%");
            });
        }

        // Urutan default by created_at
        $table = (new Program)->getTable();
        $sortCol = Schema::hasColumn($table, 'created_at') ? 'created_at' : 'id';

        $programs = $query->orderByDesc($sortCol)->paginate(500);

        // Data unik untuk filter dropdown
        $skemas = Program::select('skema')->distinct()->pluck('skema');
        $tahuns = Program::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');

        return view('admin.program-daftar', compact('programs', 'skemas', 'tahuns'));
    }

    /** ====================================================
     * INDEX PROGRAM PENELITIAN
     * ==================================================== */
    public function indexPenelitian(Request $request)
    {
        $query = Program::where('kategori', 'penelitian');

        // Filter skema
        if ($request->filled('skema')) {
            $query->where('skema', $request->skema);
        }

        // Filter tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ketua', 'like', "%{$search}%")
                    ->orWhere('anggota', 'like', "%{$search}%");
            });
        }

        $programs = $query->orderByDesc('created_at')->paginate(50);

        return view('admin.program-penelitian', compact('programs'));
    }

    /** ====================================================
     * STORE: Simpan Program Baru
     * ==================================================== */
    public function store(Request $request)
    {
        $kategori = strtolower($request->input('kategori', 'penelitian'));

        /* =====================================================
         * 1️⃣ INPUT KERJASAMA → simpan ke tabel program_kerjasama
         * ===================================================== */
        if ($kategori === 'kerjasama') {
            $validated = $request->validate([
                'mitra_kerjasama' => 'required|string|max:200',
                'tahun'           => 'required|digits:4',
                'jangka_waktu'    => 'required|string|max:100',
                'tanggal_mulai'   => 'required|date',
                'tanggal_selesai' => 'required|date',
                'tingkat'         => 'required|in:nasional,internasional',
            ]);

            ProgramKerjasama::create($validated);

            return redirect()->route('daftar.kerjasama.nasional')
                ->with('success', 'Program Kerjasama berhasil ditambahkan.');
        }

        /* =====================================================
         * 2️⃣ INPUT PENELITIAN / PENGABDIAN → ke tabel programs
         * ===================================================== */
        $validated = $request->validate([
            'tahun'    => 'required|digits:4',
            'kategori' => 'required|string|max:100',
            'skema'    => 'required|string|max:100',
            'judul'    => 'required|string|max:255',
            'ketua'    => 'required|string|max:100',
            'anggota'  => 'nullable|string|max:255',
            'dana'     => 'required',
        ]);

        // Pastikan nilai dana hanya angka
        $validated['dana'] = (int) preg_replace('/\D/', '', $request->input('dana'));

        Program::create($validated);

        return redirect()->route('daftar.program')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    /** ====================================================
     * UPDATE: Edit Program Kerjasama
     * ==================================================== */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'mitra_kerjasama' => 'required|string|max:200',
            'tahun' => 'required|digits:4',
            'jangka_waktu' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tingkat' => 'required|in:nasional,internasional',
        ]);

        // Cari program kerjasama berdasarkan ID dan lakukan pembaruan
        $programKerjasama = ProgramKerjasama::findOrFail($id);
        $programKerjasama->update($validated);

        // Redirect ke halaman daftar kerjasama nasional
        return redirect()->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil diperbarui.');
    }

    /** ====================================================
     * SHOW: Detail Program (Penelitian dan Pengabdian)
     * ==================================================== */
    public function show(ProgramKerjasama $program)
    {
        return response()->json($program); // Mengirim data dalam format JSON
    }

    /** ====================================================
     * SHOW: Detail Program (nasional dan internasional)
     * ==================================================== */
public function showKerjasama($id)
{
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    return view('admin.program-kerjasama-show', compact('programKerjasama'));
}

    // Halaman untuk edit program kerjasama
public function editKerjasama($id)
{
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    return view('admin.program-kerjasama-edit', compact('programKerjasama'));
}

// Update Program Kerjasama
public function updateKerjasama(Request $request, $id)
{
    $validated = $request->validate([
        'mitra_kerjasama' => 'required|string|max:200',
        'tahun' => 'required|digits:4',
        'jangka_waktu' => 'required|string|max:100',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'tingkat' => 'required|in:nasional,internasional',
    ]);

    // Cari program kerjasama berdasarkan ID dan lakukan pembaruan
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    $programKerjasama->update($validated);

    // Redirect ke halaman daftar kerjasama nasional
    return redirect()->route('daftar.kerjasama.nasional')
        ->with('success', 'Program Kerjasama berhasil diperbarui.');
}

    /** ====================================================
     * FORM INPUT KERJASAMA
     * ==================================================== */
    public function inputKerjasama()
    {
        return view('admin.program-input-kerjasama');
    }

    /** ====================================================
     * DAFTAR SEMUA PROGRAM KERJASAMA
     * ==================================================== */
    public function daftarKerjasama(Request $request)
    {
        // Mengambil data program kerjasama berdasarkan filter yang diterima
        $query = ProgramKerjasama::query();

        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('mitra_kerjasama', 'like', "%{$search}%");
            });
        }

        // Ambil data dan kirim ke view
        $programKerjasama = $query->orderByDesc('tahun')->paginate(10);

        // Ambil data tahun untuk filter
        $tahuns = ProgramKerjasama::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');

        // Kirim data ke view
        return view('admin.program-nasional', compact('programKerjasama', 'tahuns'));
    }

    /** ====================================================
     * UPLOAD EXCEL
     * ==================================================== */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProgramImport, $request->file('file'));
            return redirect()->route('daftar.program')
                ->with('success', 'Data program berhasil diupload.');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    /** ====================================================
     * FORM UPLOAD EXCEL
     * ==================================================== */
    public function uploadForm()
    {
        return view('admin.program-upload'); // Pastikan ada view di resources/views/admin/program-upload.blade.php
    }

    /** ====================================================
     * TEMPLATE DOWNLOAD
     * ==================================================== */
    public function template()
    {
        $templateDir = public_path('templates');
        $files = glob($templateDir . '/*.xlsx');

        if (!empty($files)) {
            $filePath = $files[0];
            return response()->download($filePath, 'Template_Program.xlsx');
        }

        return redirect()->back()
            ->with('error', 'File template tidak ditemukan. Pastikan ada di folder public/templates/');
    }

    /** ====================================================
     * SHOW PROGRAM DETAILS (AJAX)
     * ==================================================== */
    public function getProgramDetails($id)
    {
        $program = Program::find($id);

        if ($program) {
            return response()->json([
                'judul' => $program->judul,
                'ketua' => $program->ketua,
                'tahun' => $program->tahun,
                'jangka_waktu' => $program->jangka_waktu,
                'tanggal_mulai' => $program->tanggal_mulai->format('d-m-Y'),
                'tanggal_selesai' => $program->tanggal_selesai->format('d-m-Y'),
                'tingkat' => $program->tingkat,
            ]);
        }

        return response()->json(['error' => 'Program tidak ditemukan'], 404);
    }

    /** ====================================================
     * DESTROY: Hapus Program Kerjasama
     * ==================================================== */
    public function destroyKerjasama($id)
    {
        $programKerjasama = ProgramKerjasama::findOrFail($id);
        $programKerjasama->delete();

        return redirect()
            ->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil dihapus.');
    }

    /** ====================================================
     * DESTROY: Hapus Program (Penelitian/Pengabdian)
     * ==================================================== */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()
            ->route('daftar.program')
            ->with('success', 'Program berhasil dihapus.');
    }
}