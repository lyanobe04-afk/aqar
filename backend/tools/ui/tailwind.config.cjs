const path = require('node:path');
module.exports = {
  content: [path.join(__dirname, '../../resources/views/{manager,layouts,components/manager}/**/*.blade.php'), path.join(__dirname, '../../public/assets/aqar/manager.js')],
  theme: { extend: require('./design-tokens.json') },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/container-queries')],
};
