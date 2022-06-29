/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/js/**/*.{vue,js}",
      "./resources/views/*.php"
  ],
  theme: {
    colors: {
        'pink': 'var(--pink)',
        'green': 'var(--green)',
        'blue': 'var(--blue)',
        'yellow': 'var(--yellow)',
        'orange': 'var(--orange)',
        'purple': 'var(--purple)',
        'tan': 'var(--tan)',
        'grey': 'var(--grey)',
        'white': 'var(--white)',
        'black': 'var(--black)',
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
