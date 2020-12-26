const colors = require('tailwindcss/colors')

module.exports = {
  important: true,
  purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      container: {
        padding: '2rem',
      },
      colors: {
        amber: colors.amber,
        white: colors.white,
        blue: colors.blue,
        red: colors.red,
        cyan: colors.cyan,
        green: colors.green,
        emerald: colors.emerald,
        'light-blue': colors.lightBlue,
        'cool-gray': colors.coolGray,
        indigo: colors.indigo,
        primary: colors.green,
        "bg-semi-75": "rgba(0, 0, 0, 0.75)",
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms')
  ],
}
