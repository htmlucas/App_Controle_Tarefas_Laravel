Site da aplicacao

@auth

    <h1>Autenticado</h1>
    <p>ID {{ Auth::user()->id}}</p>
    <p>Nome?{{ Auth::user()->name}}</p>
    <p>Email:{{ Auth::user()->email}}</p>

@endauth

@guest
    Olá visitante, tudo bem?
@endguest