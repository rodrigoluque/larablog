<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //obtenemos registros del modelo Users 
       $users= User::orderBy('created_at','desc')->paginate(5);
        
       //retornamos la vista.
       return view('dashboard.user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Recuperemos solo columnas id y key de la tabla "rols"
        $rols=Rol::pluck('id','key');
        //Retonarmos la vista con el array User y rols
        return view('dashboard.user.create',['user'=>new User(),'rols'=>$rols]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        
    
        User::create(
            [
                'name'=>$request['name'],
                'rol_id'=>$request['rol_id'],
                'surname'=>$request['surname'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password']),
            ]
        );
        //Retornamos una vista atras con el mensaje status
        return back()->with('status','¡Post Creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //Retornamos vista
        return view('dashboard.user.show',["user" =>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Recuperamos id y key del model Category con el metodo pluck "arrancar"
        $rols=Rol::pluck('id','key');
        //Retornamos la vista
        return view('dashboard.user.edit',['user'=>$user,'rols'=>$rols]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {   
        //Actualizamos
        $user->update(
            [
                'name'=>$request['name'],
                'surname'=>$request['surname'],
                'email'=>$request['email'],
                'rol_id'=>$request['rol_id']
            ]
        );

        return back()->with('status','¡Post actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        //Para eliminar
        $user->delete();
        //Retornamos una vista atras con el mensaje de status
        return back()->with('status','¡Eliminado correctamente!');
    }
}
