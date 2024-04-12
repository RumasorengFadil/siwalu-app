import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/main.scss', 'public/js/slider.js'],
            refresh: true,
        }),
    ],
});
