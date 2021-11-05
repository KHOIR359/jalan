module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {}
    },
    variants: {
        extend: {
            objectFit: ['hover', 'focus'],
        }
    },
    plugins: [
        require('@tailwindcss/ui'),
    ]
}
