@extends('layout.main')
@section('title', 'Varian')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Tambah Varian</div>
      </div>

      <form action="{{ route('varian.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <!-- foreign key ke merk -->
          <div class="mb-3">
            <label for="merk_id" class="form-label">Merk</label>
            <select name="merk_id" class="form-select">
              @foreach($merk as $item)
              <option value="{{ $item->id }}">{{ $item->nama_merk }}</option>
              @endforeach
            </select>
            @error('merk_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <!-- isian tabel varian -->
          <div class="mb-3">
            <label for="nama_tipe" class="form-label">Nama Varian</label>
            <input type="text" class="form-control" name="nama_tipe" value="{{ old('nama_tipe') }}">
            @error('nama_tipe')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="img_tipe" class="form-label">Foto</label>
            <input type="file" class="form-control" name="img_tipe">
            @error('img_tipe')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <!-- button untuk submit -->
          <button type="submit" class="btn btn-dark">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection