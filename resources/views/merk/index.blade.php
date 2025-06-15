@extends('layout.main')

<!-- Sections Title-->
@section('title', 'Merk')

<!-- Section isian -->
@section('content')
<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <a href="{{ route('merk.create') }}" class="btn btn-dark mb-3"> Tambah </a>
        <table style="width: 100%;">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: left;">Gambar</th>
              <th style="padding: 8px; text-align: left;">Merk</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($merk as $item)
            <tr>
              <td style="padding: 8px;"><img src="{{ $item->img_merek }}" alt="pp" width="80px"></td>
              <td style="padding: 8px;">{{ $item->nama_merk }}</td>
              <td>
                <form action="{{ route('merk.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger show_confirm mt-2" data-lte-toggle="tooltip" title="Delete" data-nama="{{ $item->nama }}"> Hapus </button>
                </form>
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