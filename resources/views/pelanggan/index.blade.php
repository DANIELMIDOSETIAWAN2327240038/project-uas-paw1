@extends('layout.main')

<!-- Sections Title-->
@section('title', 'Pelanggan')

<!-- Section isian -->
@section('content')
<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        @can('create', App\Models\Pelanggan::class)
        <a href="{{ route('pelanggan.create') }}" class="btn btn-dark mb-3"> Tambah </a>
        @endcan
        <table style="width: 100%;" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: left;">Nama</th>
              <th style="padding: 8px; text-align: left;">Jenis Kelamin</th>
              <th style="padding: 8px; text-align: left;">No Telp</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelanggan as $item)
            <tr>
              <td style="padding: 8px;">{{ $item->nama_pelanggan }}</td>
              <td style="padding: 8px;">{{ $item->jenis_kelamin }}</td>
              <td style="padding: 8px;">{{ $item->no_telepon }}</td>
              @can('delete', $item)
              <td>
                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger show_confirm mt-2" data-lte-toggle="tooltip" title="Delete" data-nama="{{ $item->nama_pelanggan }}"> Hapus </button>
                </form>
              </td>
              @endcan
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