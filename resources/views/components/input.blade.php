<div class="app-input">
    @if(isset($label))
        <label for="{{ $name }} class=" app-input__label">{{ $label }}</label>
    @endif
    <input type={{ $type ?? 'text' }} name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} class="app-input__input {{ $class ?? '' }}">
    <span class="app-input__error {{ $errorClass ?? '' }}"></span>
</div>