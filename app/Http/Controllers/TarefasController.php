<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{

    public function index(){

        //$list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.index', [
            'list' => $list
        ]);

    }

    public function create(){

        return view('tarefas.create');

    }

    public function store(Request $request){

        $request ->validate([

            'titulo' => [ 'required', 'string' ]

        ]);

        $titulo = $request->input('titulo');

        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();


        return  redirect()->route('tarefas.index');

    }

    public function edit($id){

        $data =  Tarefa::find($id);

        if($data) {

            return view('tarefas.edit', [
                'data' => $data
            ]);

        } else {
            return redirect()->route('tarefas.index');
        }



    }

    public function editAction(Request $request, $id){

        $request ->validate([

            'titulo' => [ 'required', 'string' ]

        ]);

        $titulo = $request->input('titulo');

        /**************************************************
         * Podemos utilizar também a opção:               *
         * Tarefa::find($id)->update(['titulo'=>$titulo]);*
         **************************************************/

        $t = Tarefa::find($id);
        $t->titulo = $titulo;
        $t->save();


        return redirect()->route('tarefas.index');

    }

    public function del($id){

        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.index');

    }

    public function done($id){

        $t = Tarefa::find($id);

        if($t){
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }

        return redirect()->route('tarefas.index');

    }
}
