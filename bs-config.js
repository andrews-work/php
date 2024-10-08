module.exports = {
    files: [
        'app/views/**/*.php',
        'public/css/**/*.css',
        'public/js/**/*.js',
        'src/**/*.js',
        'src/**/*.css'
    ],
    proxy: 'localhost:8000',
    port: 3000,
    host: 'localhost',
    notify: false,
    open: false
};

