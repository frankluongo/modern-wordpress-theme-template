exports.babelLoader = {
  loader: "babel-loader",
  test: /\.m?js$/,
  exclude: /(node_modules|bower_components)/,
};

exports.cssLoader = {
  test: /\.((c|sa|sc)ss)$/i,
  exclude: /(node_modules|bower_components)/,
  use: [
    // Creates `style` nodes from JS strings
    "style-loader",
    // Translates CSS into CommonJS
    "css-loader",
    // Compiles Sass to CSS
    "sass-loader",
    {
      loader: "postcss-loader",
      // options: { postcssOptions: { plugins: ["postcss-preset-env", {}] } },
    },
  ],
};
