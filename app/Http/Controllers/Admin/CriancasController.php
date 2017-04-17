<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crianca;
use App\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use PDF;

class CriancasController extends Controller
{
    protected $projetos;

    public function __construct(){ 
        $this->projetos = Projeto::lists('nome', 'id');
        $this->projetos->prepend('Filtrar por projeto', '');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $project_id = $request->get('project');
        
        $perPage = 20;

        if (!empty($keyword) && !empty($project_id)) {
            $criancas = Crianca::with('projetos')
                ->where('nomecompleto', 'LIKE', "%$keyword%")
				->where('projeto_id', '=', $project_id)
                ->paginate($perPage);
        } else if(!empty($project_id))
        {
            $criancas = Crianca::with('projetos')
                ->where('projeto_id', '=', $project_id)
                ->paginate($perPage);
        }
            else if (!empty($keyword)) 
        {
            $criancas = Crianca::with('projetos')
                ->where('nomecompleto', 'LIKE', "%$keyword%")
				->orWhere('datanascimento', 'LIKE', "%$keyword%")
				->orWhere('idade', 'LIKE', "%$keyword%")
				->orWhere('mae', 'LIKE', "%$keyword%")
				->orWhere('contato', 'LIKE', "%$keyword%")
				->orWhere('sexo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        }
            else 
        {
            $criancas = Crianca::paginate($perPage);
        }
        
        $projetos = $this->projetos;

        return view('admin.criancas.index', compact('criancas', 'projetos'));
    }

     public function gerarPdf(Request $request)
    {
        $keyword = $request->get('search');
        $project_id = $request->get('project');

        if (!empty($keyword) && !empty($project_id)) {
            $criancas = Crianca::with('projetos')
                ->where('nomecompleto', 'LIKE', "%$keyword%")
				->where('projeto_id', '=', $project_id)
                ->orderBy('nomecompleto', 'ASC')
                ->get();
        } else if (!empty($project_id)) {
            $criancas = Crianca::with('projetos')
                ->where('projeto_id', '=', $project_id)
                ->orderBy('nomecompleto', 'ASC')
                ->get();
        } else if (!empty($keyword)) {
            $criancas = Crianca::with('projetos')
                ->where('nomecompleto', 'LIKE', "%$keyword%")
				->orWhere('datanascimento', 'LIKE', "%$keyword%")
				->orWhere('mae', 'LIKE', "%$keyword%")
				->orWhere('contato', 'LIKE', "%$keyword%")
				->orWhere('sexo', 'LIKE', "%$keyword%")
                ->orderBy('nomecompleto', 'ASC')
                ->get();
        } else {
            $criancas = Crianca::orderBy('nomecompleto', 'ASC')->get();
        }

        if(count($criancas)==0){
            Session::flash('flash_message', 'Nenhuma criança na lista de impressão!');
            return redirect('app/criancas');
        }

        //return view('admin.criancas.pdf', compact('criancas', 'projetos'));
        $pdf = PDF::loadView('admin.criancas.pdf', compact('criancas') );
        return $pdf->download(md5( date('Y-m-d H:i:s') ).'.pdf');
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
        $fields = $request->all();
        
        if ($request->hasFile('foto')) {
            $foto = $this->salvar_foto( $fields['foto'] );
        }

        $rules = array(
            'nomecompleto'          =>  'required',
            'projeto_id'            =>  'required',
            'datanascimento'        =>  'required'
        );

        $validator = Validator::make($fields, 
                                    $rules,
                                    ['required'=>'O campo :attribute é obrigatório']);

        if ($validator->fails()) {
            return Redirect::to('app/criancas')
                ->withErrors($validator);
        } else {
            $crianca = Crianca::create(['nomecompleto'=>$fields['nomecompleto'],
                            'datanascimento'=>$fields['datanascimento'],
                            'mae'=>$fields['mae'],
                            'contato'=>$fields['contato'], 
                            'sexo'=>$fields['sexo'], 
                            'projeto_id'=>$fields['projeto_id'],
                            'foto'=>isset($foto)?$foto:""]);
            Session::flash('flash_message', 'Criança cadastrada com sucesso!');
            return redirect('app/criancas');
        }

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
        
        $fields = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $this->salvar_foto( $fields['foto'] );
        }else if(!empty($fields['foto_name'])){
            $foto = $fields['foto_name'];
        }

        $rules = array(
            'nomecompleto'          =>  'required',
            'projeto_id'            =>  'required',
            'datanascimento'        =>  'required'
        );

        $validator = Validator::make($fields, 
                                    $rules,
                                    ['required'=>'O campo :attribute é obrigatório']);

        if ($validator->fails()) {
            return Redirect::to('app/criancas')
                ->withErrors($validator);
        } else {
            $crianca = Crianca::find($id);
            $crianca->fill(['nomecompleto'=>$fields['nomecompleto'],
                        'datanascimento'=>$fields['datanascimento'],
                        'mae'=>$fields['mae'],
                        'contato'=>$fields['contato'], 
                        'sexo'=>$fields['sexo'], 
                        'projeto_id'=>$fields['projeto_id'],
                        'foto'=>isset($foto)?$foto:""]);
            Session::flash('flash_message', 'Criança cadastrada com sucesso!');
            return redirect('app/criancas');
        }

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
