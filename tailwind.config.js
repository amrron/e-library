import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'false',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
          fontFamily: {
            sans: ['Lato', 'Figtree', ...defaultTheme.fontFamily.sans],
        },
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}