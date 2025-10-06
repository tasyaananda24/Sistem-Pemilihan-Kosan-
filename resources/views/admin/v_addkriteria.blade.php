@extends('themeadmin.default')
@section('content')
<form action="{{ isset($kriteria)? route('admin.kriteria.update',$kriteria->id) : route('admin.kriteria.store') }}" method="POST">
@csrf
@if(isset($kriteria)) @method('PUT') @endif
<div class="mb-3">
<label>Nama Kriteria</label>
<input type="text" name="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria ?? '' }}">
</div>
<div class="mb-3">
<label>Bobot</label>
<input type="number" step="0.01" name="bobot" class="form-control" value="{{ $kriteria->bobot ?? '' }}">
</div>
<div class="mb-3">
<label>Atribut</label>
<select name="atribut" class="form-control">
<option value="cost" {{ (isset($kriteria) && $kriteria->atribut=='cost')?'selected':'' }}>Cost</option>
<option value="benefit" {{ (isset($kriteria) && $kriteria->atribut=='benefit')?'selected':'' }}>Benefit</option>
</select>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
