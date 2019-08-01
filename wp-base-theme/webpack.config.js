const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');
const url = require('url');
const webpack = require('webpack');
const BundleTracker = require('webpack-bundle-tracker');

const resolve = path.resolve.bind(path, __dirname);

const bundleTrackerPlugin = new BundleTracker({
  filename: 'webpack-bundle.json'
});

const providePlugin = new webpack.ProvidePlugin({
  $: 'jquery',
  jQuery: 'jquery',
  'window.jQuery': 'jquery',
  Popper: 'popper.js',
  'query-string': 'query-string'
});

module.exports = (env, argv) => {
  const devMode = argv.mode !== 'production';

  let extractCssPlugin;
  let fileLoaderPath;
  let output;

  if (!devMode) {
    output = {
      path: resolve('static/assets/'),
      filename: '[name].[chunkhash].js',
      chunkFilename: '[name].[chunkhash].js',
      publicPath: ''
    };
    fileLoaderPath = 'file-loader?name=[name].[hash].[ext]';
    extractCssPlugin = new MiniCssExtractPlugin({
      filename: '[name].[chunkhash].css',
      chunkFilename: '[id].[chunkhash].css'
    });
  } else {
    output = {
      path: resolve('static/assets/'),
      filename: '[name].js',
      chunkFilename: '[name].js',
      publicPath: ''
    };
    fileLoaderPath = 'file-loader?name=[name].[ext]';
    extractCssPlugin = new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[name].css'
    });
  }

  return {
    entry: {
      storefront: './static/js/app.js'
    },
    output: output,
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          loader: 'babel-loader'
        },
        {
          test: /\.scss$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                'sourceMap': true
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                'sourceMap': true,
                'plugins': function () {
                  return [autoprefixer];
                }
              }
            },
            {
              loader: 'sass-loader',
              options: {
                'sourceMap': true
              }
            }
          ]
        },
        {
          test: /\.(eot|otf|png|svg|jpg|ttf|woff|woff2)(\?v=[0-9.]+)?$/,
          loader: fileLoaderPath,
          include: [
            resolve('static/fonts'),
            resolve('static/images')
          ]
        }
      ]
    },
    optimization: {
      removeAvailableModules: false,
      removeEmptyChunks: false,
      splitChunks: false
    },
    plugins: [
      bundleTrackerPlugin,
      extractCssPlugin,
      providePlugin
    ],
    resolve: {
      alias: {
        jquery: resolve('node_modules/jquery/dist/jquery.js')
      },
      extensions: ['.ts', '.tsx', '.js', '.jsx']
    },
    devtool: 'sourceMap'
  };
};
