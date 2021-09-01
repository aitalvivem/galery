<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use App\Models\Gallerie;
use App\Models\Tag;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('votes', 'desc')->orderBy('titre_photo')->paginate(30);
        $tags = Tag::all()->sortBy('lib_tag');
        return view('photos.index', compact('photos', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallerie::all()->sortBy('nom_gallerie');
        $tags = Tag::all()->sortBy('lib_tag');
        return view('photos.create', compact('galleries', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
        // on déplace l'image
        $nom_file = $request->image->store(config('images.path'), 'public');

        // miniature
        $miniature = Image::make($request->image->path());
        // $miniature->resize(250, 250, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save(public_path(str_replace('uploads', '/miniatures', $nom_file)));
        $miniature->heighten(250, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path(str_replace('uploads', '/miniatures', $nom_file)));
        
        if($nom_file){
            $photo = new Photo();
            $photo->titre_photo = $request->titre_photo;
            $photo->nom_file = $nom_file;
            $photo->nom_thumb = str_replace('uploads', 'miniatures', $nom_file);

            if($request->gallerie_id != 'false'){
                $photo->gallerie_id = $request->gallerie_id;
            }

            $photo->save();

            $photo->tags()->attach($request->tags);

            if($request->description){
                $photo->description = $request->description;
            }

            $photo->save();

            return redirect()->route('photos.create')->with('info', 'La photo a bien été ajoutée.');
        }else{
            return redirect()->route('photos.create')->with('info', 'La photo a bien été ajoutée.');
        }

        return redirect()->route('photos.create')->with('erreur', 'Echec de l\'ajout de la photo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show', compact('photo'))->withMaxw('true');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        $galleries = Gallerie::all()->sortBy('nom_gallerie');
        $tags = Tag::all()->sortBy('lib_tag');

        $tags_id = array();
        foreach($photo->tags as $tag){
            $tags_id[] = $tag->id;
        }
        return view('photos.edit', compact('photo', 'galleries', 'tags', 'tags_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRequest $request, $id)
    {
        $photo = Photo::find($id);

        // if($request->gallerie_id == "false"){
        //     $request->gallerie_id = null;
        // }else{
        //     $request->gallerie_id = (int) $request->gallerie_id;
        // }

        $photo->update($request->all());

        if($request->gallerie_id == "false"){
            $photo->gallerie_id = null;
        }else{
            $photo->gallerie_id = (int) $request->gallerie_id;
        }

        $photo->save();
        $photo->tags()->sync($request->tags);

        return redirect()->route('photos.show', $photo->id)->with('info', 'La photo a bien été modifiée.');
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

    public function vote(Photo $photo)
    {
        $photo->votes++;
        $photo->update();

        return view('photos.show', compact('photo'))->withMaxw('true');
    }

    public function voteIndex(Photo $photo, $page)
    {
        $photo->votes++;
        $photo->update();

        // return redirect()->route('photos.index', [$photo, '#'.$photo->id]);
        return redirect()->route('photos.index', ['page' => $page, '#'.$photo->id]);
    }

    public function filtre(Request $request){
        $mode = $request->mode;
        $listtags = $request->ltags;

        if($request->mode == 'union'){
            $ls_photo_id = [];
            foreach($listtags as $l){
                $l = (int) $l;
                $ps = Tag::find($l)->photos;

                foreach($ps as $p){
                    $ls_photo_id[] = $p->id;
                }
            }

            $photos = Photo::find($ls_photo_id);
        }elseif($request->mode == 'inter'){
            // on récupère tous les id photos correspondant aux tags
            $ls_photo_id = [];
            foreach($listtags as $l){
                $l = (int) $l;
                $ps = Tag::find($l)->photos;

                foreach($ps as $p){
                    $ls_photo_id[] = $p->id;
                }
            }

            // on récupère les photos de l'intersection de tous les tags
            $ls_photos = Photo::find($ls_photo_id);

            // pour chaque photo récupérée on regarde si elle possède tous les tags recherchés
            $photos = [];
            foreach($ls_photos as $photo){
                $ls_tag_photo = [];
                
                // on récupère les tags de la photo
                foreach($photo->tags as $tag){
                    $ls_tag_photo[] = $tag->id;
                }

                // pour chaque tag recherché on regarde si il est dans les tags de la photo
                $presente = True;
                foreach($listtags as $l){
                    if(!in_array((int) $l, $ls_tag_photo)){
                        $presente = FALSE;
                    }
                }

                if($presente){
                    $photos[] = $photo;
                }
            }

            $photos = collect($photos);
        }

        $tags = Tag::all()->sortBy('lib_tag');
        return view('photos.tri', compact('photos', 'tags', 'listtags', 'mode'));
    }
}
