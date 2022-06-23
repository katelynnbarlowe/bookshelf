/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/js/**/*.{vue,js}",
      "./resources/views/*.php"
  ],
  theme: {
    colors: {
        'pink': '#F4A8B2',
        'green': '#67A777',
        'blue': '#647ddd',
        'yellow': '#f4DE7D',
        'orange': '#E86745',
        'tan': '#f2e8e6',
        'grey': '#0B0926',
        'white': '#ffffff',
        'black': '#000000',
    },
    fontFamily: {
        sans: ['Lato', 'sans-serif'],
        serif: ['Cormorant Garamond', 'serif'],
    },
    container: {
        center: true,
        padding: '2.5rem',
    },
    extend: {},
  },
  plugins: [],
}
