@extends('layouts.app')

@section('content')
    @auth
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Autenticado</h5>
                <p class="card-text">ID : {{ Auth::user()->id}}</p>
                <p class="card-text">Nome : {{ Auth::user()->name}}</p>
                <p class="card-text">Email :{{ Auth::user()->email}}</p>
                </div>
            </div>
        </div>
    </div>

    @endauth

    @guest
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Perdido?
                </div>
                <div class="card-body">
                <h5 class="card-title">Olá visitante, tudo bem?</h5>
                <p class="card-text">Caso esteja entrando pela primeira vez, clique em Login para se conectar ao nosso sistema.</p>
                </div>
            </div>
        </div>
    </div>
        
        
    @endguest

@endsection