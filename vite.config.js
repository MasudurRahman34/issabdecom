import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                // 'resources/js/app.js',

                'resources/css/backend/dashboard.css',
                'resources/js/backend/dashboard.js',
                //'resources/js/backend/dashboard2.js',
            ],
            refresh: true,
        }),
    ],
});
