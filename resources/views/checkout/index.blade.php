@extends('layouts.app', ['title' => 'Paiement' ])

@section('content')
	
	<section class="bg-primary">
		<div class="container">
			<h1 class="text-white">Page de paiement</h1>
		</div>
	</section>
	<div class="container system">
		<div class="row">
		<div class="col-md-8 offset-md-2">
			{{-- <div>
				<div class="row d-flex align-items-center">
            <div class="col-md-3">
                <img style="width: 70%" src="/images/courses/{{ $course->image }}" class="rounded">
            </div>
            <div class="col-md-7">
                <h3 class="font-weight-bold">{{ $course->title }}</h3>
            </div>
        </div>
			</div> --}}
			<div id="payment-pending" class="card p-2">
			  <div class="card-content text-center">
			    <span class="card-title">Veuillez compléter le présent formulaire pour procéder au règlement</span>
			    <p class="text-secondary">
			    	Nous ne conservons aucune de ces informations sur notre site, elles sont directement transmises à notre prestataire de paiement <a href="https://stripe.com/fr">Stripe</a>. <br>
			    	La transmission de ces informations est entièrement sécurisée.
			    </p>
			    <br>
			    <div class="row">
			      	<form id="payment-form">        
				        <div class="card bg-secondary">
				          <div class="card-content text-white">
				            <div id="card-element"></div>
				          </div>
				        </div>
				        <div id="card-errors" class="helper-text text-danger"></div>
				        <br>
				        <div id="wait" class="hide">
				          <div class="loader"></div>
				          <br>
				          <p><span class="text-danger card-title text-center">Processus de paiement en cours, ne fermez pas cette fenêtre avant la fin du traitement !</span></p>
				        </div>
				        <button style="float: right;" class="btn btn-primary" id='submit' type="submit" name="action">Payer
				          <i class="fa fa-credit-card"></i>
				        </button>
			      	</form>
			    </div>
			  </div>
			</div>
		</div>
		</div>
	</div>

@endsection

@section('extra-js')
  {{-- @include('checkout.stripejs') --}}
@endsection