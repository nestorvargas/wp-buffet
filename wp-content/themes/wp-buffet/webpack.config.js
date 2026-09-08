const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    mode: 'production',
    entry: {
        main: './src/js/main.js',
        styles: './src/scss/style.scss'  // Asegura que esta línea está presente
    },
    output: {
        path: path.resolve(__dirname, 'dist/assets'),
        filename: 'js/[name].js',
        clean: true
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin(),
            new CssMinimizerPlugin()
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/style.css'
        })
    ],
    devtool: 'source-map',
    devServer: {
        static: path.join(__dirname, 'dist/assets'),
        compress: true,
        port: 9000,
        hot: true
    }
};
