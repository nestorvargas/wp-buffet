/*
    webpack wp buffet

 */

const webpack = require('webpack')
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

let config = {
  entry: {
    theme: ['./js/theme.js', './scss/theme.scss']
  },
  output: {
    path: path.resolve(__dirname, '../assets/js'),
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.js/,
        loader: 'babel-loader'
      },
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
        test: /.(jpg|png|woff(2)?|eot|otf|ttf|svg|gif)(\?[a-z0-9=\.]+)?$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '../css/[hash].[ext]'
            }
          }
        ]
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'style-loader',
          'css-loader',
          'postcss-loader'
        ]
      }
    ]
  },
  stats: {
    nestedModules: true,
    children: true
  },
  externals: {
    $: '$',
    jquery: 'jQuery'
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: path.join('..', 'css', '[name].css')
    })
  ]
}

if (process.env.NODE_ENV === 'production') {
  config.optimization = {
    minimizer: [
      new UglifyJsPlugin({
        sourceMap: false,
        uglifyOptions: {
          compress: {
            sequences: true,
            conditionals: true,
            booleans: true,
            if_return: true,
            join_vars: true,
            drop_console: true
          },
          output: {
            comments: false
          }
        }
      })
    ]
  }
}

module.exports = (env, argv) => {
  if (argv.mode === 'development') {
    config.devtool = 'source-map'
  }

  return config
}
