<?php

namespace App\Http\Controllers;

use App\Http\Requests\GallerieRequest;
use App\Models\Gallerie;
use App\Models\Photo;

class GallerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallerie::all();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GallerieRequest $request)
    {
        Gallerie::create($request->all());
        return redirect()->route('galleries.create')->with('info', 'La galerie a bien été créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallerie = Gallerie::find($id);
        return view('galleries.show', compact('gallerie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallerie = Gallerie::find($id);
        return view('galleries.edit', compact('gallerie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GallerieRequest $request, $id)
    {
        $gallerie = Gallerie::find($id);
        $gallerie->update($request->all());

        return redirect()->route('galleries.show', $gallerie->id)->with('info', 'La galerie a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vote($id)
    {
        $gallerie = Gallerie::find($id);
        $gallerie->votes++;
        $gallerie->update();

        return redirect()->route('galleries.show', $gallerie);
    }

    public function votePhoto($idGallerie, $idPhoto)
    {
        $gallerie = Gallerie::find($idGallerie);
        $photo = $gallerie->photos->find($idPhoto);
        $photo->votes++;
        $photo->save();

        return redirect()->route('galleries.show', [$gallerie, '#'.$idPhoto]);
    }
}
