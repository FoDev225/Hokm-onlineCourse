@extends('back.layout')
@section('main') 
<div class="container-fluid">
  <div class="card">
    <h5 class="card-header">Identité</h5>
    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">Nom</dt>
        <dd class="col-sm-9">{{ $user->name }}</dd>      
        <dt class="col-sm-3">Statut</dt>
        <dd class="col-sm-9">{{ $user->statut }}</dd>      
        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></dd>      
        <dt class="col-sm-3 text-truncate">Date d'inscription</dt>
        <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y') }}</dd>
        <dt class="col-sm-3 text-truncate">Dernière mise à jour</dt>
        <dd class="col-sm-9">{{ $user->updated_at->format('d/m/Y') }}</dd>        
        <dt class="col-sm-3">Lettre d'information</dt>
        <dd class="col-sm-9">@if($user->newsletter) Oui @else Non @endif</dd>
      </dl>
    </div>
  </div>
  @if($user->records)
    <div class="card">
      <h5 class="card-header">Formations</h5>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>title</th>
              <th>description</th>
              <th>price</th>
              <th>Image</th>
              <th></th>
            </tr>
          </thead>    
          <tbody>
              @foreach($user->records as $record)
              <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->title }}</td>
                <td>{{ $record->description }} €</td>
                <td>{{ $record->price }}</td>
                <td style="text-align: center"><a href="#" class="btn btn-primary btn-sm">Voir</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
  <div class="form-group row mb-0">
    <div class="col-md-12">
      <a class="btn btn-primary" href="{{ route('users.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des utilisateurs</a>    
    </div>
  </div><br>
</div>
@endsection