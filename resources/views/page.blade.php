@extends('layouts.app', ['title' => $page->title ])

@section('content')

  <section class="pag bg-primary">
    <div class="container">
      <h3 class="text-white">{{ $page->title }}</h3>
    </div>
  </section>

  <div class="container mt-4">
    <div class="text-justify">
      {!! $page->text !!}
    </div>
  </div>

@endsection