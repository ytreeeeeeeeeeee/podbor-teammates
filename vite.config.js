import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'public/js/app.js',
                'resources/js/components/chatIndex.jsx',
                'resources/js/context/chatContext.jsx',
            ],
            refresh: true,
        },),
        react({fastRefresh: false}),
    ],
});
