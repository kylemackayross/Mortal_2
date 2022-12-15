const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                mo_red: '#F12F62',
                mo_pur: '#AB5CBB',
                mo_ora: '#FF7A48',
                mo_blu: '#4E79F3',
                mo_yel: '#FFC600',
                mo_dar: '#262F53',
                mo_bla: '#161B30',
                mo_gra: '#7D8298',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        
    ],
    variants: {
        
    } 
};
