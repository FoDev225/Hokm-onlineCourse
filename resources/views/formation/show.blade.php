@extends('layouts.app', ['title' => $course->title ])

@section('content')
    
    <div class="container-fluid bg-primary p-4 text-white">
        <div class="container pt-3">
            <div class="row">

                <div class="col-md-9">
                    <h1>{{ $course->title }}</h1>
                    <p class="text-white">{!! $course->description !!}</p>
                    <p>A propos : {{ $course->lessons->count() }} leçons</p>
                    <p>{{ $course->price }} Fcfa</p>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card-group mb-4 align-content-center">
                        <div class="card formate member">
                            
                             <img class="card-img-top" src="/images/courses/{{ $course->image }}" alt="Card image cap">

                            <div class="card-body member-content">
                                <form  method="POST" action="{{ route('record.store') }}">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ $course->id }}">
                                    <button class="btn btn-primary" type="submit" id="addcart">S'inscrire gratuitement</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <section class="pedag d-flex align-items-center">
        <div class="equipes">
            <h2 class="font-weight-bold">Equipe de la formation</h2>
            <div class="row forme d-flex align-items-center">
                <div class="col-md-3 imag">
                    <img src="/images/users/{{ $course->user->photo }}" alt="">
                </div>
                <div class="col-md-9 text-left">
                    <h3 class="font-weight-bold">{{ $course->user->name }}</h3 class="text-bold">
                    <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, suscipit, quod? Eos modi minima sapiente optio quis fuga, alias nobis quidem, placeat. Veniam, tempora !</p>
                </div>
            </div>
        </div>
    </section>
    <section class="plan">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="text-danger">Plan du cours</h1>
                    <ol>
                        @foreach($course->lessons as $list_lesson)
                            <li>{{ $list_lesson->title }}</li>
                        @endforeach
                    </ol>
                </div>
            </div> 
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="mb-5 tt"><i class="fa fa-question-circle"></i> QUESTIONS FRÉQUEMMENT POSÉES</h1>
                    <div class="quest">
                        <h3>Quand commence et se termine le cours ?</h3>
                        <p>Le cours commence maintenant et ne se termine jamais ! Il s'agit d'un cours en ligne entièrement auto-rythmé - vous décidez quand vous commencez et quand vous finissez.</p>
                    </div>
                    <div class="quest">
                        <h3>Combien de temps ai-je accès au cours ?</h3>
                        <p>Comment sonne l'accès à vie ? Après votre inscription, vous avez un accès illimité à ce cours aussi longtemps que vous le souhaitez - sur tous les appareils que vous possédez.</p>
                    </div>
                    <div class="quest">
                        <h3>Que faire si je ne suis pas satisfait du cours ?</h3>
                        <p>Nous ne voudrions jamais que vous soyez malheureux ! Si vous n'êtes pas satisfait de votre achat, contactez-nous dans les 30 premiers jours et nous vous rembourserons intégralement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection