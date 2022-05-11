<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Laravel</title>
</head>
<body>

    <header>
        <h1>Cabeçalho</h1>
    </header>
    <hr/>

    <section>
        @yield('content')
    </section>
    <hr>

    <footer>
        <h3>Rodapé</h3>
    </footer>

</body>
</html>
