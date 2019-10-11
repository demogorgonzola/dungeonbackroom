<!-- Field -->
<div class="field">
    <!-- Field Label -->
    @isset($label)
        <label class="label">
            {{ __($label) }}
        </label>
    @endisset

    <!-- Field Content -->
    <div class="control @isset($icon) has-icons-left @endisset">
        <!-- Content -->
        {{ $slot }}

        <!-- Left Icon -->
        @isset($icon)
            <span class="icon is-left">
                <i class="fas fa-{{ $icon }}"></i>
            </span>
        @endisset
    </div>
</div>
