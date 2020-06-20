require("dotenv").config();
const path = require("path");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = () => {
  const dist = `${process.env.PLUGIN_DIST}/${process.env.PLUGIN_NAME}`;
  return {
    mode: "development",
    entry: `${process.env.PLUGIN_PATH}/scripts/index.js`,
    output: {
      filename: "plugin.js",
      path: path.resolve(__dirname, dist),
    },
    module: {
      rules: [
        // Handle CSS / Scss
        {
          test: /\.s[ac]ss$/i,
          use: [
            // Creates `style` nodes from JS strings
            "style-loader",
            // Translates CSS into CommonJS
            "css-loader",
            // Compiles Sass to CSS
            "sass-loader",
          ],
        },
        // Handle Images
        {
          test: /\.(png|svg|jpg|gif)$/,
          use: ["file-loader"],
        },
        // Handle Fonts
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/,
          use: ["file-loader"],
        },
      ],
    },
    plugins: [
      new CopyPlugin({
        patterns: [{ from: `${process.env.PLUGIN_PATH}/templates`, to: "" }],
      }),
    ],
  };
};
