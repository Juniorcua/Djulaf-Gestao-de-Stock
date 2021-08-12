@extends('layouts.app')

@section('content')
<div class="container col-md-12">
    {{-- <div class=""> --}}
     {{-- START: INFO AREA --}}
     @if (session('warning'))
     <div class="alert alert-warning">
         <button data-dismiss="alert" class="close">×</button>
         <i class="fa fa-check-circle"></i> {{ session('warning') }}
     </div>
     @endif
     @if (session('info'))
     <div class="alert alert-info">
         <button data-dismiss="alert" class="close">×</button>
         <i class="fa fa-check-circle"></i> {{ session('info') }}
     </div>
     @endif

     @if (session('success'))
     <div class="alert alert-success">
         <button data-dismiss="alert" class="close">×</button>
         <i class="fa fa-check-circle"></i> {{ session('success') }}
     </div>
     @endif

     @if (session('danger'))
     <div class="alert alert-danger">
         <button data-dismiss="alert" class="close">×</button>
         <i class="fa fa-user"></i> {{ session('danger') }}
     </div>
     @endif
     {{-- END: INFO AREA --}}
     <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest





             <!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

						<h3>LOGIN <img style="width:40px;margin-bottom:10px" src="{{url('images/lg.png')}}">JULAF</h3>
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-mail"></i></span>
							</div>
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                        <span class="invalid-feedback ml-5"  role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>




						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-lock"></i></span>
							</div>
                            <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                    <span class="invalid-feedback" style="color:red" role="alert">
                                    {{ $message }}
                                    </span>
                        @enderror
                        </div>

                        @error('password')
                                    <span class="invalid-feedback" style="color:red" role="alert">
                                    {{ $message }}
                                    </span>
                        @enderror


						<div class="form-group text-left mt-2">
							<div class="checkbox checkbox-primary d-inline">
								<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
								<label for="checkbox-fill-a1" class="cr"> Lembar-me    </label>
							</div>
                        </div>


                        <button type="submit" class="btn btn-primary mb-4 btn-sm"><i class="feather icon-log-in"></i>Aceder</button>

						<p class="mb-2 text-muted"> @if (Route::has('password.request'))
                            <a class="mb-0 text-muted"  href="{{ route('password.request') }}">
                                {{ __('Esqueceu a Senha?') }}
                            </a>
                        @endif</p>
						<p class="mb-0 text-muted"> @if (Route::has('password.request'))
                            <a class="mb-0 text-muted"  href="{{url('/register')}}">
                                {{ __('Nao tem conta ainda?') }}
                            </a>
                        @endif</p>
                        </form>
                    </div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="{{url('/assets1/images/auth-bg.jpg')}}" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

            {{-- <div class="col-sm-12">
                 <!-- Header -->
			<header id="header" style="text-align: center; margin-top: -25px;">
				<h2>LOGIN <img style="width:40px;margin-bottom:-10px" src="{{url('images/lg.png')}}">JULAF</h2>
				<p>Sistema Para Consulta da Disponibilidade de Medicamentos em Farm&aacute;cias</p>
			</header>


                    <div class="card" style=" width: 340px;margin-left: 35%;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row justify-content-center">

                        <div class="col col-md-6">
                            <label for="email" class="form-control-label"><i class="fa fa-envelope"></i> {{ __('E-mail de Acesso') }}</label>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" style="color:red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="col col-md-6" style="margin-top:10px;">
                            <label for="password" class="form-control-label"><i class="fa fa-lock"></i> {{ __('Senha') }}</label>
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" style="color:red" role="alert">
                                    {{ $message }}
                                    </span>
                                @enderror

                        </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4" style="margin-top:10px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembar-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4">
                                <button style="width: 100%;" type="submit" ><i class="fa fa-search"></i> {{ __('Entrar') }}</button>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="margin-top: 15px;" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a palavra Passe?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}


        @else
        {{-- <div class="col-md-8"> --}}
        <div class="card ">
            <div class="card-header"><i class="fa fa-lock"></i> {{ __('Seja bem vindo novamante') }}</div>

            <div class="card-body" align="center">
                <h4 class="mb-3 mt-2"> Caro utilizador, ja esta com uma sessão inciada!!</h4>
                <h4 class="mb-3 mt-2"> Por favor! Contacte o Administrador!! <i class="fa fa-phone"></i> <i class="fa fa-envelope"></i></h4>

                <a class="btn btn-outline-danger" style="color:red" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 <i class="fa fa-power-off"></i> Encerar sessão </a><br>

                <a href="/home" class="btn btn-outline-success btn-light">Entrar <i class="fa fa-chevron-right"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </div>
        </div>
        {{-- </div> --}}





        @endguest
    </ul>
</div>
@endsection
