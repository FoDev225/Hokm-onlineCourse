@extends('layouts.app', ['title' => 'Mon Profile' ])
	
	@section('content')

		<div class="container system">
			<div class="row justify-content-center">
				
				<div class="col-md-3">
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							
							<div class="text-center">
								<img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="/images/users/{{ Auth::user()->photo }}" alt="">
							</div>
							
							<h3 class="profile-username text-center" style="text-transform: uppercase;">
								{{ Auth::user()->name }}
							</h3>
							<p class="text-muted text-center">
								{{ Auth::user()->email }}
							</p>

						</div>
					</div>
				</div>

				<div class="col-md-9">
					@include('layouts.partials.alert')
					<div class="card">
						<div class="card-header"><h4>Editer mon profile</h4></div>
						<div class="card-body">
							<div>
								<form method="POST" action="{{ route('user.postProfile') }}">
									@csrf
	
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">

												<label class="form-label" for="name">{{ __('Nom') }}</label>
												
												<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom complet">

												@error('name')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror

											</div>

											<div class="form-group">
					                            
					                            <label for="statut" class="form-label">{{ __('Statut') }}</label>
					                            
					                            <select class="form-control" id="statut" name="statut" required>
					                                <option></option>
					                                <option>Formateur</option>
					                                <option>Apprenant</option>
					                            </select>

					                        </div>

					                        <div class="form-group">

												<label class="form-label" for="email">{{ __('E-mail') }}</label>
												
												<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

												@error('email')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror

											</div>

											<div class="form-group">

												<label class="form-label" for="password">{{ __('Mot de passe') }}</label>
												
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

												@error('password')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror

											</div>

											<div class="form-group">
					                            
					                            <label for="password-confirm" class="form-label">{{ __('Confirmé le mot de passe') }}</label>

					                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

					                        </div>

					                        <div class="form-group custom-file mt-2">

					                        	<label class="custom-file-label" for="image">{{ __('Ajouter une photo') }}</label>

					                        	<input type="file" id="image" name="image" class="custom-file-input" id="customFile" accept="image/png, image/jpeg">

					                        </div>

										</div>

										<div class="col-md-12">
											<div class="form-group">
												<button type="submit" class="btn btn-primary mt-4">
				                                    {{ __('Mettre à jour mon profile') }}
				                                </button>
			                                </div>
										</div>

									</div>
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	@endsection