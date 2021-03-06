<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       //obtenemos registros del modelo Posts 
       $posts= Post::orderBy('created_at','desc')->paginate(5);
       /*Verificamos si hay registros con dd de manera rapida
       dd($posts);*/

       
       //retornamos la vista.
       return view('dashboard.post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('id','title');
        return view('dashboard.post.create',['post'=>new Post(),'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        // dd($request->all());
       /* echo $request->title;
        echo $request->url;
        echo $request->content;*/

        /*$request->validate([
            'title'=>'required|min:5|max:500',
            'url'=>'required|min:3|max:10',
            'content'=>'required|min:3|max:10'
        ]);*/

        //dd($request->all());
        //dd($request->validated());  Probamos si validated() esta funcionando correctamente
        Post::create($request->validated());

        return back()->with('status','¡Post Creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        /*Consultamos por parametro $id
        *$post=Post::find($id);
        */

        //Si el id no existe findOrfail retorna una vista 404 y en los parametros de show tiene que ir $id
        //$post=Post::findOrFail($id);
       
        /**
        * Verificamos que se recupere bien.
        *dd($post);
        */

        //Retornamos vista
        return view('dashboard.post.show',["post" =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {   //Recuperamos las categorias
        //$categories=Category::get();

        //Recuperamos id y title del model Category con el metodo pluck "arrancar"
        $categories=Category::pluck('id','title');
        //Retornamos la vista con la array $post
        return view('dashboard.post.edit',['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());

        return back()->with('status','¡Post actualizado satisfactoriamente!');
    }

    public function image(Request $request,Post $post){
        $request->validate([
            'image' =>'required|mimes:jpeg,bmp,png|max:10240'  //10mb
        ]);
        
        $filename=time().".".$request->image->extension();

        $request->image->move(public_path('images'),$filename);

        //echo "image".$filename;  
        
        PostImage::create(['image'=>$filename,'post_id'=>$post->id]);

        return back()->with('status','Imagen cargada correctamente');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Para eliminar
        $post->delete();

        return back()->with('status','¡Eliminado correctamente!');
    }
}
