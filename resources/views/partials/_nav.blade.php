<header class="navcontainer navbar navbar-expand-sm bg-light">
    <!-- logo -->
    <img src="{{ Asset('images/logo/horizontal.png') }}" alt="Blind Computing" aria-label="Blind Computing Logo"
        class="nav-logo navbar-brand">
    <!-- nav toggler (for small screens) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navliinks"
        aria-label="Expand/collapse the navigation bar">
            <span class="navbar-toggler-icon"></span>
          </button>
    <!-- links -->
    <ul class="navbar-nav nav" role="navigation" id="navlinks">
        <li class="nav-item"><a href="/" class="nav-link active">Home</a></li>
        <li class="nav-item"><a href="" class="nav-link">Devices</a></li>
        <li class="nav-item"><a href="" class="nav-link">Operating Systems</a></li>
        <li class="nav-item"><a href="" class="nav-link">Software</a></li>
        <li class="nav-item"><a href="" class="nav-link">Downloads</a></li>
        <li class="nav-item"><a href="" class="nav-link">Community</a></li>
        <li class="nav-item"><a href="" class="nav-link">Blog</a></li>
    </ul>

    <ul class="nav navbar-nav ml-auto" role="navigation">
        @guest
        <li class="nav-item"><a href="{{ Route('login') }}" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="{{ Route('register') }}" class="nav-link">Register</a></li>
        @endguest
    </ul>
    @if(Auth::user())
    <!-- logout form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" aria-hidden="true">
        @csrf
    </form>
    @endif
</header>
