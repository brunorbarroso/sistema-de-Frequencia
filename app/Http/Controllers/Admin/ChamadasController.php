<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Chamada;
use App\Crianca;
use App\Projeto;
use App\Chamada_crianca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class ChamadasController extends Controller
{

    protected $projetos;

    public function __construct(){
        $this->setProjetos();
    }

    public function setProjetos(){
        $this->projetos = Projeto::lists('nome', 'id');
    }

    public function getProjetos(){
        return $this->projetos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projetos = $this->getProjetos();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $chamadas = Chamada::where('datachamada', 'LIKE', "%$keyword%")
				->with('projeto')
                ->paginate($perPage);
        } else {
            $chamadas = Chamada::with('projeto')->paginate($perPage);
        }

        return view('admin.chamadas.index', compact('chamadas', 'projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $projetos = $this->getProjetos();
        return view('admin.chamadas.create', compact('projetos'));
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

        $rules = array('datachamada' => 'required', 'projeto_id' => 'required');
        $validator = Validator::make($requestData, $rules, ['required'=>'O campo :attribute é obrigatório']);

        if ($validator->fails()) {
            return Redirect::to('app/chamadas')
                ->withErrors($validator);
        } else {
            Chamada::create($requestData);
            Session::flash('flash_message', 'Chamada criada com sucesso!');
            return redirect('app/chamadas');
        }

        return redirect('app/chamadas');
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
        $projetos = $this->getProjetos();
        $chamada = Chamada::findOrFail($id);
        $presencas = Chamada_crianca::where('chamada_id',$chamada->id)->get();
        $criancas = Crianca::where('projeto_id', $chamada->projeto->id)->get();

        

        return view('admin.chamadas.show', compact('chamada','projetos','criancas', 'presencas'));
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
        $chamada = Chamada::findOrFail($id);
        $projetos = $this->getProjetos();
        return view('admin.chamadas.edit', compact('chamada','projetos'));
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


        $rules = array('datachamada' => 'required', 'projeto_id' => 'required');

        $validator = Validator::make($requestData, $rules, ['required'=>'O campo :attribute é obrigatório']);

        if ($validator->fails()) {
            return Redirect::to('app/chamadas')
                ->withErrors($validator);
        } else {
            $chamada = Chamada::findOrFail($id);
            $chamada->update($requestData);
            Session::flash('flash_message', 'Chamada atualizada com sucesso!');
            return redirect('app/chamadas');
        }

        return redirect('app/chamadas');
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
        Chamada::destroy($id);

        Session::flash('flash_message', 'Chamada deleted!');

        return redirect('app/chamadas');
    }

    public function fazer_chamada( $id, Request $request ){
        
        $data = $request->all();
        
        $criancas = Crianca::where('projeto_id', $data['projeto_id'][0])->get();

        foreach($criancas as $crianca){

            $chamada_crianca = Chamada_crianca::where(['crianca_id'=>$crianca->id, 'chamada_id'=>$id])->first();

            if(isset($chamada_crianca)){
                $chamada_crianca = Chamada_crianca::find($chamada_crianca->id);
                $chamada_crianca->presenca = 0;
                $chamada_crianca->save();
            }else{
                Chamada_crianca::create(['crianca_id'=>$crianca->id, 'presenca'=>0, 'chamada_id'=>$id]);
            }
            
        }
        if(isset($data['presenca'])){
            foreach($data['presenca'] as $crianca => $presenca) {
                $chamada_crianca = Chamada_crianca::where(['crianca_id'=>$crianca, 'chamada_id'=>$id])->first();
                if(isset($chamada_crianca)){
                    $chamada_crianca = Chamada_crianca::find($chamada_crianca->id);
                    $chamada_crianca->presenca = 1;
                    $chamada_crianca->save();
                }
            }
        }

        $chamada = Chamada::find($id);
        $chamada->realizada = 1;
        $chamada->save();

        Session::flash('flash_message', 'Presença finalizada com sucesso');

        return redirect('app/chamadas');
    }
}
