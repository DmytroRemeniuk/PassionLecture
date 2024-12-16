<a href="{{ route('homepage') }}">
    <img src="{{ asset('img/logo.png') }}" alt="logo de PassionLecture" height="40em">
</a>
<div id="header">
    <a href="{{ route('homepage') }}">Accueil</a>

    <a href="{{ route('all-books') }}">Tous les ouvrages</a>

    @if(session()->has('name'))
        <a href="{{ route('profil') }}">Profil</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
</div>