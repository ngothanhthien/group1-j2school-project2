module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      textColor:{
        skin:{
          'base':'var(--text-default)'
        }
      },
      backgroundColor:{
        skin:{
          'primary':'var(--primary-color)',
          'primary-hover':'var(--primary-color-hover)',
          'light-primary':'var(--light-primary-color)',
          'dark-primary':'var(--dark-primary-color)',
          'secondary':'var(--secondary-color)',
          'light-secondary':'var(--secondary-color)',
          'dark-secondary':'var(--secondary-color)',
        }
      },
      borderColor:{
        skin:{
          'primary':'var(--primary-color)',
          'secondary':'var(--secondary-color)',
        }
      },
      ringColor:{
        skin:{
          'primary':'var(--primary-color)',
        }
      }
    },
  },
  plugins: [],
}
