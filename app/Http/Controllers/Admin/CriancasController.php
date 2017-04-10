<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crianca;
use App\Projeto;
use Illuminate\Http\Request;
use Session;

class CriancasController extends Controller
{
    protected $projetos;

    public function __construct(){ 
        $this->projetos = Projeto::lists('nome', 'id');
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
            $criancas = Crianca::where('nomecompleto', 'LIKE', "%$keyword%")
				->orWhere('datanascimento', 'LIKE', "%$keyword%")
				->orWhere('idade', 'LIKE', "%$keyword%")
				->orWhere('mae', 'LIKE', "%$keyword%")
				->orWhere('contato', 'LIKE', "%$keyword%")
				->orWhere('sexo', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $criancas = Crianca::paginate($perPage);
        }
                $projetos = $this->projetos;$projetos = $this->projetos;
        return view('admin.criancas.index', compact('criancas', 'projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $projetos = $this->projetos;
        return view('admin.criancas.create', compact('projetos'));
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
        
        Crianca::create($requestData);

        Session::flash('flash_message', 'Crianca added!');

        return redirect('app/criancas');
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
        $crianca = Crianca::findOrFail($id);
        $projetos = $this->projetos;
        return view('admin.criancas.show', compact('crianca','projetos'));
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
        $crianca = Crianca::findOrFail($id);
        $projetos = $this->projetos;    
        return view('admin.criancas.edit', compact('crianca', 'projetos'));
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
        
        $crianca = Crianca::findOrFail($id);
        $crianca->update($requestData);

        Session::flash('flash_message', 'Crianca updated!');

        return redirect('app/criancas');
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
        Crianca::destroy($id);

        Session::flash('flash_message', 'Crianca deleted!');

        return redirect('app/criancas');
    }
}
