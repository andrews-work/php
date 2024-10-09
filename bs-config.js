require('dotenv').config({ path: `config/env/.env.${process.env.NODE_ENV}` });

module.exports = {
    files: [
        'app/views/**/*.php',
        'public/css/*.css',
        'public/js/**/*.js',
        'src/**/*.js',
        'src/**/*.css'
    ],
    proxy: `localhost:${process.env.PORT}`,
    port: process.env.BROWSER_SYNC_PORT,
    host: 'localhost',
    notify: false,
    open: 'local'
};
