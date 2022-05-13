module.exports = {
  content: ["./application/**/**/*.{html,php,js}", './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {
      fontFamily: {
        'InvFont': ['Poppins', 'sans-serif']
      },
      colors: {
        'invirtual-800': '#1F2655',
        'invirtual-500': '#354395',
        'invirtual-300':'#5362C2',
        'invirtual-200':'#7682CE',
        'invirtual-100':'#9FA7DD',
        'gray-invirtual':'#ffffff95'
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
