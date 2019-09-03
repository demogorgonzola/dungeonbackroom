<form action="/logout" method="POST">
    @csrf
    <button type="submit" class="button is-danger">
        {{ __('Logout') }}
    </button>
</form>

