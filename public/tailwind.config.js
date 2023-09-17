const plugin = require('tailwindcss/plugin')

/** @type {import(tailwindcss).Config} */
module.exports = {
  content: ['../app/**/*'],
  theme: {
    screens: {
      sm: "480px",
      md: "768px",
      lg: "976px",
      xl: "1440px"
    },
    fontFamily: {
      'kanit': ['Kanit', 'sans-serif'],
      'lexend': ['Lexend Deca', 'sans-serif'],
      'pathway' : ["Pathway Extreme", 'sans-serif'],
      'urban' : ["Urbanist", 'sans-serif'],
      'dmsans' : ["DM Sans", 'sans-serif'],
      'sans': ['Roboto', 'sans-serif'],
    },
    extend: {
      spacing: {
        "5.5": "5.5rem",
        "18.5": "18.5rem",
        "58.5": "58.5rem",
        "78": "78rem",
        "6.5": "6.5rem",
      },
      dropShadow: {
        'card': '0px 5px 10px  rgba(0, 0, 0, 0.20)'
      },
      colors: {
        neutralLight: 'hsl(0,0%,102.5%)',
        neutral: 'hsl(0,0%,96.5%)',
        neutralDark: 'hsl(0,0%,88.5%)',
        primaryLight: 'hsl(0,0%,95.4%)',
        primary: 'hsl(0,0%,89.4%)',
        primaryDark: 'hsl(0,0%,81.4%)',
        ctaLight: 'hsl(0,0%,36.2%)',
        cta: 'hsl(0,0%,30.2%)',
        ctaDark: 'hsl(0,0%,22.2%)',
        dark: 'hsl(0,0%,8.9%)',
        wsp: 'hsl(119,100%,37.8%)',
        twt: 'hsl(204,87.6%,52.7%)',
        fbk: 'hsl(222,66.8%,36.7%)',
        lnk: 'hsl(201,100%,35.9%)',
        ytb: 'hsl(0,100%,50%)',
        itg: 'hsl(327,58.8%,46.7%)'
      }
    },
  },
  plugins: [

    plugin(function({ matchUtilities, theme }) {
      matchUtilities(
        {
          'translate-z': (value) => ({
            '--tw-translate-z': value,
            transform: ` translate3d(var(--tw-translate-x), var(--tw-translate-y), var(--tw-translate-z)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))`,
          }), // this is actual CSS
        },
        { values: theme('translate'), supportsNegativeValues: true }
      )
    })
  ],
}
