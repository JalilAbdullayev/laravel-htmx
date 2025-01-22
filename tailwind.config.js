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
        screens: {
            '2xl': '1400px',
            xl: '1200px',
            lg: '992px',
            md: '768px',
            sm: '576px',
            xs: '320px',
        }
    },

    plugins: [forms, flyonui, plugin],
    flyonui: {
        themes: ['dark']
    }
};
