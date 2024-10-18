/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    
    // root directory
    'app/**/*.{html,js,php}',
    'src/**/*.{html,js,php}',
    'app/presentation/views/**/*.{html,js,php}',

    // root/src/
    // '../app/**/*.{html,js,php}',
    // '../src/*.{html,js,php}',

    // root/src/config/ 
    // '../../app/**/*.{html,js,php}',
    // '../../src/**/*.{html,js,php}',

  ],
  theme: {
    extend: {

      colors: {
        black: '#000000', // black
        two: '#ffffff', // white
        three: '#ff0000',  // Red
        four: '#0000ff',  // Blue
        five: '#00ff00', // Green
      },

      spacing: {
        '5vh': '5vh',
        '10vh': '10vh',
      },

      height: {
        '5': '5vh',
        '10': '10vh',
        '15': '15vh',
        '20': '20vh',
        '25': '25vh',
        '30': '30vh',
        '35': '35vh',
        '40': '40vh',
        '45': '45vh',
        '50': '50vh',
        '55': '55vh',
        '60': '60vh',
        '65': '65vh',
        '70': '70vh',
        '75': '75vh',
        '80': '80vh',
        '85': '85vh',
        '90': '90vh',
        '95': '95vh',
      },
      width: {
        '5': '5vw',
        '10': '10vw',
        '15': '15vw',
        '20': '20vw',
        '25': '25vw',
        '30': '30vw',
        '35': '35vw',
        '40': '40vw',
        '45': '45vw',
        '50': '50vw',
        '55': '55vw',
        '60': '60vw',
        '65': '65vw',
        '70': '70vw',
        '75': '75vw',
        '80': '80vw',
        '85': '85vw',
        '90': '90vw',
        '95': '95vw',
      },
    },
  },
  plugins: [],
}

