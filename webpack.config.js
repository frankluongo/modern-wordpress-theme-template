const path = require("path");
require("dotenv").config();

module.exports = (env) => {
  const isDev = env.MODE === "development";
  const dist = isDev
    ? `backend/wp-content/themes/${process.env.THEME_NAME}/assets`
    : "frontend/assets";
  return {
    mode: env.MODE,
    entry: "./src/index.js",
    output: {
      filename: "app.js",
      path: path.resolve(__dirname, dist),
    },
    module: {
      rules: [
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
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env", "@babel/preset-react"],
            plugins: ["@babel/transform-runtime"],
          },
        },
      ],
    },
  };
};
