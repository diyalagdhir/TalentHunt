import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style-starter.css',
                'resources/js/bootstrap.min.js',
                'resources/js/circles.js',
                'resources/js/easyResponsiveTabs.js',
                'resources/js/jquery-1.9.1.min.js',
                'resources/js/jquery-2.1.4.min.js',
                'resources/js/jquery-3.3.1.min.js',
                'resources/js/owl.carousel.js',
                'resources/js/theme-change.js',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
