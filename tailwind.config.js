module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'custom-dark': '#0f0f0f',
        'custom-grey': '#2b2b2b',

        '00DP': '#121212',
        '01DP': '#1e1e1e',
        '02DP': '#232323',
        '03DP': '#252525',
        '04DP': '#272727',
        '06DP': '#2c2c2c',
        '08DP': '#2e2e2e',
        '12DP': '#333333',
        '16DP': '#363636',
        '24DP': '#383838',

        'mine-shaft': {
          DEFAULT: '#2B2B2B',
          '50': '#9E9E9E',
          '100': '#919191',
          '200': '#777777',
          '300': '#5E5E5E',
          '400': '#454545',
          '500': '#2B2B2B',
          '600': '#121212',
          '700': '#000000',
          '800': '#000000',
          '900': '#000000'},
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
