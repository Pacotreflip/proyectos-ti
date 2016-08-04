<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/">PROYECTOS TI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                @if(isset($proyecto))
                @include('partials.nav-app')
                @else
                @if(auth()->check())
                <li>
                    <a class="page-scroll" href="{{ route('proyectos.index') }}">Ver Proyectos</a>
                </li>
                @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @include ('partials.nav-user')
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>