<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buku $buku)
    {
        $bukus = $buku->all();
        return view('pages.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'isbn' => 'required|unique:bukus',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => '',
            'jumlahhalaman' => '',
            'ukuran' => '',
            'sinopsis' => 'max:1000',
            'cover' => ['','image'],
        ]);

        if(request('cover')){
            $imagepath = request('cover')->store('covers','public');

            $cover = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
            $cover->save();

            $coverArray = ['cover'=>$imagepath];
        }


        Buku::create(array_merge(
            $data,
            $coverArray ?? []
        ));

        return redirect('/')->with('success', 'Buku Berhasil Ditambah');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('pages.show',compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('pages.edit',compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = request()->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => '',
            'jumlahhalaman' => '',
            'ukuran' => '',
            'sinopsis' => 'max:3000',
            'cover' => ['','image'],
        ]);

        if(request('cover')){
            $imagepath = request('cover')->store('covers','public');

            $cover = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
            $cover->save();

            $coverArray = ['cover'=>$imagepath];
        }

        $buku = Buku::findOrFail($id);

        $buku->update(array_merge(
            $request,
            $coverArray ?? [],
        ));

        $buku->save();


        return redirect("/buku/{$buku->id}")->with('success', 'Buku Berhasil Diedit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect("/")->with('success','Buku Berhasil dihapus');
    }
}
