const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const sass = require('sass');
const WebpackIconfontPluginNodejs = require('webpack-iconfont-plugin-nodejs');
const path = require('path');
const dir = 'src/';

module.exports = (env, argv) => {
    return {
        entry: {
            bundle: ['./src/index.js', './src/index.scss'],
        },
        output: {
            path: path.resolve(process.cwd(), 'dist'),
            filename: '[name].js',
        },
        optimization: {
            minimizer: [
                new TerserJSPlugin(),
                new OptimizeCSSAssetsPlugin({
                    cssProcessorOptions: {
                        map: {
                            inline: false,
                            annotation: true,
                        },
                    },
                }),
            ],
        },
        plugins: [
            new CleanWebpackPlugin({
                cleanAfterEveryBuildPatterns: ['!fonts/**/*'],
                output: {
                    path: path.resolve(process.cwd(), 'dist'),
                },
            }),
            new MiniCssExtractPlugin(),
            new WebpackIconfontPluginNodejs({
                fontName: 'alpio-icons',
                cssPrefix: 'alpio-icon',
                svgs: path.join(dir, 'svg/*.svg'),
                template: 'scss',
                fontsOutput: path.join(dir, 'icons/'),
                cssOutput: path.join(dir, 'icons/icons.css'),
                htmlOutput: path.join(dir, 'icons/icons-preview.html'),
                jsOutput: path.join(dir, 'icons/icons.js'),
            }),
        ],
        devtool:
            argv.mode === 'development'
                ? 'cheap-module-source-map'
                : 'source-map',
        mode: 'development',
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            plugins: [
                                '@babel/plugin-proposal-class-properties',
                            ],
                            presets: ['@babel/preset-env'],
                        },
                    },
                },
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: 'postcss-loader',
                            options: {
                                sourceMap: true,
                            },
                        },
                        'resolve-url-loader',
                        {
                            loader: 'sass-loader',
                            options: {
                                implementation: sass,
                            },
                        },
                        {
                            loader: 'sass-resources-loader',
                            options: {
                                resources: ['./src/scss/_variables.scss'],
                            },
                        },
                    ],
                },
                {
                    test: /\.(ttf|eot|woff|woff2|svg)$/,
                    use: {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts',
                            publicPath: 'fonts',
                        },
                    },
                },
                {
                    test: /\.(png|jpe?g|gif)$/i,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                name: '[name].[ext]',
                                publicPath: 'img',
                                outputPath: 'img',
                            },
                        },
                    ],
                },
            ],
        },
        externals: {
            jquery: 'jQuery',
        },
    };
};
