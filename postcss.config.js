const autoprefixer = require('autoprefixer');
const sorter = require('postcss-sort-media-queries');

module.exports = {
    plugins: [autoprefixer, sorter],
};
