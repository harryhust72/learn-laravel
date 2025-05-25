<div class="app-upload">
    @if(isset($label))
        <label for="file" class="app-upload__label">{{ $label }}</label>
    @endif
    <input type="file" 
        name="{{ $name ?? 'file' }}" 
        id="{{ $id ?? 'app-upload' }}" 
        class="app-upload__input {{ $class ?? '' }}" 
        accept=".jpg, .jpeg, .png, .gif, .webp"
        {{ $required ? 'required' : '' }}
        {{ $multiple ? 'multiple' : '' }} 
    />
    <span class="app-upload__error {{ $errorClass ?? '' }}"></span>
</div>