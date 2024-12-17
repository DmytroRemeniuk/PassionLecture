<div id="header-left">
    <a href="{{ route('homepage') }}">
        <img src="{{ asset('logo.png') }}" alt="logo de PassionLecture" height="50em">
    </a>
    <div class="links">
        <a class="{{ request()->routeIs('homepage') ? 'header-active' : 'header' }}" href="{{ route('homepage') }}">Accueil</a>
        <a class="{{ request()->routeIs('all-books') ? 'header-active' : 'header' }}" href="{{ route('all-books') }}">Tous les ouvrages</a>
    </div>
</div>
<div id="header-right">
    <div id="icon-align">
    <img src="{{ asset('login.png') }}" alt="icone d'utilisateur" height="30px">
    <div id="header">
        <!-- vérifier les infos de l'utilisateur -->
        @if(Auth::user())
        <a class="header-right" href="{{ route('profil') }}">{{Auth::user()->name}}</a>
        <img src="{{ asset('login.png') }}" alt="icone d'utilisateur" height="30px">
        <a class="header-right" href="{{ route('book.add') }}">Ajouter un livre</a>
        <a class="header-right" href="{{ route('user.deconnexion') }}">Deconnexion</a>
        @else
        <a class="header-right" href="{{ route('login') }}">Se connecter</a>
        @endif
    </div>
    </div>
</div>
