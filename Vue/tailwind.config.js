function withOpacity(variableName){
  return ({opacityValue})=>{
    if(opacityValue!==undefined){
      return `rgb(var(${variableName}),${opacityValue})`;
    }
    return `rgb(var(${variableName}))`;
  }
}
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      textColor:{
        skin:{
          'base':'var(--text-default)',
          'primary':'var(--primary-color)',
        }
      },
      backgroundColor:{
        skin:{
          'primary': 'var(--primary-color)',
          'primary30':'var(--primary-color-30)',
          'light-primary':'var(--light-primary-color)',
          'dark-primary':'var(--dark-primary-color)',
          'secondary':'var(--secondary-color)',
          'light-secondary':'var(--secondary-color)',
          'dark-secondary':'var(--secondary-color)',
          'surface':'var(--surface)',
          'background':'var(--background)',
          'neutral10':'var(--neutral-color-10)',
        }
      },
      borderColor:{
        skin:{
          'primary':'var(--primary-color)',
          'secondary':'var(--secondary-color)',
          'onSurface':'var(--onSurface)',
          'onSurface30':'var(--onSurface-30)'
        }
      },
      ringColor:{
        skin:{
          'primary':'var(--primary-color)',
        }
      },
      opacity:{
        'high':'.87',
        'medium':'.6'
      },
      backgroundOpacity:{
        'high':'.87'
      }
    },
  },
  plugins: [],
}
