@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                 <!-- Header -->
			<header id="header" style="text-align: center; margin-top: -25px;">
				<h2>Verifique seu Endere&ccedil;o de Email <img style="width:40px;margin-bottom:-10px" src="{{url('images/lg.png')}}">JULAF</h2>
				<p>Sistema Para Consulta da Disponibilidade de Medicamentos em Farm&aacute;cias</p>
            </header>

                <div class="card" style="align-self:right; width: 380px;">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __(' Um link de verificação foi enviado para o seu endere&ccedil;o de email.') }}
                        </div>
                    @endif

                    {{ __('Antes de avançar, por favor verifique seu email para um link de verificação') }}
                    {{ __('Se não recebeu o email.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" style="margin-top:20px;">{{ __('Clique aqui para solicitar outro.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
