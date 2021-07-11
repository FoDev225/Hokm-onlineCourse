<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  Theme style
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"> --}}
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('index') }}" class="nav-link">Accueil</a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <x-menu-item 
              :href="route('admin')" 
              icon="tachometer-alt" 
              :active="currentRouteActive('admin')">
              Tableau de bord
            </x-menu-item>
            <x-menu-item 
              :href="route('records.index')" 
              icon="shopping-basket"
              :active="currentRouteActive('records.index', 'records.show')">
              Inscription à la formation
            </x-menu-item>
            <li class="nav-item has-treeview {{ menuOpen(
                'users.index', 
                'users.show',
                'users.create' 
              )}}">
              <a href="#" class="nav-link {{ currentRouteActive(
                  'users.index', 
                  'users.show',
                  'users.create'
                )}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Gestion des utilisateurs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <x-menu-item :href="route('permission.index')" :sub=true :active="currentRouteActive('permission.index')">
                  Permissions
                </x-menu-item>
                <x-menu-item :href="route('role.index')" :sub=true :active="currentRouteActive('role.index')">
                  Rôles
                </x-menu-item>
                <x-menu-item :href="route('users.index')" :sub=true :active="currentRouteActive('users.index', 'users.show')">
                  Utilisateurs
                </x-menu-item>
              </ul>
            </li>
            <li class="nav-item has-treeview {{ menuOpen('categories.index', 'categories.edit', 'categories.create', 'categories.destroy.alert') }}">
              <a href="#" class="nav-link {{ currentRouteActive('categories.index', 'categories.edit', 'categories.create', 'categories.destroy.alert') }}">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Categories
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <x-menu-item :href="route('categories.index')" :sub=true :active="currentRouteActive('categories.index', 'categories.edit' , 'categories.destroy.alert')">
                  Liste des categories
                </x-menu-item>
                <x-menu-item :href="route('categories.create')" :sub=true :active="currentRouteActive('categories.create')">
                  Nouvelle categories
                </x-menu-item>
              </ul>
            </li>
            <li class="nav-item has-treeview {{ menuOpen('courses.index', 'courses.edit', 'courses.create' , 'courses.destroy.alert') }}">
              <a href="#" class="nav-link {{ currentRouteActive('courses.index', 'courses.edit', 'courses.create' , 'courses.destroy.alert') }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Formations
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <x-menu-item :href="route('courses.index')" :sub=true :active="currentRouteActive('courses.index', 'courses.edit', 'courses.destroy.alert')">
                  Liste des formations
                </x-menu-item>
                <x-menu-item :href="route('courses.create')" :sub=true :active="currentRouteActive('courses.create')">
                  Nouvelle formation
                </x-menu-item>
              </ul>
            </li>
            <li class="nav-item has-treeview {{ menuOpen('lessons.index', 'lessons.edit', 'lessons.create' , 'lessons.destroy.alert') }}">
              <a href="#" class="nav-link {{ currentRouteActive('lessons.index', 'lessons.edit', 'lessons.create' , 'lessons.destroy.alert') }}">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>
                  Leçons
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <x-menu-item :href="route('lessons.index')" :sub=true :active="currentRouteActive('lessons.index', 'lessons.edit' , 'lessons.destroy.alert')">
                  Liste des leçons
                </x-menu-item>
                <x-menu-item :href="route('lessons.create')" :sub=true :active="currentRouteActive('lessons.create')">
                  Nouvelle leçon
                </x-menu-item>
              </ul>
            </li>
            
            <x-menu-item 
              :href="route('statistics', now()->year)" 
              icon="chart-bar"
              :active="currentRouteActive('statistics')">
              Statistiques
            </x-menu-item>

            <li class="nav-item has-treeview {{ menuOpen(
                  'school.edit',
                  'school.update',
                  'pages.index',
                  'pages.edit',
                  'pages.create',
                  'pages.destroy.alert',
                  'maintenance.edit'
              ) }}">
              <a href="#" class="nav-link {{ currentRouteActive(
                  'school.edit',
                  'school.update',
                  'pages.index',
                  'pages.edit',
                  'pages.create',
                  'pages.destroy.alert',
                  'maintenance.edit'
                ) }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Administration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <x-menu-item :href="route('school.edit')" :sub=true :active="currentRouteActive('school.edit', 'school.update')">
                  L'école
                </x-menu-item>
                <x-menu-item :href="route('pages.index')" :sub=true :active="currentRouteActive(
                    'pages.index',
                    'pages.edit',
                    'pages.create',
                    'pages.destroy.alert'
                  )">
                  Pages
                </x-menu-item>
                <x-menu-item :href="route('maintenance.edit')" :sub=true :active="currentRouteActive('maintenance.edit')">
                  Maintenance
                </x-menu-item>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          @yield('main')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ config('app.name') }}</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/js/adminlte.min.js"></script>

<script src="/vendor/datatables/buttons.server-side.js"></script>

@yield('js')

</body>
</html>
