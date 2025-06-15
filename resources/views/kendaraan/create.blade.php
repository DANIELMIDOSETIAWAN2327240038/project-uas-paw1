@extends('layout.main')
@section('title', 'Kendaraan')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline mb-4">
      <div class="card-header">
        <div class="card-title">Tambah Kendaraan</div>
      </div>

      <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <!-- foreign key ke varian -->
          <div class="mb-3">
            <label for="varian_id" class="form-label">Varian</label>
            <select name="varian_id" class="form-select">
              @foreach($varian as $item)
              <option value="{{ $item->id }}">{{ $item->nama_tipe }}</option>
              @endforeach
            </select>
            @error('varian_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <!-- isi tabel -->
          <div class="mb-3">
            <label for="tipe_kendaraan" class="form-label">Tipe</label>
            <input type="text" class="form-control" name="tipe_kendaraan" value="{{ old('tipe_kendaraan') }}">
            @error('tipe_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tahun_kendaraan" class="form-label">Tahun</label>
            <input type="text" class="form-control" name="tahun_kendaraan" value="{{ old('tahun_kendaraan') }}">
            @error('tahun_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="transmisi_kendaraan" class="form-label">Transmisi</label>
            <input type="text" class="form-control" name="transmisi_kendaraan" value="{{ old('transmisi_kendaraan') }}">
            @error('transmisi_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="plat_kendaraan" class="form-label">Plat</label>
            <input type="text" class="form-control" name="plat_kendaraan" value="{{ old('plat_kendaraan') }}">
            @error('plat_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="harga_kendaraan" class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga_kendaraan" value="{{ old('harga_kendaraan') }}">
            @error('harga_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <!-- menu opsional -->
          <div class="mb-3">
            <label for="kapasitasMesinOP_kendaraan" class="form-label">Kapasitas Mesin</label>
            <input type="text" class="form-control" name="kapasitasMesinOP_kendaraan" value="{{ old('kapasitasMesinOP_kendaraan') }}">
            @error('kapasitasMesinOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="kilometerOP_kendaraan" class="form-label">Kilometer</label>
            <input type="text" class="form-control" name="kilometerOP_kendaraan" value="{{ old('kilometerOP_kendaraan') }}">
            @error('kilometerOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="bahanBakarOP_kendaraan" class="form-label">Bahan Bakar</label>
            <input type="text" class="form-control" name="bahanBakarOP_kendaraan" value="{{ old('bahanBakarOP_kendaraan') }}">
            @error('bahanBakarOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="warnaFisikOP_kendaraan" class="form-label">Warna Fisik</label>
            <input type="text" class="form-control" name="warnaFisikOP_kendaraan" value="{{ old('warnaFisikOP_kendaraan') }}">
            @error('warnaFisikOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>

          <!-- form upload foto kendaraan -->
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto">
            @error('foto')
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