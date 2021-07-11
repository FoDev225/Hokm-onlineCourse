@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="border-0 bg-light">
                <div class="p-2 px-3 text-uppercase">Formation</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Price</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Supprimer</div>
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($content as $item)
                <tr>
                <th scope="row" class="border-0">
                    <div class="p-2">
                        <img src="/images/{{ $item->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0">{{ $item->title }}</h5>
                            <span class="text-muted font-weight-normal font-italic d-block">{{ $item->description }}</span>
                        </div>
                    </div>
                </th>
                  <td class="border-0 align-middle"><strong>{{ number_format($item->price, 2, ',', ' ') }} fcfa</strong></td>
                  <form action="{{ route('panier.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td class="border-0 align-middle"><i class="far fa-trash-alt"></i></td>
                </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-6 offset-md-3 mt-4">
            <form  method="POST" action="{{ route('record.store') }}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                <button class="btn btn-primary btn-block" type="submit" id="addcart">S'inscrire à la formation</button>
            </form>
        </div>
        </div>
    </div>

@endsection