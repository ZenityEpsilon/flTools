// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    head: {
        title: 'Freelancer POB',
        htmlAttrs: {
            lang: 'ua',
        },
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: '' },
            { name: 'format-detection', content: 'telephone=no' },
        ],
        link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    },
    modules: [
        '@nuxtjs/tailwindcss',
        '@vite-pwa/nuxt',
        [
            '@nuxtjs/i18n',
            {
                strategy: 'prefix_except_default',
                defaultLocale: 'ua',
                langDir: './locales',
                detectBrowserLanguage: false,
                redirectOn: false,
                locales: [
                    { code: 'ua', iso: 'ua-UA', file: 'ua.js' },
                    { code: 'en', iso: 'en-EN', file: 'en.js' },
                ],
            },
        ],
    ],
    css: ['assets/css/fonts.css'],
    vite: {
        //plugins: [eslintPlugin()],
    },
    nitro: {
        devProxy: {
            '/api': { target: process.env.API_URL, changeOrigin: true },
            '/images': { target: process.env.API_URL + '/images/', changeOrigin: true },
        },
    },

    runtimeConfig: {
        public: {
            API_BASE_URL: process.env.API_URL,
        },
    },
    devtools: { enabled: true },
});
