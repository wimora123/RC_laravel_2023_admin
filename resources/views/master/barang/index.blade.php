@extends('master/all')

@section('master_content')
    <center><h1>Master Barang</h1></center>

    @foreach($barang AS $brg)
        <p>{{ $brg->kode }}</p>
        <p>{{ $brg->nama }}</p>
        <p>{{ $brg->deskripsi }}</p>
    @endforeach

@endsection
