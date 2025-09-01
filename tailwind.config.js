import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sans: ["Pretendard", ...defaultTheme.fontFamily.sans],
                // sans: ["Spoqa Han Sans", ...defaultTheme.fontFamily.sans],

                spoqa: "Spoqa Han Sans",
                NanumSquareNeo: "NanumSquareNeo",
                Pretendard: "Pretendard",
            },
            // animation-fade
            animation: {
                fade: "fadeIn 1.5s ease-in-out",
            },
            transitionDuration: {
                1500: "1500ms",
                2000: "2000ms",
            },
            keyframes: {
                fadeIn: {
                    from: { opacity: 0 },
                    to: { opacity: 1 },
                },
            },
        },
        colors: {
            // primary: "#26405B",
            primary: "#093F5D",
            "esg-e": "#BACF42",
            "esg-s": "#A6D0F1",
            "esg-g": "#EAC349",
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
