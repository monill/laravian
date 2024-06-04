import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/activate.css',
                'resources/js/app.js',
                'resources/js/activate.js',
            ],
            refresh: true,
        }),
    ],
    build: { assetsInlineLimit: 0 }
});
