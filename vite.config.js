import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'public/css/main.scss', 
                'public/js/slider.js',
                'public/js/countEstimation.js',
                'public/js/lazyImg.js',
                'public/js/addLaundry.js', 
                'public/js/rating.js', 
                'public/js/toggleSidebar.js', 
                'public/js/sendMessage.js', 
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
