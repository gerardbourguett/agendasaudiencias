import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const vuePlugin = require("@vitejs/plugin-vue");

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
        vuePlugin(),
    ],
    build: {
        outDir: "dist",
    },
});
