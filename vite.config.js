import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    publicDir: 'public',
    build: {
        outDir: 'public/build',
    },
    plugins: [
        laravel({
            publicDirectory: 'public',
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: process.env.IS_DDEV_PROJECT ? {
        strictPort: true,
        host: true,
        hmr: {
            host: process.env.DDEV_HOSTNAME.split(',')[0],
            protocol: 'wss',
        }
    } : {},
});
