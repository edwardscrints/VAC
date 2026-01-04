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
                    'pink': '#ff00ff',
                    'yellow': '#ccff00',
                    'blue': '#0d1128',
                    'dark': '#050711',
                    'bright-yellow': '#ffff00',
                },
            },
            boxShadow: {
                'cyber-pink': '0 0 30px rgba(255, 0, 255, 0.55), 0 0 60px rgba(255, 0, 255, 0.1)',
                'cyber-yellow': '0 0 30px rgba(204, 255, 0, 0.87), 0 0 60px rgba(255, 0, 255, 0.1)',
                'cyber-glow-pink': '0 0 15px rgba(255, 0, 255, 0.5)',
                'cyber-glow-yellow': '0 0 15px rgba(204, 255, 0, 0.5)',
            },
            dropShadow: {
                'cyber-pink': '0 0 10px rgba(255, 0, 255, 0.8)',
                'cyber-yellow': '0 0 10px rgba(204, 255, 0, 0.8)',
                'cyber-bright': '0 0 8px rgba(255, 255, 0, 0.8)',
            },
            backgroundImage: {
                'cyber-gradient': 'linear-gradient(to bottom right, rgba(255, 0, 255, 0.1), transparent, rgba(204, 255, 0, 0.1))',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-animate'),
    ],
};
