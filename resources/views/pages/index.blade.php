@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert-success mt-2">
    <p>{{ session('success')}}</p>
</div>
@endif
<div class="row">
    <div class="d-flex flex-row-reverse mb-2">
        <a href="/buku/create" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Buku</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-dark" style="width:100%">
            <tr class="table-dark">
                <th style="width:15%">ISBN</th>
                <th style="width:25%">Judul Buku</th>
                <th style="width:15%">Penulis Buku</th>
                <th style="width:15%">Penerbit Buku</th>
                <th style="width:10%">Detail Buku</th>
                <th style="width:7%">Aksi</th>
            </tr>
            <tbody>
                @foreach($bukus as $buku)
                <tr>
                    <td>{{$buku->isbn}}</td>
                    <td>{{$buku->judul}}</td>
                    <td>{{$buku->penulis}}</td>
                    <td>{{$buku->penerbit}}</td>
                    <td>
                    <a href="/buku/{{$buku->id}}" class="btn btn-sm btn-secondary"><i class="bi bi-box-arrow-up-right"></i> Detail</a>
                    </td>
                    <td class="d-flex">
                        <a href="/buku/{{$buku->id}}/edit" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ url('buku' , $buku->id)}}" method="post" onclick="confirmDelete()">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection