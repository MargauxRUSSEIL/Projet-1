module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'theme-red': '#DD0E27',
        'theme-blue': '#00296B',
        'theme-bleu-marine': '#362A66',
      }
    },
    minWidth: {
      '0': '0',
      '1/4': '25%',
      '1/2': '50%',
      '3/4': '75%',
      'full': '100%',
    },
    
  },
  variants: {
    extend: {},
  },
  plugins: [],
}