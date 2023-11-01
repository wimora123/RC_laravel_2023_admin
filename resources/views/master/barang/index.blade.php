@extends('master/all')

@section('master_content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('master_barang_create') }}"><i class="fa fa-solid fa-plus"></i> Tambah</a>
        </div>
    </div>

    <center><h1>Master Barang</h1></center>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp

            <tr>
            @foreach($barang AS $brg)
                <td>{{ $i++ }}</td>
                <td>{{ $brg->kode }}</td>
                <td>{{ $brg->nama }}</td>
                <td>{{ $brg->deskripsi }}</td>
                <td><a class="btn btn-danger btn btn-sm btn-danger rounded-circle" onclick="return confirm('Yakin mau dihapus {{ $brg->kode }} ? ')" href="{{ route('master_barang_hapus',['id'=>$brg->id]) }}">Hapus</a></td>
                <td><a href="" class="btn btn-success">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
