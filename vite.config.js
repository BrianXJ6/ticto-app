import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        watch: {
            usePolling: true,
        },
        hmr: {
            host: "localhost",
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/Pages/Register.js",
            ],
            refresh: true,
        }),
    ],
});
