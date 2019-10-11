<!-- Togglable Password Reset Link -->
@if (Route::has('password.request'))
    <a class="is-link is-small" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
@endif
