<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TarefaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user_id = auth()->user()->id;
            $tarefas = Tarefa::where('user_id',$user_id)->paginate(10);         
            return view('tarefa.index',['tarefas' => $tarefas]);

        #utilizando classe 

        /* if(Auth::check()){
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $email = Auth::user()->email;

            return "ID| $id | Nome | $name |Email |$email, voce está logado";
        }else{
            return 'voce nao esta logado';
        } */

        #utilizando um metodo/funcao

        /* if(auth()->check()){
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $email = auth()->user()->email;

            return "ID| $id | Nome | $name |Email |$email, voce está logado";
        }else{
            return 'voce nao esta logado';
        } */
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'tarefa' => 'required|min:5|max:80',
            'data_limite_conclusao' => 'required|date'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve possuir valor válido',
            'tarefa.min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
            'tarefa.max' => 'O campo :attribute deve possuir no max 80 caracteres',
            'data_limite_conclusao.date' => 'O campo :attribute deve ter uma data válida'
        ];
        $request->validate($regras,$feedback);

        $tarefa = new Tarefa();
        $dados = $request->all('tarefa','data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;
        $tarefa = Tarefa::create($dados);     
        $destinario = auth()->user()->email;
        Mail::to($destinario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show',['tarefa' => $tarefa->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        
        return view('tarefa.show',['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        
        if($tarefa->user_id == $user_id){
            return view('tarefa.edit',['tarefa' => $tarefa]);
        }

        return view('acesso-negado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {

        
        if(!$tarefa->user_id == auth()->user()->id){
            return view('acesso-negado');
        }
        

        $regras = [
            'tarefa' => 'required|min:5|max:80',
            'data_limite_conclusao' => 'required|date'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve possuir valor válido',
            'tarefa.min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
            'tarefa.max' => 'O campo :attribute deve possuir no max 80 caracteres',
            'data_limite_conclusao.date' => 'O campo :attribute deve ter uma data válida'
        ];
        
        $request->validate($regras,$feedback);

        $tarefa->update($request->all());

        return redirect()->route('tarefa.show',['tarefa' => $tarefa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if(!$tarefa->user_id == auth()->user()->id){
            return view('acesso-negado');
        }
        $tarefa->delete();
        return redirect()->route('tarefa.index');
    }
    public function exportacao($extensao){

        if(in_array($extensao,['xlsx','pdf','csv'])){
            return Excel::download(new TarefasExport, 'lista_de_tarefas.'.$extensao);
        }else{
            return redirect()->route('tarefa.index');
        }
        

    }

    public function exportar(){
        $tarefas = auth()->user()->tarefas()->get();
        $pdf = PDF::loadView('tarefa.pdf',['tarefas' => $tarefas]);
        $pdf->setPaper('a4','landscape'); // 2 parametros, o 1º é o tipo de papel: a4/letter..., e o 2º determina a orientacao da impressao: landscape(paisagem)/portrait(retrato)
        return $pdf->stream('lista_de_tarefas.pdf'); // utilizando o metodo stream ele sera impresso no navegador
        
        
        // return $pdf->download('lista_de_tarefas.pdf');
    }
}
