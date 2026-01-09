module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/Livewire/**/*.php',
        './vendor/lunarphp/stripe-payments/resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'cyber': {
                    'pink': 'rgb(235, 37, 14)',
                    'yellow': '#ccff00',
                    'blue': '#0d1128',
                    'dark': '#1a1a2e',
                    'bright-yellow': '#ffff00',
                },
            },
            boxShadow: {
                'cyber-pink': '0 0 30px rgba(235, 37, 14, 0.55), 0 0 60px rgba(235, 37, 14, 0.1)',
                'cyber-yellow': '0 0 30px rgba(204, 255, 0, 0.87), 0 0 60px rgba(235, 37, 14, 0.1)',
                'cyber-glow-pink': '0 0 15px rgba(235, 37, 14, 0.5)',
                'cyber-glow-yellow': '0 0 15px rgba(204, 255, 0, 0.5)',
            },
            dropShadow: {
                'cyber-pink': '0 0 10px rgba(235, 37, 14, 0.8)',
                'cyber-yellow': '0 0 10px rgba(204, 255, 0, 0.8)',
                'cyber-bright': '0 0 8px rgba(255, 255, 0, 0.8)',
            },
            backgroundImage: {
                'cyber-gradient': 'linear-gradient(to bottom right, rgba(235, 37, 14, 0.1), transparent, rgba(204, 255, 0, 0.1))',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-animate'),
    ],
};
