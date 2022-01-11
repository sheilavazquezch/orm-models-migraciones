<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Método para listar todos los posts
    public function index()
    {
        return response(
            Posts::all()->toJson(),
            200
        ) -> header('Content-Type', 'application/json');
    }


















    //Método para crear un nuevo post
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $post = Posts::create(
            [
                'title' => request('title'),
                'body' => request('body'),
            ]
        );
        return response(
            $post->toJson(),
            201
        ) -> header('Content-Type', 'application/json');
    }










    
    //Método para actualizar un post
    public function update(Posts $post)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update(
            [
                'title' => request('title'),
                'body' => request('body'),
            ]
        );

        return response(
            $post->toJson(),
            200
        ) -> header('Content-Type', 'application/json');
    }
    












    //Método para elminar un post
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return response() -> json([
            'Post con id' => $id . ' eliminado con exito'
        ]);
    }
    
   
}