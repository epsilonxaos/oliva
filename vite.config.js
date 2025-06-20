import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import { readFileSync } from "fs";
import react from "@vitejs/plugin-react";

export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), "");
    const host = env.SERVER_HOST;
    const isProduction = mode === "production";

    console.log(`Mode: ${mode}`);
    console.log(`isProduction: ${isProduction}`);
    console.log(`Server Host: ${host}`);

    return {
        server: false,
        plugins: [
            laravel({
                input: [
                    "resources/css/app.css",
                    "resources/css/panel/app.css",
                    "resources/js/app.js",
                    "resources/js/react/App.jsx",
                    "resources/js/panel/trumbowygInit.js",
                ],
                refresh: true,
            }),
            react(),
        ],
    };
});
