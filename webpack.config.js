var path = require('path');

module.exports = {

    entry: './src/js/app.js',

    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'dist/js')
    },

    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel-loader?presets=es2015&cacheDirectory=true',
                exclude: /(node_modules|bower_components)/
            }
        ]
    },

    devtool: 'source-map'
};





