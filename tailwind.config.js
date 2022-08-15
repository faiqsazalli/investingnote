/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/css/app.css",
    "./public/app.css",
    "./resources/views/posts/index.blade.php",
    "./resources/views/posts/create.blade.php",
    "./resources/views/posts/show.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
