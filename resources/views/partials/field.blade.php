<div class="field">
    @isset($label)
    <label class="label">
        {{ $label }}
    </label>
    @endisset
    <div class="control @isset($icon) has-icons-left @endisset">
        {{ $slot }}
        @isset($icon)
        <span class="icon is-left">
            <i class="fas fa-{{ $icon }}"></i>
        </span>
        @endisset
    </div>
</div>
