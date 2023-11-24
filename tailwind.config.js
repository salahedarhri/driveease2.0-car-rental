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

    theme: {    
        extend: {
            fontFamily: {
                sans:['Cabin'],
                dash:['Roboto'],
            },
            colors:{
                
                darkBlue:'#053B50',
                mediumBlue:'#176B87',
                lightBlue:'#64CCC5',
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
