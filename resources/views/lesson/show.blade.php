@extends('layouts.app', ['title' => $lesson->title ])

@section('content')
    
    <section class="pag bg-primary">
        <div class="container">
            <h3 class="text-white">{{ $lesson->course->title }}</h3>
        </div>
    </section>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row ls">
                  <div class="col-md-3 cl p-2">
                    <div class="list-group">
                        @foreach($lesson->course->lessons as $list_lesson)
                            <a href="{{ route('lesson.show', $list_lesson->slug) }}" class="list-group-item text-dark" @if($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>
                                {{ $loop->iteration }}. {{ $list_lesson->title }}
                            </a>
                        @endforeach
                    </div>
                  </div>
                  <div class="col-md-9 p-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" 
                            src="{{ asset('storage/lessons/videos/' .$lesson->full_text) }}">
                        </iframe>
                    </div>

                  </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-10 offset-md-1">
                <p>{{ $lesson->course->title }} : {{ $lesson->title }}</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5>
                    {{ $lesson->comments->count() }} Commentaire<span>@if($lesson->comments->count() > 1)s @endif</span>
                </h5>
                @forelse($lesson->comments as $list_comment)
                    <div>
                        <p>{{ $list_comment->body }}</p>
                    </div>
                @empty
                    <p>Aucun commentaire</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
