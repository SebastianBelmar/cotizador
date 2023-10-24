import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily:{
            'pop': ['Poppins']
        },
        extend: {
            colors: {
                principal: 'hsla(200, 90%, 50%, 1)',
                oscuro: 'hsla(200, 40%, 25%, 1)',
                medio: 'hsla(200, 18%, 56%, 1)',
                medioClaro: 'hsla(200, 19%, 79%, 1)',
                claro: 'hsla(200, 50%, 96%, 1)',
                blanco: 'hsla(200, 50%, 100%, 1)',
                success: 'hsla(200, 50%, 96%, 1)',
                info: 'hsla(200, 50%, 96%, 1)',
                aler: 'hsla(200, 50%, 96%, 1)',
                danger: 'hsla(335, 67%, 55%, 1)',
                sombra: 'hsla(200, 40%, 25%, 0.1)'
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

        },
    },

    plugins: [forms, typography],

    corePlugins: {
        container: false
    }
};
