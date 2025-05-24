<div class="books-item" id="book-{{ $book->id }}">
    <img src="{{ asset('storage/dac_nhan_tam.webp') }}" alt="{{ $book->title }}" class="books-item__image">
    <div class="books-item__content">
        <h2 class="books-item__content__title">{{ $book->title }}</h2>
        <p class="books-item__content__description">
            {{ $book->description }}
        </p>
        <p class="books-item__content__price">
            @vnd($book->price)
        </p>
        <div class="books-item__content__actions">
            @include('components.button', [
                'type' => 'button',
                'title' => 'Edit',
                'class' => 'books-item__content__actions--edit app-button--warning',
                'id' => "edit-" . $book->id
            ])
        @include('components.button', [
            'type' => 'submit',
            'title' => 'Delete',
            'class' => 'books-item__content__actions--delete app-button--danger',
            'id' => "delete-" . $book->id,
        ])
        </form>
    </div>
    </div>
</div>