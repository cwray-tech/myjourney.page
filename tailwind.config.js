const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.vue',
    ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
    },
  },
    variants: {
        overflow: ['responsive', 'hover'],
        flexDirection: ['responsive', 'odd']
    },
  plugins: [
      require('@tailwindcss/ui'),
  ],
}
