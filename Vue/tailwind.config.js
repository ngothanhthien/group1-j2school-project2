/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      textColor:{
        skin:{
          'base':'var(--color-text-base)',
          'error':'var(--color-error)',
        }
      },
      backgroundColor:{
        skin:{
          'primary': 'var(--color-primary)',
          'primary-hover':'var(--color-primary-hover)',
          'primaryLight':'var(--color-primary-light)',
          'primaryDark':'var(--color-primary-dark)',
          'background':'var(--color-background)',
          'surface':'var(--color-surface)',
        }
      },
      ringColor:{
        skin:{
          'primary':'var(--color-primary)',
        }
      },
    },
  },
  plugins: [],
}