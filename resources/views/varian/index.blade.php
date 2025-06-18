@extends('layout.main')

<!-- Sections Title-->
@section('title', 'Varian')

<!-- Section isian -->
@section('content')
<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        @can('create', App\Models\Varian::class)
        <a href="{{ route('varian.create') }}" class="btn btn-dark mb-3"> Tambah </a>
        @endcan
        <table style="width: 100%;">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: left;">Gambar</th>
              <th style="padding: 8px; text-align: left;">Varian</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($varian as $item)
            <tr>
              <td style="padding: 8px;"><img src="{{ $item->img_tipe }}" alt="pp" width="80px"></td>
              <td style="padding: 8px;">{{ $item->nama_tipe }}</td>
              @can('delete', $item)
              <td>
                <form action="{{ route('varian.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger show_confirm mt-2" data-lte-toggle="tooltip" title="Delete" data-nama="{{ $item->nama_tipe }}"> Hapus </button>
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