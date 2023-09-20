/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", "./node_modules/flowbite/**/*.js"],
  theme: {
    colors: {
      primary: "rgb(var(--color-primary)",
      colornav: "hsl(var(--color-nav)",
      colorfooter: "#020617",
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
};
