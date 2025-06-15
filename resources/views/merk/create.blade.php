@extends('layout.main')
@section('title', 'Merk')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Tambah Merk</div>
      </div>

      <form action="{{ route('merk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="nama_merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control" name="nama_merk" value="{{ old('nama_merk') }}">
            @error('nama_merk')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="img_merek" class="form-label">Foto</label>
            <input type="file" class="form-control" name="img_merek">
            @error('img_merek')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-dark">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection