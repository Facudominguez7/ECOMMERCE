/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js",
    "./index.php",
  ],
  theme: {
    colors: {
      primary: "rgb(var(--color-primary)",
      colornav: "hsl(var(--color-nav)",
      colorfooter: "#020617",
      colorboton: "rgb(var(--color-miboton)",
    },
    extend: {
      width: {
        "300p": "300%",
      },
      screens: {
        768: "768px",
      },
      margin: {
        'custom': '-3.5rem',
      },
    },
  },
  plugins: [
    require("flowbite/plugin"),
  ],
};
