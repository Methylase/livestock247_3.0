<div class="wrapper-menu fixed-top">
    <div class="wrapper-menu-content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('livestock247-template/img/desktop logo.png')}}" width="100%" height="25" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse adjust-menu navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{(request()->is('meat247')) ? 'active': ''}}" href="{{route('meat247')}}">Meat247</a>
                <a class="nav-item nav-link {{(request()->is('hoina')) ? 'active': ''}}" href="{{route('hoina')}}">Hoina</a>
                <a class="nav-item nav-link {{(request()->is('aims')) ? 'active': ''}}" href="{{route('aims')}}">Aims</a>
                <a class="nav-item nav-link {{(request()->is('livestalk')) ? 'active': ''}}" href="{{route('livestalk')}}">Livestalk</a>
                <a class="btn btn-primary touch-btn" href="{{route('get-in-touch')}}" role="button">Get in touch</a>
            </div>
            </div>
        </nav>
    </div>

</div>