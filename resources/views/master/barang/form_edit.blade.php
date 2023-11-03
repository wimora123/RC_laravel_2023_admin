@extends('master/all')

@section('master_content')

<h2>Form Edit</h2>

<form  method="post" action="">
@csrf
  <div class="form-group">
    <label>Kode</label>
    <input type="text" name="kode" class="form-control" autofocus value="{{ old('kode', $barang->kode) }}">
    @if($errors->has('kode'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('kode') }}</div>
    @endif
  </div>
  <div class="form-group">
    <label>Barang</label>
    <input type="hidden" name="id_barang" value="{{ $barang->id }}">
    <input type="text" name="barang" class="form-control" value="{{ old('barang', $barang->nama) }}">
    @if($errors->has('barang'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('barang') }}</div>
    @endif
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
    @if($errors->has('deskripsi'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('deskripsi') }}</div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
