@extends('layouts.app', ['title' => 'Tableau de bord'])

@section('content')

    <div class="container system">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.partials.alert')
                <div class="card">
                    <div class="card-header font-weight-bold text-danger"><h4>Mes formations</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse($course as $item)
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-md-3">
                                    <img style="width: 70%" src="/images/courses/{{ $item->image }}" class="rounded">
                                </div>
                                <div class="col-md-7">
                                    <h3 class="font-weight-bold">{{ $item->title }}</h3>
                                    <span class="text-primary">Plan : {{ $item->lessons->count() }} lessons</span>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('cours.show', $item->slug) }}" class="btn btn-outline-primary">Voir la formation</a>
                                </div>
                            </div>
                        @empty
                            <h5> Vous n'avez aucune formation enregistré.</h5>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
