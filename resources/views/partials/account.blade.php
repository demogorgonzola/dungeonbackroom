<a class="button is-primary is-inverted"
    href="@guest {{ route('login') }} @else /user/{{ Auth::user()->id }} @endguest">
    <span class="icon">
        <i class="fas fa-user"></i>
    </span>
    <span>
        @guest
        Login
        @else
        {{ Auth::user()->name }}
        @endguest
    </span>
</a>
