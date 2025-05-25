<div class="create-book-form">
    <form method="post" action="{{ route('books.store') }}" class="create-book-form__form" enctype="multipart/form-data"
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
            'errorClass' => 'error-description'
        ])
        @include('components.input', [
            'name' => 'price',
            'label' => 'Price',
            'placeholder' => 'Enter book price',
            'type' => 'number',
            'required' => true,
            'errorClass' => 'error-price'
        ])
        @include('components.upload', [
            'name' => 'image',
            'label' => 'Image',
            'required' => true,
            'errorClass' => 'error-image',
            'multiple' => false,
        ])
    </form>
</div>