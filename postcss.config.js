// postcss.config.js

// Import required modules
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// Export PostCSS configuration
module.exports = {
  // Specify plugins
  plugins: [
    // Add autoprefixer plugin
    autoprefixer,
    // Add cssnano plugin for minification (optional)
    cssnano
  ]
};
