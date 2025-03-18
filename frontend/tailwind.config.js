module.exports = {
    content: [
        './components/**/*.{js,vue,ts}',
        './layouts/**/*.vue',
        './pages/**/*.vue',
        './plugins/**/*.{js,ts}',
        './nuxt.config.{js,ts}',
        './app.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {},
        colors: {
            background: {
                DEFAULT: '#382e5e',
                darker: '#0d1117',
            },
            blue: {
                DEFAULT: '#87c2e0',
            },
            yellow: {
                DEFAULT: '#ffff00',
            },
            black: {
                DEFAULT: '#000',
            },
        },
        flex: {
            12: '0 0 100%',
            6: '0 0 50%',
            4: '0 0 33.3333%',
            3: '0 0 25%',
            auto: '0 0 auto',
            none: 'none',
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
