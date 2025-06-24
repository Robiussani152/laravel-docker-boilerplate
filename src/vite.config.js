import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from "fs";
import dotenv from "dotenv";

dotenv.config();

export default defineConfig({
    server: {
        https: {
            key: fs.readFileSync("./storage/certs/laravel-docker.test-key.pem"),
            cert: fs.readFileSync("./storage/certs/laravel-docker.test.pem"),
        },
        host: "0.0.0.0",
        port: 5173,
        hmr: {
            host: process.env.APP_DOMAIN,
        },
        strictPort: true,
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
