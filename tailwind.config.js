import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    
    darkMode: 'class',

    theme: {    
        extend: {
            spacing: {
                'largeHeight': '45rem',
              },
            fontFamily: {
                cabin:['Cabin'],
                tables:['Roboto'],
                montserrat:['Montserrat']
            },
            colors:{ 
                darkBlue:'#053B50',
                mediumBlue:'#176B87',
                lightBlue:'#51C3BC',
                whiteBlue:'#EEEEEE',
                bleuclair: '#e8f5ff',
            }
        },
    },

    plugins: [
        require("daisyui"),forms],
        

    daisyui: {
        themes: ["light", "dark", "autumn","garden","winter"],
        },
};
