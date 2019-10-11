<!-- Tab -->
<li @if(isset($is_active) && $is_active) class="is-active" @endif>
    <a class="{{ $class }}" @empty($is_active) href="{{ $route }}" @endempty>
        {{ $slot }}
    </a>
</li>
