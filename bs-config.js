require('dotenv').config({ path: `config/env/.env.${process.env.NODE_ENV}` });

module.exports = {
    files: [
        'app/views/pages/*.php',
        'app/views/components/navigation/*.php',
        'app/views/components/template/*.php',
        'public/css/*.css',
        'public/js/**/*.js',
        'src/**/*.js',
        'src/css/*.css',
        'src/utils/*.php'
    ],
    proxy: `localhost:${process.env.PORT}`,
    port: process.env.BS_PORT,
    host: process.env.HOST,
    notify: false,
    open: 'local'
};
