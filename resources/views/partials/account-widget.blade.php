<?php
    // If logged-in, take user to their account page
    $account_url = route('login');
    $account_text = 'Login';
    // If NOT logged-in, take guest to the login page
    if(!Auth::guest()) {
        $account_url = route('account.index');
        $account_text = Auth::user()->name;
    }
?>

<!-- Account Widget Button -->
<a class="button is-primary is-inverted" href="{{ $account_url }}">
    <span class="icon">
        <i class="fas fa-user"></i>
    </span>
    <span>
        {{ __($account_text) }}
    </span>
</a>
