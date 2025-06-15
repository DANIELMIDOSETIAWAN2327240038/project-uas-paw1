@extends('layout.main')

<!-- Sections Title-->
@section('title', 'Kendaraan')

<!-- Section isian -->
@section('content')
<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline mb-4">
      <!--begin::Header-->
      <div class="card-header">
        <div class="card-title">Edit Info Kendaraan</div>
      </div>
      <!--end::Header-->
      <!--begin::Form-->
      <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!--begin::Body-->
        <div class="card-body">
          <div class="mb-3">
            <label for="varian_id" class="form-label">Varian</label>
            <select name="varian_id" class="form-select">
              @foreach($varian as $item)
              <option value="{{ $item->id }}" {{ (old('varian_id') == $item->id || (isset($kendaraan) && $kendaraan->varian_id == $item->id)) ? 'selected' : '' }}>
                {{ $item->nama_tipe }}
              </option>
              @endforeach
            </select>
            @error('varian_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tipe_kendaraan" class="form-label">Tipe</label>
            <input type="text" class="form-control" name="tipe_kendaraan"
              value="{{ old('tipe_kendaraan') ? old('tipe_kendaraan') : (isset($kendaraan) ? $kendaraan->tipe_kendaraan : '') }}">
            @error('tipe_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tahun_kendaraan" class="form-label">Tahun</label>
            <input type="text" class="form-control" name="tahun_kendaraan"
              value="{{ old('tahun_kendaraan') ? old('tahun_kendaraan') : (isset($kendaraan) ? $kendaraan->tahun_kendaraan : '') }}">
            @error('tahun_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="transmisi_kendaraan" class="form-label">Transmisi</label>
            <input type="text" class="form-control" name="transmisi_kendaraan"
              value="{{ old('transmisi_kendaraan') ? old('transmisi_kendaraan') : (isset($kendaraan) ? $kendaraan->transmisi_kendaraan : '') }}">
            @error('transmisi_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="plat_kendaraan" class="form-label">Plat</label>
            <input type="text" class="form-control" name="plat_kendaraan"
              value="{{ old('plat_kendaraan') ? old('plat_kendaraan') : (isset($kendaraan) ? $kendaraan->plat_kendaraan : '') }}">
            @error('plat_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="harga_kendaraan" class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga_kendaraan"
              value="{{ old('harga_kendaraan') ? old('harga_kendaraan') : (isset($kendaraan) ? $kendaraan->harga_kendaraan : '') }}">
            @error('harga_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="kapasitasMesinOP_kendaraan" class="form-label">Kapasitas Mesin</label>
            <input type="text" class="form-control" name="kapasitasMesinOP_kendaraan"
              value="{{ old('kapasitasMesinOP_kendaraan') ? old('kapasitasMesinOP_kendaraan') : (isset($kendaraan) ? $kendaraan->kapasitasMesinOP_kendaraan : '') }}">
            @error('kapasitasMesinOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="kilometerOP_kendaraan" class="form-label">Kilometer</label>
            <input type="text" class="form-control" name="kilometerOP_kendaraan"
              value="{{ old('kilometerOP_kendaraan') ? old('kilometerOP_kendaraan') : (isset($kendaraan) ? $kendaraan->kilometerOP_kendaraan : '') }}">
            @error('kilometerOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="bahanBakarOP_kendaraan" class="form-label">Bahan Bakar</label>
            <input type="text" class="form-control" name="bahanBakarOP_kendaraan"
              value="{{ old('bahanBakarOP_kendaraan') ? old('bahanBakarOP_kendaraan') : (isset($kendaraan) ? $kendaraan->bahanBakarOP_kendaraan : '') }}">
            @error('bahanBakarOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="warnaFisikOP_kendaraan" class="form-label">Warna Fisik</label>
            <input type="text" class="form-control" name="warnaFisikOP_kendaraan"
              value="{{ old('warnaFisikOP_kendaraan') ? old('warnaFisikOP_kendaraan') : (isset($kendaraan) ? $kendaraan->warnaFisikOP_kendaraan : '') }}">
            @error('warnaFisikOP_kendaraan')
            <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-dark">Edit</button>
        </div>
        <!--end::Body-->
      </form>
      <!--end::Form-->
    </div>
  </div>
</div>
<!--end::Row-->
@endsection