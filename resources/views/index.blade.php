@extends('layouts.app', ['title' => ''])

@section('content')

<section id="header">
    @include('layouts.partials.slide')
</section>

    <section id="about" class="about mt-5">
        <div class="container">

            <div class="section-title">
                <h2>Formations</h2>
                <p>Formations à la une</p>
            </div>
                
            <div class="row mb-3 trainers">
                @foreach($course as $cours)
                    <div class="card-group col-md-3 mb-4">
                        <div class="card formate member">
                            
                            @if($cours)
                             <a href="{{ route('formation.show', $cours->slug) }}" title="Cliquez pour voir la formation">
                           @endif
                             <img class="card-img-top" src="/images/courses/{{ $cours->image }}" alt="Card image cap">
                           @if($cours) </a> @endif

                            <div class="card-body member-content">
                                <h4>{{ $cours->title }}</h4>
                                <span>{{ $cours->user->name }}</span>
                            </div>
                            <div class="card-footer">
                                <span class="pull-left text-primary">{{ $cours->lessons->count() }} leçons</span>
                                <span class="pull-right">
                                    @if($cours->price == 0)
                                        <strong>GRATUIT</strong>
                                    @else
                                        <strong><span class="text-danger">#</span>{{ $cours->price}} fcfa</strong>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="centre">
                <a href="{{ route('formation') }}" class="btn learn-more-btn">Plus de formations</a>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="section-title once">
                <h2 class="text-white">Thématiques</h2>
                <p class="text-white">Nos thèmes de formation</p>
            </div>

            <section class="w3l-features-4">
                <!-- /features -->
                    <div class="features" id="services">
                        <div class="fea-gd-vv row">   
                           <div class="float-lt feature-gd col-lg-4 col-md-6">  
                                 <div class="icon"> <span class="fa fa-file-text-o" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">
                                        Education & Formation</a></h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                                 
                            </div>  
                            <div class="float-mid feature-gd col-lg-4 col-md-6 mt-md-0 mt-5">   
                                 <div class="icon"> <span class="fa fa-suitcase" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">Entrepreneuriat
                                    </a></h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                         </div> 
                            <div class="float-rt feature-gd col-lg-4 col-md-6 mt-lg-0 mt-5">    
                                 <div class="icon"> <span class="fa fa-clone" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">Management</a></h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                         </div>  
                         <div class="float-lt feature-gd col-lg-4 col-md-6 mt-5">   
                                 <div class="icon"> <span class="fa fa-bullseye" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">Vie sociale</a>
                                    </h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                                 
                            </div>  
                            <div class="float-mid feature-gd col-lg-4 col-md-6 mt-5">   
                                 <div class="icon"> <span class="fa fa-desktop" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">
                                        Informatiques & Programmation</a>
                                    </h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                         </div> 
                            <div class="float-rt feature-gd col-lg-4 col-md-6 mt-5">    
                                 <div class="icon"> <span class="fa fa-spinner" aria-hidden="true"></span></div>
                                 <div class="icon-info">
                                    <h5><a href="#">Langues</a>
                                    </h5>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiusmod tempor incididunt  </p>
                                </div>
                         </div>                      
                      </div>  
                   </div>
               <!-- //features -->
            </section>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-title teach">
                <h2>Formateurs</h2>
                <p>Nos formateurs</p>
            </div>
            <div class="row">
                @foreach(App\Models\Course::where('user_id')->get() as $teach)
                    <div class="col-md-4">
                        <div class="teach">
                            <center>
                                <img src="" alt="">
                            </center>
                            <h5>{{ $teach->name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="centre">
                <a href="" class="btn learn-more">Plus de formateurs</a>
            </div>

        </div>
    </section>

@endsection


