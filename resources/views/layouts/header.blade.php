<section class="hero is-small is-dark is-bold">
    <div class="hero-head">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-menu">
                    <div class="navbar-end">
                        @yield('head')
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="hero-body">
        <div class="container">
            <div class="column">
                @yield('body')
            </div>
        </div>
    </div>

    <div class="hero-foot">
        <nav class="level tabs">
            <div class="level-left has-text-centered">
                <p class="level-item is-active"><a href="/character">Overview</a></p>
                <p class="level-item"><a href="/item">Stuff</a></p>
            </div>
            <div class="level-right has-text-centered">
                <p class="level-item title is-3"><a>{{ Session::get('character_name') ?? 'None' }}</a></p>
            </div>
        </nav>
    </div>
</section>
