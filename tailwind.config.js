/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue", // if you use Vue
        "./resources/js/**/*.js", // if you use JS files
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
