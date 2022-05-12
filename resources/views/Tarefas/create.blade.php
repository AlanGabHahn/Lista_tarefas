@extends('layouts.admin')

@section('title', 'Adição de Tarefas')

@section('content')

    <h1>Adição</h1>

    @if ($errors->any())

        <div>
            @foreach ($errors->all() as $error )
                {{ $error }}<br>
            @endforeach
        </div>

    @endif

    <form method="POST">
        @csrf

        <label for="">
            Título: <br>
            <input type="text" name="titulo">
        </label>

        <input type="submit" value="Adicionar">

    </form>

@endsection
