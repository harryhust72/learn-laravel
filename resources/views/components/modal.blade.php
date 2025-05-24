@php
    $id = $id ?? 'app-modal';
@endphp

<div class="app-modal {{ $class ?? '' }}" id="{{ $id ?? '' }}">
    <div class="app-modal__wrapper">
        <h2 class="app-modal__title">{{ $title ?? '' }}</h2>
        <div class="app-modal__body">
            {{ $slot }}
        </div>
        <div class="app-modal__footer">
            @include('components.button', [
                'type' => 'button',
                'title' => 'Cancel',
                'id' => 'close-modal-button-' . $id,
            ])
            @include('components.button', [
                'type' => 'button',
                'title' => 'Submit',
                'class' => 'app-button--warning',
                'id' => 'modal-submit-button-' . $id,
            ])
        </div>
    </div>
</div>