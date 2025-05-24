@extends('layouts.app')
@section('content')
    <div class="books__detail">
        <div class="books__detail__image">
            <img src="{{ asset('storage/tmp.jpg') }}" alt="Book Image" />
        </div>
        <div class="books__detail__content">
            <div class="books__detail__content__title">
                <h2 class="books__detail__content__title">{{ $book->title }}</h2>
                <div class="books__detail__content__title__actions">
                    @include('components.button', ['type' => 'button', 'title' => 'Edit', 'class' => 'app-button--warning'])
                    <form action="{{ route('books.destroy', ['id' => $book->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        @include('components.button', ['type' => 'submit', 'title' => 'Delete', 'class' => 'app-button--danger'])
                    </form>
                </div>
            </div>
            <p class="books__detail__content__description">{{ $book->description }}</p>
            <p class="books__detail__content__price">{{ $book->price }} đ</p>
        </div>

    </div>
@endsection