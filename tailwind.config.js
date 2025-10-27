/** @type {import('tailwindcss').Config} */
export const content = [
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
];
export const theme = {
  extend: {
    colors: {
      'blue': {
        500: '#3B82F6',
        600: '#2563EB',
        700: '#1D4ED8',
      }
    },
    fontFamily: {
      'sans': ['Inter', 'sans-serif'],
    },
  },
};
export const plugins = [];