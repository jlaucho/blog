<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\category;

use App\Tag;

use App\article;

use App\image;

use Laracasts\Flash\Flash;

use App\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //dd('hola');
        $art = article::orderBy('title', 'ASC')->paginate(4);
        $art->each(function ($art)
        {
            $art->category();
            $art->user();
        });
        
        return view('admin.article.index')->with('art', $art);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cat = category::orderBy('name', 'ASC')->lists('name', 'id');
        $tag = Tag::orderBy('name', 'ASC')->lists('name', 'id');

        return view('admin.article.create')
            ->with('cat', $cat)
            ->with('tag', $tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {   
        //Manipulacion de Imagenes
        if($request->file('imagen'))
        {            
            $file = $request->file('imagen');
            $name = 'blogImagen_'. time() .'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/article/';
            $file->move($path,$name);
        }
        $art = new article($request->all());
        $art->user_id = \Auth::user()->id;
        $art->save();

        $art->tags()->sync($request->tags);

        $image = new image();
        $image->name=$name;
        $image->article()->associate($art);
        $image->save();
        
        Flash::success('El articulo se ha registrado correctamente');
        return redirect()->route('admin.article.index');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $art = article::find($id);
        $cat = category::orderBy('name', 'ASC')->lists('name', 'id');
        $tag = Tag::orderBy('name', 'ASC')->lists('name', 'id');

        $my_tags = $art->tags()->lists('tags.id')->ToArray();
        return view('admin.article.edit')
            ->with('art', $art)
            ->with('cat', $cat)
            ->with('tag', $tag)
            ->with('myTags', $my_tags);
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
        $art = article::find($id);
        $art->fill($request->all());
        $art->save();

        //ACTUALIZANDO LOS TAGS

        $art->tags()->sync($request->tags);

        //ENVIANDO EL MENSAJE

        Flash::success('Se ha modificado satisfactoriamente el Articulo '.$art->title. '!!!');
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = article::find($id);
        $art->delete();

        Flash::error('Se ha eliminado el articulo '.$art->title.' correctamente');

        return redirect()->route('admin.article.index');
    }
}
