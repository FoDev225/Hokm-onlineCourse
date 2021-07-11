@extends('back.layout')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('main')

  {{ $dataTable->table(['class' => 'table table-bordered table-hover table-sm'], true) }}
  @if(Route::currentRouteName() === 'pages.index')
    <a class="btn btn-primary" href="{{ route('pages.create') }}" role="button">Créer une nouvelle page</a>
  @endif
  
@endsection

@section('js')

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
  
  {{ $dataTable->scripts() }}
  
@endsection