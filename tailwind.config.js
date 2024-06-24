import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */

export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    
    theme: {    
        extend: {
            spacing: {
                'largeHeight': '45rem',
              },
            fontFamily: {
                cabin:['Cabin'],
                tables:['Roboto'],
                montserrat:['Montserrat'],
                poppins:['Poppins'],
            },
            colors:{ 
                darkBlue:'#053B50',
                mediumBlue:'#176B87',
                lightBlue:'#51C3BC',
                whiteBlue:'#EEEEEE',
                bleuclair: '#e8f5ff',
                stripe:'#6772e5',
                bleufonce:'#1b1b22',
                third:'#88c6db',

            }
        },
    },

    plugins: [
        require("daisyui"),forms],
        

    daisyui: {
        themes: ["pastel"],
        },
};
