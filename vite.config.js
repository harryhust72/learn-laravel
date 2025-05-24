import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/scss/index.scss'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
            '@scss': __dirname + '/resources/scss',
            '@js': __dirname + '/resources/js',
        },
    },
});
