@php
/**
* An associative array holding the names of each nav-link and their route names.
*
* @var array
*/
$nav_pages = [
'Home' => ['home'],
'Devices' => ['category', 'devices'],
'Operating Systems' => ['category', 'operating-systems'],
'Software' => ['category', 'software'],
'Downloads' => ['notimplemented'],
'Community' => ['notimplemented'],
'Blog' => ['category', 'blog'],
];
@endphp

<header class="navcontainer navbar navbar-expand-sm bg-light">
    <!-- logo -->
    <img src="{{ Asset('images/logo/horizontal.png') }}" alt="Blind Computing" aria-label="Blind Computing Logo"
        class="nav-logo navbar-brand" title="Credit: @reallinfo on Github">
    <!-- nav toggler (for small screens) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navlinks"
        aria-label="Expand/collapse the navigation bar">
            <span class="navbar-toggler-icon"></span>
          </button>
    <!-- links -->
    <ul class="navbar-nav nav" role="navigation" id="navlinks">
        @foreach($nav_pages as $name=>$routeName)
        <li class="nav-item"><a href="
{{ call_user_func_array('Route', $routeName) }}
            " class="nav-link {{ Route::currentRouteNamed($routeName)? ' active': '' }}">{{ $name }}</a></li>
        @endforeach
    </ul>

    <ul class="nav navbar-nav ml-auto" role="navigation">
        <li class="nav-item dropdown">
            <a role="button" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                aria-controls="account-menu" id="account-btn" aria-haspopup="true" title="
                {{ Auth::check()? 'View profile, edit settings and log out.': 'Login to post comments, replies, suggestions and more.' }}
                ">
                @guest
                Account
                @else
                {{ __('@' . Auth::user()->user_name ) }}
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right" id="dropdown-menu" role="menu"
                aria-describedby="account-btn">
                @guest
                <a role="menuitem" href="{{ Route('login') }}" class="dropdown-item">Login</a>
                <a role="menuitem" href="{{ Route('register') }}" class="dropdown-item">Register</a>
                @else
                <a role="menuitem" href="/profile" class="dropdown-item">My Profile</a>
                @if(Auth::user()->type == 'admin')
                <div class="dropdown-divider"></div>
                <a role="menuitem" href="/admin" class="dropdown-item">Admin Panel</a>
                @endif
                <div class="dropdown-divider"></div>
                    <a role="menuitem" class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">Log Out</a>
                @endguest
            </div>
        </li>
    </ul>
    @if(Auth::user())
    <!-- logout form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" aria-hidden="true">
        @csrf
    </form>
    @endif
</header>
