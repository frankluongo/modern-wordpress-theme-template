const path = require("path");
const CopyPlugin = require("copy-webpack-plugin");
require("dotenv").config();

const {
  themeBabelLoader,
  pluginBabelLoader,
  fontLoader,
  imageLoader,
  cssLoader,
  sassLoader,
  adminCssLoader,
  pluginCssLoader,
  cssExtract,
  themeCopy,
  entry,
} = require("./webpack");

const pluginDir = `${process.env.PLUGIN_DIST}/${process.env.PLUGIN_NAME}`;

const pluginConfig = (env) => {
  return {
    mode: env.MODE,
    entry: `./plugin/scripts/frontend.js`,
    output: {
      filename: "plugin.js",
      path: path.resolve(__dirname, pluginDir),
    },
    module: {
      rules: [pluginBabelLoader, pluginCssLoader, fontLoader, imageLoader],
    },
    plugins: [
      new CopyPlugin({
        patterns: [
          {
            from: `${process.env.PLUGIN_PATH}/templates`,
            to: "",
          },
        ],
      }),
    ],
  };
};

const pluginAdminConfig = (env) => {
  const dist = `${process.env.PLUGIN_DIST}/${process.env.PLUGIN_NAME}/admin/js`;
  return {
    mode: env.MODE,
    entry: `./plugin/scripts/admin.js`,
    output: {
      filename: "admin.js",
      path: path.resolve(__dirname, dist),
    },
    module: {
      rules: [pluginBabelLoader, adminCssLoader, fontLoader, imageLoader],
    },
  };
};

const themeConfig = (env) => {
  const { THEME_NAME } = process.env;
  const dist = `backend/wp-content/themes/${THEME_NAME}`;
  return {
    mode: env.MODE,
    entry,
    output: {
      filename: "[name].js",
      path: path.resolve(__dirname, `${dist}/assets`),
    },
    module: {
      rules: [themeBabelLoader, cssLoader, sassLoader, fontLoader, imageLoader],
    },
    plugins: [themeCopy(dist), cssExtract().plugin],
  };
};

module.exports = (env) => {
  return [themeConfig(env), pluginConfig(env), pluginAdminConfig(env)];
};
