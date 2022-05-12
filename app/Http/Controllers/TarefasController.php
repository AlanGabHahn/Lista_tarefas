<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{

    public function index(){

        $list = DB::select('SELECT * FROM tarefas');

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

        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
            'titulo' => $titulo
        ]);

        return  redirect()->route('tarefas.index');

    }

    public function edit($id){

        $data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {

            return view('tarefas.edit', [
                'data' => $data[0]
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

        DB::update('update tarefas set titulo = :titulo where id = :id', [
            'id' => $id,
            'titulo' => $titulo
        ]);

        return redirect()->route('tarefas.index');

    }

    public function del($id){

        DB::delete('DELETE FROM tarefas where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.index');

    }

    public function done($id){

        DB::update('update tarefas set resolvido = 1 - resolvido where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.index');

    }
}
