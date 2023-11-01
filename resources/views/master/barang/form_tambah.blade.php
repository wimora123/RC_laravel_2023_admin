@extends('master/all')

@section('master_content')

<h2>Form Tambah</h2>

<form  method="post" action="{{ route('master_barang_simpan') }}">
@csrf
  <div class="form-group">
    <label>Kode</label>
    <input type="text" name="kode" class="form-control" autofocus value="{{ old('kode') }}">
    @if($errors->has('kode'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('kode') }}</div>
    @endif
  </div>
  <div class="form-group">
    <label>Barang</label>
    <input type="text" name="barang" class="form-control" value="{{ old('barang') }}">
    @if($errors->has('barang'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('barang') }}</div>
    @endif
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
    @if($errors->has('deskripsi'))
        <div class="badge text-bg-danger p-2 m-2">{{ $errors->first('deskripsi') }}</div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
