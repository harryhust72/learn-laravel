<div class="create-book-form">
    <form method="post" action="{{ route('books.store') }}" class="create-book-form__form"
        id="{{ $id ?? 'create-book-form' }}">
        @csrf
        @include('components.input', [
            'name' => 'title',
            'label' => 'Title',
            'placeholder' => 'Enter book title',
            'required' => true,
            'errorClass' => 'error-title'
        ])
        @include('components.input', [
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Enter book description',
            'required' => true,
            'error' => $errors->first('description'),
            'errorClass' => 'error-description'
        ])
        @include('components.input', [
            'name' => 'price',
            'label' => 'Price',
            'placeholder' => 'Enter book price',
            'type' => 'number',
            'required' => true,
            'error' => $errors->first('price'),
            'errorClass' => 'error-price'
        ])
    </form>
</div>