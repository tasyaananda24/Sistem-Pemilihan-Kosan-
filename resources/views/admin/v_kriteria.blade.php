@extends('themeadmin.default')
@section('content')
<a href="{{ route('admin.kriteria.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>
<table class="table table-bordered">
<thead>
<tr><th>No</th><th>Nama Kriteria</th><th>Bobot</th><th>Atribut</th><th>Aksi</th></tr>
</thead>
<tbody>
@foreach($kriteria as $k)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $k->nama_kriteria }}</td>
<td>{{ $k->bobot }}</td>
<td>{{ $k->atribut }}</td>
<td>
<a href="{{ route('admin.kriteria.edit',$k->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('admin.kriteria.destroy',$k->id) }}" method="POST" style="display:inline">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
