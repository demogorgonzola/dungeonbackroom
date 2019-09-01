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
                @yield('footer-left')
            </div>
            <div class="level-right has-text-centered">
                @yield('footer-right')
            </div>
        </nav>
    </div>
</section>
