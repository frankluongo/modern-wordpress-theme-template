const { cssExtract } = require("./plugins");

exports.pluginBabelLoader = {
  test: /\.m?js$/,
  exclude: /(node_modules|bower_components)/,
  use: {
    loader: "babel-loader",
    options: {
      presets: ["@babel/preset-env"],
      plugins: [],
    },
  },
};

exports.themeBabelLoader = {
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

exports.adminCssLoader = {
  test: /\.(css|s[ac]ss)$/,
  use: ["style-loader", "css-loader"],
};

exports.pluginCssLoader = {
  test: /\.(css|s[ac]ss)$/,
  use: ["style-loader", "css-loader", "postcss-loader"],
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
