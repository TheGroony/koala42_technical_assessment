const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const Terser = require("terser-webpack-plugin")

const path = require("path")


module.exports = (env, options) => {
    return {
        mode: "production",
        entry: path.resolve(__dirname, "src", "css", "app.scss"),
        output: {
            path: path.resolve(__dirname, "..", "www", "assets"),
        },
        optimization: {
            minimize: true,
            minimizer: [
                new CssMinimizerPlugin(),
                new Terser({
                    extractComments: false,
                }),
            ],
        },
        module: {
            rules: [
                {
                    test: /\.s?[ca]ss/i,
                    exclude: /node_modules/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        {
                            loader: "css-loader",
                        },
                        {
                            loader: "postcss-loader",
                            options: {
                                sourceMap: true,
                                postcssOptions: {
                                    plugins: [
                                        "postcss-preset-env",
                                    ],
                                },
                            },
                        },
                        {
                            loader: "sass-loader",
                            options: {
                                implementation: require("sass"),
                                sourceMap: true,
                            },
                        },
                    ],
                }
            ],
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: "css/[name].build.css",
            }),
        ],
        devServer: {
            static: {
                directory: path.join(__dirname, 'dist'),
            },
            compress: false,
            port: 9000,
        },
    }
}
