<li class="nav-item mr-4 {{ set_active_route('index') }}">
  <a class="nav-link" href="{{ route('index') }}">Accueil</a>
</li>
<li class="nav-item mr-4 {{ set_active_route('formation') }}">
  <a class="nav-link" href="{{ route('formation') }}">Formations</a>
</li>
<li class="nav-item mr-4">
  <a class="nav-link" href="#">A Propos</a>
</li>
<li class="nav-item mr-4">
  <a class="nav-link" href="{{ route('contacts.create') }}">Contacts</a>
</li>