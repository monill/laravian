import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/css/app.css',
                'resources/css/activate.css',
                'resources/css/compact.css',
                'resources/css/compact1.css',
                'resources/css/chat.css',
                'resources/css/lang.css',
                // JS
                'resources/js/app.js',
                'resources/js/activate.js',
            ],
            refresh: true,
        }),
    ],
    build: { assetsInlineLimit: 0 }
});
