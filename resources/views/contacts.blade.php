@extends('layouts.app', ['title' => 'Nous contacter'])

@section('content')

	<div class="container system">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h1>Nous contacter</h1>
				<p class="text-muted">
					Si vous rencontrez des problèmes avec les services, veuillez
					<a href="mailto:nanourgopierrefo@gmail.com"> 
						demander de l'aide
					</a>.
				</p>

		
				<form action="{{ route('contacts.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<label for="name" class="form-label">Nom</label>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nom complet">

						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="email" class="form-label">E-mail</label>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="message" class="form-label">Votre message</label>
						<textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" cols="30" rows="8"></textarea>

						@error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<button class="btn btn-primary btn-block">Soumettre votre demande &raquo;</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection