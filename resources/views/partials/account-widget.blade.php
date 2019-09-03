<?php
    $account_url = route('login');
    $account_text = 'Login';
    if(!Auth::guest()) {
        $account_url = route('account.index');
        $account_text = Auth::user()->name;
    }
?>

<a class="button is-primary is-inverted" href="{{ $account_url }}">
    <span class="icon">
        <i class="fas fa-user"></i>
    </span>
    <span>
        {{ __($account_text) }}
    </span>
</a>
