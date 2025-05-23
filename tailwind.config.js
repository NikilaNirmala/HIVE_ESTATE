/** @type {import('tailwindcss').Config} */
export default {
  content: ['./**/*.php'], 
  theme: {
    extend: {
      colors: {
        purple: {
          100: 'hsl(270, 60%, 95%)', 
        },
        zinc: {
          800: 'hsl(210, 10%, 20%)', 
        },
        white: 'hsl(0, 0%, 100%)', 
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      spacing: {
        4: '1rem', 
      },
      zIndex: {
        10: '10', 
      },
    },
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.header-profile': {
          backgroundColor: 'hsl(270, 60%, 95%)', 
          padding: '1rem', 
          display: 'flex', 
          justifyContent: 'space-between', 
          alignItems: 'center', 
          position: 'sticky', 
          top: '0', 
          zIndex: '10', 
        },
      });
    },
  ],
}