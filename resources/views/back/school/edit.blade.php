@extends('back.layout')
@section('main') 
  <div class="container-fluid"> 
    @if(session()->has('alert'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        
          <form method="POST" action="#">
            <div class="card-body">
              @method('PUT')
              @csrf
              <div class="card">
                <h5 class="card-header">Identité</h5>
                <div class="card-body">
          
                  <x-inputbs4
                    name="name"
                    type="text"
                    label="Nom"
                    :value="$school->name"
                  ></x-inputbs4>
                  <x-inputbs4
                    name="email"
                    type="email"
                    label="Email"
                    :value="$school->email"
                  ></x-inputbs4>
                  
                  <x-inputbs4
                    name="phone"
                    type="text"
                    label="Téléphone"
                    :value="$school->phone"
                  ></x-inputbs4>
                  <x-inputbs4
                    name="facebook"
                    type="text"
                    label="Facebook"
                    :value="$school->facebook"
                  ></x-inputbs4>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Accueil</h5>
                <div class="card-body">
          
                  <x-inputbs4
                    name="home"
                    type="text"
                    label="Titre"
                    :value="$school->home"
                  ></x-inputbs4>
                  <x-textareabs4
                    name="home_infos"
                    label="Informations générales"
                    :value="$school->home_infos"
                  ></x-textareabs4>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-12">
                   <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </div>
              
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection