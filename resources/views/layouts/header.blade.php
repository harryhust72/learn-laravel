<div class="app__header">
    <div class="logo">
        <p class="logo__text">Harry Pham</p>
    </div>
    <ul class="navigation">
        <li class="navigation__item"><a href="{{ route('books.list') }}">Home</a></li>
    </ul>
    <form action="{{ route('books.list') }}" method="GET" class="search">
        @include('components.input', ['type' => 'text', 'name' => 'keyword', 'placeholder' => 'Search books...', 'required' => false])
        @include('components.button', ['type' => 'submit', 'title' => 'Search', 'class' => 'search__button'])
    </form>
</div>