@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                        <h3>REGISTO <img style="width:40px;margin-bottom:10px" src="{{url('images/lg.png')}}">JULAF</h3>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-user"></i></span>
							</div>
                            <input id="name" type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-mail"></i></span>
							</div>
                            <input id="email" type="email" placeholder="Email " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span for="password" class="input-group-text"><i class="feather icon-lock"></i></span>
							</div>
                            <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

						<div class="input-group mb-5">
							<div class="input-group-prepend">
								<span for="password-confirm" class="input-group-text"><i class="feather icon-lock"></i></span>
							</div>
                            <input id="password-confirm" type="password" placeholder="Confirmação da Senha" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>

						<button type="submit" class="btn btn-primary mb-4 btn-sm"><i class="feather icon-edit"></i>Registar</button>

                        <p class="mb-0 text-muted"> @if (Route::has('password.request'))
                            <a class="mb-0 text-muted"  href="{{url('/login')}}">
                                {{ __('Ja Possui uma conta?') }}
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
<!-- [ auth-signup ] end -->

        {{-- <div class="col-md-8">
            <div class="card">

                <!-- Header -->
			<header id="header" style="text-align: center; margin-top: -25px;">
				<h2>REGISTO <img style="width:40px;margin-bottom:-10px" src="{{url('images/lg.png')}}">JULAF</h2>
				<p>Sistema Para Consulta da Disponibilidade de Medicamentos em Farm&aacute;cias</p>
            </header>

                <div class="card" style="align-self:right; width: 380px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin-top:10px;">
                                <button style="width: 100%;" type="submit" ><i class="fa fa-edit"></i> {{ __('Registar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
