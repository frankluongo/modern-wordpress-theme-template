const { cssExtract } = require("./plugins");

exports.babelLoader = {
  test: /\.m?js$/,
  exclude: /(node_modules|bower_components)/,
  use: {
    loader: "babel-loader",
    options: {
      presets: ["@babel/preset-env"],
      plugins: [
        [
          "module-resolver",
          {
            root: ["./"],
            alias: {
              "@components": "./src/scripts/components",
            },
          },
        ],
      ],
    },
  },
};

exports.cssLoader = {
  test: /\.css$/,
  use: [{ loader: cssExtract().loader }, "css-loader", "postcss-loader"],
};

exports.fontLoader = {
  test: /\.(woff|woff2|eot|ttf|otf)$/,
  use: ["file-loader"],
};

exports.imageLoader = {
  test: /\.(png|svg|jpg|gif)$/,
  use: ["file-loader"],
};

exports.sassLoader = {
  test: /\.s[ac]ss$/i,
  exclude: /(node_modules|bower_components)/,
  use: [
    {
      loader: cssExtract().loader,
    },
    "css-loader",
    "sass-loader",
    "postcss-loader",
  ],
};
