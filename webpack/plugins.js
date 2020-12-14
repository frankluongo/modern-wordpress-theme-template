const path = require("path");
const CopyPlugin = require("copy-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

exports.themeCopy = (dir) =>
  new CopyPlugin({
    patterns: [{ from: "./src/templates", to: path.resolve(dir) }],
  });

exports.cssExtract = () => {
  const plugin = new MiniCssExtractPlugin({
    filename: "[name].css",
  });
  const loader = MiniCssExtractPlugin.loader;
  return { plugin, loader };
};
