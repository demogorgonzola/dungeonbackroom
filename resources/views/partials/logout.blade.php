<div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">
            {{ __('Logout') }}
        </button>
    </form>
</div>
