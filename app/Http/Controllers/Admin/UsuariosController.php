<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class UsuariosController extends Controller
{
    public function me(){
        $user = User::find( Auth::id() );
        return view('admin.profile.show', compact('user'));
    }

    public function editProfile(){
        $user = User::find( Auth::id() );
        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile( Request $request ){
        
        $user = User::findOrFail( Auth::id() );
        if( $user->funcao == 0 ){
            $user->update($request->only(['name', 'email']));
        }else{
            $user->update($request->all());
        }
        
        Session::flash('flash_message', 'Seu perfil foi atualizado com sucesso!');

        return redirect('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }

        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        User::create($requestData);

        Session::flash('flash_message', 'Usuario added!');

        return redirect('app/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect('app/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('app/usuarios');
    }
}
