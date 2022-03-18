<!-- @extends('layouts.app') -->
@section('content')
<div class="col-8 offset-2">
    <h2>Tambah Buku</h2>
        <form action="/buku" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="isbn" class="col-md-4 col-form-label ">ISBN</label>

                    <input id="isbn" type="text" 
                    class="form-control @error('isbn') is-invalid @enderror" 
                    name="isbn" value="{{ old('isbn') }}"  
                    autocomplete="isbn" autofocus>

                    @error('isbn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="judul" class="col-md-4 col-form-label @error('judul') is-invalid @enderror">Judul Buku</label>

                    <input type="text" name="judul" id="judul" class="form-control">

                    @error('judul')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="penulis" class="col-md-4 col-form-label @error('penulis') is-invalid @enderror">Penulis Buku</label>

                    <input type="text" name="penulis" id="penulis" class="form-control">

                    @error('penulis')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="penerbit" class="col-md-4 col-form-label @error('penerbit') is-invalid @enderror">Penerbit Buku</label>

                    <input type="text" name="penerbit" id="penerbit" class="form-control">

                    @error('penerbit')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>


            <div class="row mb-3">
                <label for="tahunterbit" class="col-md-4 col-form-label ">Tahun Terbit</label>

                    <input type="number" min="1800" max="2099" name="tahunterbit" id="tahunterbit" class="form-control">

                    @error('tahunterbit')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="jumlahhalaman" class="col-md-4 col-form-label ">Jumlah Halaman</label>

                    <input type="number" name="jumlahhalaman" id="jumlahhalaman" class="form-control">

                    @error('jumlahhalaman')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row mb-3">
                <label for="sinopsis" class="col-md-4 col-form-label ">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" class="form-control" cols="30" rows="10" style="resize:none" maxlength="3000"></textarea>
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