import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flyonui from "flyonui";
import plugin from "flyonui/plugin";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flyonui/dist/js/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
            },
        },
    },

    plugins: [forms, flyonui, plugin],
    flyonui: {
        themes: ['dark']
    }
};
