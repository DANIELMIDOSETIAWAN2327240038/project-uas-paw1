@extends('layout.main')

<!-- Sections Title-->
@section('title', 'Kendaraan')

<!-- Section isian -->
@section('content')
<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <table class="table">
          <!-- gambar -->
          <tr>
            <td colspan="2">
              <img src="{{ $kendaraan->foto }}" alt=" pp" class="img-fluid" width="240px">
            </td>
          </tr>
          <!-- foreign key -->
          <tr>
            <th>Merk</th>
            <td>{{ $kendaraan->varian->merk->nama_merk }}</td>
          </tr>
          <tr>
            <th>Varian</th>
            <td>{{ $kendaraan->varian->nama_tipe }}</td>
          </tr>
          <!-- isian table -->
          <tr>
            <th>Tipe</th>
            <td>{{ $kendaraan->tipe_kendaraan }}</td>
          </tr>
          <tr>
            <th>Tahun</th>
            <td>{{ $kendaraan->tahun_kendaraan }}</td>
          </tr>
          <tr>
            <th>Transmisi</th>
            <td>{{ $kendaraan->transmisi_kendaraan }}</td>
          </tr>
          <tr>
            <th>Plat</th>
            <td>{{ $kendaraan->plat_kendaraan }}</td>
          </tr>
          <tr>
            <th>Harga</th>
            <td>{{ $kendaraan->harga_kendaraan }}</td>
          </tr>
          <tr>
            <th>Kapasitas Mesin</th>
            <td>{{ $kendaraan->kapasitasMesinOP_kendaraan }}</td>
          </tr>
          <tr>
            <th>Kilometer</th>
            <td>{{ $kendaraan->kilometerOP_kendaraan }}</td>
          </tr>
          <tr>
            <th>Bahan Bakar</th>
            <td>{{ $kendaraan->bahanBakarOP_kendaraan }}</td>
          </tr>
          <tr>
            <th>Warna Fisik</th>
            <td>{{ $kendaraan->warnaFisikOP_kendaraan }}</td>
          </tr>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!--end::Row-->
@endsection