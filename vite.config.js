import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/css/all.css',
                `resources/css/filament/admin/theme.css`
            ],
            refresh: true,
        }),
    ],
});
