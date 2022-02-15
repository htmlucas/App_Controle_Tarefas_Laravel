@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Falta pouco agora, só precisamos que voce ferifique seu E-Mail.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos um e-amail para você com o link  de validaçao.
                        </div>
                    @endif

                    Anter de utilizar os recursos da aplicação, por favor valide seu e-mail através do link  de verificação que encaminhamos para o seu e-mail.
                    <br>
                    Caso voce nao tenha recebido o e-mail de verificação clique no link a seguir para reenviarmos,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">CLIQUE AQUI</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
