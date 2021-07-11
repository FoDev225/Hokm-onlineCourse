@extends('back.layout') 

@section('main') 
  <div class="container-fluid">
    @if(app()->isDownForMaintenance())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Le site est en mode maintenance !
      </div>
    @endif
    @if(isset($notifications) && $notifications->count())
      <div class="row">
        @if(isset($newRecords))
          <div class="col-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $newRecords }}</h3>
                <p>
                	@if($newRecords === 1) Inscription à une formation 
                	@else Inscriptions à des formations @endif
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
              <form action="{{ route('read', 'records') }}" method="POST">
      				  @csrf
      				  @method('PUT')
      				  <button type="submit" class="btn btn-info btn-block text-warning">Purger</button>
      			  </form>
            </div>
          </div>
        @endif
        @if(isset($newUsers))
          <div class="col-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $newUsers }}</h3>
                <p>@if($newUsers === 1) Nouvel inscrit @else Nouveaux inscrits @endif</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
              <form action="{{ route('read', 'users') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success btn-block text-warning">Purger</button>
              </form>
            </div>
          </div>
        @endif
        {{-- @if($newUsers) --}}
          <div class="col-4">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $newUsers }}</h3>
                <p>
                  @if($newUsers === 1) Nouveau visiteur 
                  @else Nouveau visiteur @endif
                </p>
              </div>
              <div class="icon">
                <i class="fas fa-adjust"></i>
              </div>
              <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
              <form action="{{ route('read', 'users') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-secondary btn-block text-warning">Purger</button>
              </form>
            </div>
          </div>
        @endif
      </div>
    {{-- @endif --}}
  </div>
@endsection