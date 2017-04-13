<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Projeto;
use App\Cidade;
use Illuminate\Http\Request;
use Session;

class ProjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $projetos = Projeto::where('nome', 'LIKE', "%$keyword%")
				->orWhere('estado', 'LIKE', "%$keyword%")
				->orWhere('bairro', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $projetos = Projeto::join('cidades', 'cidades.id', '=', 'cidade_id')
            ->paginate($perPage);
        }

        return view('admin.projetos.index', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projetos.create');
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
        
        Projeto::create($requestData);

        Session::flash('flash_message', 'Projeto added!');

        return redirect('app/projetos');
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
        $projeto = Projeto::with('cidades')->where('id',$id)->first();

        return view('admin.projetos.show', compact('projeto', 'local'));
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
        $projeto = Projeto::findOrFail($id);

        return view('admin.projetos.edit', compact('projeto'));
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
        
        $projeto = Projeto::findOrFail($id);
        $projeto->update($requestData);

        Session::flash('flash_message', 'Projeto updated!');

        return redirect('app/projetos');
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
        Projeto::destroy($id);

        Session::flash('flash_message', 'Projeto deleted!');

        return redirect('app/projetos');
    }
}
