@extends('layouts.app', ['page' => 'books.list'])
@section('content')
    <x-modal title="Create new book" id="create-book-modal">
        <x-slot name=slot>
            @include('books.components.form')
        </x-slot>
    </x-modal>
    <x-modal title="Edit book" id="edit-book-modal">
        <x-slot name="slot">
            @include('books.components.form', ['id' => 'edit-book-form'])
        </x-slot>
    </x-modal>
    <div class="books">
        @include('components.button', [
            'type' => 'button',
            'title' => 'Create new book',
            'class' => 'app-button--warning',
            'id' => 'create-book-button',
        ])
        <div class="books__list" id="books__list">
                    @foreach ($books as $book)
                        @include('books.components.item', ['book' => $book])
                    @endforeach
        </div>
        </div>
@endsection

@push('scripts')
    @vite('resources/js/books/list')
@endpush