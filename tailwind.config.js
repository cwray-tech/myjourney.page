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
    variants: ['responsive', 'group-hover', 'group-focus', 'focus-within', 'first', 'last', 'odd', 'even', 'hover', 'focus', 'active', 'visited', 'disabled'],
  plugins: [
      require('@tailwindcss/ui'),
  ],
}
