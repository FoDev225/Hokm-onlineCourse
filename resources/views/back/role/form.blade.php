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
          
            <form method="POST" action="@isset($role) {{ route('roles.update', $role->id) }} @else {{ route('roles.store') }} @endisset" enctype="multipart/form-data">
              <div class="card-body">
                @isset($role) @method('PUT') @endisset
                @csrf   
                
                <x-inputbs4
                  name="name"
                  type="text"
                  label="Nom"
                  :value="isset($role) ? $role->name : ''"
                ></x-inputbs4>
                <div class="form-group row mb-0">
                  <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des rôles</a>
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