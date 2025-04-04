import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'node_modules/bootstrap/dist/css/bootstrap.min.css', 
                'resources/js/app.js', 
                'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
                ],
            refresh: true,
        }),
    ],
});
