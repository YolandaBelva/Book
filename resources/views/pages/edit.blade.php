@extends('layouts.app')
@section('content')
<div class="col-8 offset-2">
    <h2>Edit Buku</h2>
        <form action="/buku/{{$buku->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <label for="isbn" class="col-md-4 col-form-label ">ISBN</label>

                    <input id="isbn" type="text" 
                    class="form-control @error('isbn') is-invalid @enderror" 
                    name="isbn" value="{{ $buku->isbn }}"  
                    autocomplete="isbn" autofocus readonly>

                    @error('isbn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="judul" class="col-md-4 col-form-label @error('judul') is-invalid @enderror">Judul Buku</label>

                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}">

                    @error('judul')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="penulis" class="col-md-4 col-form-label @error('penulis') is-invalid @enderror">Penulis</label>

                    <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $buku->penulis }}">

                    @error('penulis')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="penerbit" class="col-md-4 col-form-label @error('penerbit') is-invalid @enderror">Penerbit</label>

                    <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ $buku->penerbit }}">

                    @error('penerbit')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>  

            <div class="row mb-3">
                <label for="tahunterbit" class="col-md-4 col-form-label ">Tahun Terbit</label>

                    <input type="number" min="1800" max="2099" name="tahunterbit" id="tahunterbit" class="form-control" value="{{ $buku->tahunterbit }}">

                    @error('tahunterbit')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="jumlahhalaman" class="col-md-4 col-form-label ">Jumlah Halaman</label>

                    <input type="number" name="jumlahhalaman" id="jumlahhalaman" class="form-control" value="{{ $buku->jumlahhalaman }}">

                    @error('jumlahhalaman')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>


            <div class="row mb-3">
                <label for="sinopsis" class="col-md-4 col-form-label ">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" class="form-control" cols="30" rows="10" style="resize:none" maxlength="3000"> {{ $buku->sinopsis }} </textarea>
                    @error('sinopsis')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            
            <div class="row mb-3">
                <div class="col-4">
                    <button tton type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </div>
        </form>
</div>
@endsection