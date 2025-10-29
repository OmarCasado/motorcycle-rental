import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                montserrat: ['Montserrat', 'sans-serif'],
            },
            colors : {
                whiteCustom: "rgb(240,240,240)",
                redCustom: "rgb(188,0,45)",
                lightGray: "rgb(124,130,138)",
                lightTransparentWhite: "rgba(255,255,255,0.5)",
                darkGray: "rgb(56,58,59)",
                backgroundColor: "rgb(240,240,232)",
                greenCustom: "rgb(52,158,91)",
            },
        },
    },

    plugins: [forms],
};
