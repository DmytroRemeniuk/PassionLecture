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
    <a class="header-right" href="{{ route('login') }}">Login</a>
</div>