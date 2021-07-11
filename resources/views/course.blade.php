@extends('layouts.app', ['title' => 'Formations'])

	@section('content')

		<div class="container system">
			<div class="row search mb-3">
				<div class="pull-left course-filter">
					<div class="filter-label"><h5 class="text-danger">Catégorie:</h5></div>
					<div class="btn-group">
				      	<button class="btn btn-default btn-lg btn-course-filter dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
				      		 
				      		<span class="caret"></span>
				      	</button>
				      	<ul class="dropdown-menu" role="menu">
				      		<li class="nav-item">
				      			<a class="nav-link" href="{{ route('formation') }}">Toutes</a>
				      		</li>
				      		@foreach($categories as $category)
				      			<li class="nav-item">
				      				<a class="nav-link" href="/course?category={{ $category->id }}">
				      						{{ $category->name }} 
				      					<span class="badge badge-primary">{{ $category->courses->count() }}</span>
				      				</a>
				      			</li>
				      		@endforeach
				      	</ul>
			        </div>
				</div>
			</div>

			<div>
				<div class="row trainers">
					@foreach($courses as $course)
						<div class="card-group col-md-3 mb-4">
							<div class="card formate member">
								@if($course)
					              	<a href="{{ route('formation.show', $course->slug) }}" title="Cliquez pour voir la formation">
					            @endif
					            	<img class="card-img-top" src="/images/courses/{{ $course->image }}" alt="Card image cap">
				           		@if($course) </a> @endif
				           		<div class="card-body member-content">
				           			<h4>{{ $course->title }}</h4>
				           			<span>{{ $course->user->name }}</span>
				           		</div>
				           		<div class="card-footer">
				           			<p class="pull-right">{{ $course->lessons->count() }} leçons</p>
				           			<p>
					           			@if($course->price == 0)
					           				<strong>GRATUIT</strong>
					           			@else
					           				<strong><span class="text-danger">#</span>{{ $course->price}} fcfa</strong>
					           			@endif
					           		</p>
				           		</div>
							</div>
						</div>
					@endforeach
				</div>
				<hr>
				<div class="d-flex">
					<div class="p-2"><span class="badge badge-light text-danger">
						{{ $courses->count() }}</span>résultats
					</div>
					<div class="ml-auto p-2">
						{{ $courses->appends(request()->input())->links() }}
					</div>
				</div>
			</div>
		</div>

	@endsection