@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Mes formations') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @foreach($content as $item)
                            <div class="col-md-4 mb-4">
                               {{-- <img src="{{ asset('images/courses/'.$item->attributes['photo']) }}" alt="" title="" width="200" height="140"> --}}
                            </div>
                            <div class="col-md-4 pt-5">
                                <h3>{{ $item->title }}</h3>
                                <p class="text-muted">{{ $item->description }}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3 pt-5">
                                        <form action="{{ route('panier.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-md-9 pt-5">
                                        <form action="{{ route('record.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{ $record->id }}">
                                            <button class="btn btn-primary" type="submit" id="addcart">Confirmer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
