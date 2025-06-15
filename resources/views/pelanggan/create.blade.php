@extends('layout.main')
@section('title', 'Pelanggan')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Tambah Pelanggan</div>
      </div>

      <!-- jika ada input foto, dokumen dbs, jangan lupa gunakan: enctype="multipart/form-data" -->
      <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
            @error('nama_pelanggan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <!-- jenis kelamin, form select (untuk enumerasi) -->
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
            <div class="d-block">
              <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}> Laki-laki
              <input class="ms-3" type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> Perempuan
            </div>
            @error('jenis_kelamin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <!-- no telp -->
          <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telp</label>
            <input type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}">
            @error('no_telepon')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>

          <!-- button submit -->
          <button type="submit" class="btn btn-dark">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection