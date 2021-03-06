<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Guardamos la lista de datos del model Category
        $categories= Category::orderBy('created_at','desc')->paginate(5);
        ////retornamos la vista.
       return view('dashboard.category.index',['categories'=>$categories]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retornamos la vista con el model category
        return view('dashboard.category.create',['category'=>new Category()]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        //Validamos y guardamos
        Category::create($request->validated());
        //Retornamos la vista con mensaje de status
        return back()->with('status','¡Post Creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //Retornamos vista
        return view('dashboard.category.show',["category" =>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //Retornamos vista para editar con variable array category
        return view('dashboard.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, Category $category)
    {
        //llamamos update para actualizar pero antes validamos los inputs
        $category->update($request->validated());
        //Retornamos una vista atras con el mensaje status
        return back()->with('status','¡Post actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //Para eliminar
        $category->delete();
        //Retornamos una vista atra con mensaje status
        return back()->with('status','¡Eliminado correctamente!');
    }
}
