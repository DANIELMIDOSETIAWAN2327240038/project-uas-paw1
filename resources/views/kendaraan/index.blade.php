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
        @can('create', App\Models\Kendaraan::class)
        <a href="{{ route('kendaraan.create') }}" class="btn btn-dark mb-3"> Tambah </a>
        @endcan
        <table style="width: 100%;">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: left;">Gambar</th>
              <th style="padding: 8px; text-align: left;">Tipe</th>
              <th style="padding: 8px; text-align: left;">Tahun</th>
              <th style="padding: 8px; text-align: left;">Transmisi</th>
              <th style="padding: 8px; text-align: left;">Plat</th>
              <th style="padding: 8px; text-align: left;">Harga</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraan as $item)
            <tr>
              <td style="padding: 8px;"><img src="{{ $item->foto }}" alt="pp" width="80px"></td>
              <td style="padding: 8px;">{{ $item->tipe_kendaraan }}</td>
              <td style="padding: 8px;">{{ $item->tahun_kendaraan }}</td>
              <td style="padding: 8px;">{{ $item->transmisi_kendaraan }}</td>
              <td style="padding: 8px;">{{ $item->plat_kendaraan }}</td>
              <td style="padding: 8px;">{{ $item->harga_kendaraan }}</td>
              <td>
                <a href="{{ route('kendaraan.show', $item->id) }}" class="btn btn-dark mt-2">Show Details</a>
                @can('update', $item)
                <a href="{{ route('kendaraan.edit', $item->id) }}" class="btn btn-dark mt-2">Edit</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger show_confirm mt-2" data-lte-toggle="tooltip" title="Delete" data-nama="{{ $item->nama }}"> Hapus </button>
                </form>
                @endcan
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!--end::Row-->
@endsection