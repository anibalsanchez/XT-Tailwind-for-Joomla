// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme');
const customForms = require('@tailwindcss/custom-forms');
const tailwindCssUi = require('@tailwindcss/ui')({
  layout: 'sidebar',
});
const typography = require('@tailwindcss/typography');

module.exports = {
  // Purge and minification on PostCSS, postcss.config.js
  purge: false,

  theme: {
    extend: {
      screens: defaultTheme.screens,
      colors: {
        // My Colors
        'blue-happy': '#2d6987',
        'extly': '#ff8900',
        'grey-dark': '#0d0d0d',
        'grey-light': '#f5f5f5',
        'grey': '#666',
        'link': '#ffa32b',
        'not-so-black': '#22292f',
        'oldlace': '#fff6e9',
        'orange-hot': '#9b6f37',
      },
      spacing: {
        '32-lite': '7rem',
      },
      fontFamily: {
        sans: [
          'muli',
          '"Helvetica Neue"',
          'Arial',
          'sans-serif',

          '-apple-system',
          'BlinkMacSystemFont',
          '"Segoe UI"',
          'Roboto',
          '"Noto Sans"',
          '"Apple Color Emoji"',
          '"Segoe UI Emoji"',
          '"Segoe UI Symbol"',
          '"Noto Color Emoji"',
        ],
      },
      opacity: {
        // One more ...
        '90': '0.90',

        ...defaultTheme.opacity,
      },
    },
    typography: {
      default: {
        css: {
          a: {
            color: '#ffa32b',
            '&:hover': {
              color: '#ef931b',
            },
          },
        },
      },
    },
  },
  variants: {},
  plugins: [customForms, tailwindCssUi, typography],
};
