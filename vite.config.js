import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import reactRefresh from '@vitejs/plugin-react-refresh'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/components/chatIndex.jsx',
                'resources/js/context/chatContext.jsx',
            ],
            refresh: true,
        },),
        react({fastRefresh: false}),
        // reactRefresh(),
    ],
});
