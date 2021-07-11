@extends('layouts.app', ['title' => $course->title ])

@section('content')

    <div class="container system">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <h2 class="mb-5"><a href="">Commencer </a>la formation {{ $course->title }}</h2>
            <div class="list-group">
                @foreach($course->lessons as $lesson)
                    <a class="list-group-item d-flex justify-content-between align-items-center text-dark" href="{{ route('lesson.show', $lesson->slug) }}">{{ $loop->iteration }}. {{ $lesson->title }} <span class="badge badge-primary badge-pill p-2">Démarrer</span></a>
                @endforeach
            </div>
          </div>
        </div>
    </div>

@endsection
