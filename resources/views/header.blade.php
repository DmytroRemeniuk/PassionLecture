<div class="header-left">
    <a href="{{ route('homepage') }}">
        <img src="{{ asset('logo.png') }}" alt="logo de PassionLecture" height="50em">
    </a>
    <div class="links">
        <a class="{{ request()->routeIs('homepage') ? 'header-active' : 'header' }}" href="{{ route('homepage') }}">Accueil</a>
        <a class="{{ request()->routeIs('all-books') ? 'header-active' : 'header' }}" href="{{ route('all-books') }}">Tous les ouvrages</a>
    </div>
</div>
<div class="header-right">
    <div class="icon-align">
            <!-- vérifier les infos de l'utilisateur -->
            @if(Auth::user())
            <div class="icone">
            <a class="header-right" href="{{ route('profil', ['idUser' => Auth::id()]) }}">
                <img src="{{ asset('login.png') }}" alt="icone d'utilisateur" height="20px">
            </a>
                <a class="header-right" href="{{ route('profil', ['idUser' => Auth::id()]) }}">{{Auth::user()->name}}</a>
            </div>
            <div class="icone">
            <a class="header-right" href="{{ route('book.add') }}">
                <img src="{{ asset('plus.png') }}" alt="icone d'utilisateur" height="20px">
            </a>
                <a class="header-right" href="{{ route('book.add') }}">Ajouter<br>un livre</a>
            </div>
            <div class="icone">
            <a class="header-right" href="{{ route('user.deconnexion') }}">
                <img src="{{ asset('logout.png') }}" alt="icone de deconnexion" height="20px">
            </a>
                <a class="header-right" href="{{ route('user.deconnexion') }}">Logout</a>
            </div>
                @else
            <div class="icone">
                <a class="header-right" href="{{ route('login') }}">
                    <img src="{{ asset('login.png') }}" alt="icone d'utilisateur" height="30px">
                </a>
                <a class="header-right" href="{{ route('login') }}">Se connecter</a>
            </div>
            @endif

    </div>
</div>
