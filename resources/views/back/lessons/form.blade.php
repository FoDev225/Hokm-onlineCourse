@extends('back.layout')

  @section('css')
    <style>
      .custom-file-label::after { content: "Parcourir"; }
    </style>
  @endsection

@section('main') 
  <div class="container-fluid"> 
    @if(session()->has('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('alert') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        
          <form method="POST" action="@isset($lessons) 
            {{ route('lessons.update', $lessons->id) }} @else {{ route('lessons.store') }} 
            @endisset" enctype="multipart/form-data">

            <div class="card-body">
              @isset($lessons) @method('PUT') @endisset
              @csrf   
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="course_id" class="col-form-label text-md-right">Titre de la formation</label>
                </div>
                  <div class="col-md-12">
                    <select class="form-control" id="course_id" name="course_id" required>
                      <option value="">Veuillez choisir...</option>
                      @foreach(App\Models\Course::get() as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <x-inputbs4
                name="title"
                type="text"
                label="Titre"
                :value="isset($lessons) ? $lessons->title : ''"
              ></x-inputbs4>

              <x-inputbs4
                name="slug"
                type="text"
                label="Slug"
                :value="isset($lessons) ? $lessons->slug : ''"
              ></x-inputbs4>

              <div class="form-group">
                <label class="form-label" for="full_text">Sélectionnez une vidéo...</label>
                <input class="form-control" type="file"
                       id="full_text" name="full_text"
                     accept="video/*,.pdf">
              </div>

              <x-inputbs4
                name="position"
                type="text"
                label="Ordre"
                :value="isset($lessons) ? $lessons->position : ''"
                required="true"
              ></x-inputbs4>
              
              <div class="form-group row mb-0">
                <div class="col-md-12">
                  <a class="btn btn-primary" href="{{ route('lessons.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des leçons</a>
                   <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </div>
              
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')

  <script>
    $(document).ready(() => {
      $('form').on('change', '#image', e => {
        $(e.currentTarget).next('.custom-file-label').text(e.target.files[0].name);
      });
      $('#changeImage').click(e => {
        $(e.currentTarget).parent().hide();
        $('#wrapper').html(`
          <div id="image" class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input" required>
            <label class="custom-file-label" for="image"></label>
          </div>`
        );
      });
    });
  </script>
@endsection