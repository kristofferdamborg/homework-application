 <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        LOGO
                    </a>
                </div>

 
                    <div class="navigation">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    @role('admin')
                        <li><a href="{{ route('role.index') }}">Roles</a></li>
                        <li><a href="{{ route('school.index') }}">Schools</a><li>
                        <li><a href="{{ route('user.index') }}">Users</a></li>
                    @endrole
                    @role('school-admin')
                        <li><a href="{{ route('class.index') }}">Classes</a></li>
                        <li><a href="{{ route('user.index') }}">Teachers</a></li>
                        <li><a href="{{ route('subject.index') }}">Subjects</a></li>
                    @endrole
                     @role('teacher')
                        <li><a href="">HJEM</a></li>
                        <li><a href="{{ route('homework.index') }}">LEKTIER</a></li>
                        <li><a href="">KALENDER</a></li>
                    @endrole
                    </ul>
                    <ul class="nav-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Log ind</a></li>
                            <li><a href="{{ route('register') }}">Opret bruger</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    @if (! Auth::user()->avatar == NULL)
                                    <img class="avatar" src="{{ Auth::user()->avatar }}">
                                    @endif
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#">
                                            Profil
                                        </a>
                                    </li>
                                    <li class="separated-link">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
             </div>
            </div>
        </nav>