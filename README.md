# About this project
This is a mini project applying basic Laravel knowledge.

# Setup

Follow these steps to set up the project:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/harryhust72/learn-laravel.git
   cd learn-laravel
2. **Install dependencies**

    Make sure you have Composer installed, then run:

    ```bash
    composer install
3. **Set up ENV**
    ```bash
    cp .env.example .env
    ```
    Then update .env by your configuration.

    **Note**:
    Make sure to configure Cloudinary properly; otherwise, image uploads will not work.

4. **Generate application key**

    ```bash
    p artisan key:generate
5. **Run DB Migration**

    ```bash
    php artisan migrate
6. **Install Front-end Dependencies**
    ```bash
    npm install
7. **Start the development server**
    ```bash
    php artisan serve
    npm run dev

# Future
1. For current page (Book list)
```
- Add pagination
- Using thumbnails instead of original images when showing book item
- ...
```

2. Other pages/features
```
- Add authentication and authorization feature (Add several of the actors)
- Book detail 
    - Show more information
    - Run sale programs
    - Can preview some pages
- Author CRUD
- Add books to cart and buy books
- ...
```
