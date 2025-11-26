@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-bold mb-4">Edit Program</h1>

    <form action="{{ route('programs.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $program->judul) }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Skema</label>
            <input type="text" name="skema" value="{{ old('skema', $program->skema) }}"
                   class="w-full border rounded p-2">
        </div>

        <!-- Tambahkan input lain sesuai kebutuhan -->

        <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
