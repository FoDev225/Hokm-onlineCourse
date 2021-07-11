@extends('back.layout')
  
  @section('main')

    <div class="card">
      <h5 class="card-header">Formation enregistrée
        <span class="badge badge-primary">N° {{ $record->id }}</span> : 
        <span class="badge badge-primary">{{ $record->title }}</span>
      </h5>
        <div class="card">
          <h5 class="card-header">Formations</h5>
          <div class="card-body">
              <br>
              <div class="row">
                <div class="col m6 s12">
                  <p><strong>Titre :</strong> {{ $record->title }}</p>
                  <p><strong>Coût :</strong> <span class="text-primary">{{ number_format($record->price, 2, ',', ' ') }} fcfa</span></p>
                </div>
                <div class="col m6 s12">
                  <p><strong>Reférence :</strong> {{ $record->reference }}</p>
                  <p><strong>Date d'inscription :</strong> {{ $record->created_at->format('d/m/Y') }}</p>
                </div>
              </div>
          </div>
        </div>
    </div>
    <div class="card">
      <h5 class="card-header">Apprenant : 
      <a href="{{ route('users.show', $record->user_id) }}"><span class="badge badge-primary"></span></a>  
        <span class="badge badge-primary">N° {{ $record->user_id }}</span>
      </h5>
      <div class="card-body">
        <div class="card">
          <div class="card-body">
            <dl class="row">  
              <dt class="col-sm-3">Email</dt>
              <dd class="col-sm-9"><a href="mailto:{{ $record->user_email }}">{{ $record->user_email }}</a></dd>
            </dl>
          </div>
        </div>
      </div>
    </div>

  @endsection