const path = require("path");
const CopyPlugin = require("copy-webpack-plugin");
require("dotenv").config();

const {
  babelLoader,
  fontLoader,
  imageLoader,
  cssLoader,
  sassLoader,
  cssExtract,
  themeCopy,
  entry,
} = require("./webpack");

const commonRules = [
  babelLoader,
  cssLoader,
  sassLoader,
  fontLoader,
  imageLoader,
];

const pluginConfig = (env) => {
  const dist = `${process.env.PLUGIN_DIST}/${process.env.PLUGIN_NAME}`;
  return {
    mode: env.MODE,
    entry: `${process.env.PLUGIN_PATH}/scripts/index.js`,
    output: {
      filename: "plugin.js",
      path: path.resolve(__dirname, dist),
    },
    module: {
      rules: commonRules,
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
    entry: `${process.env.PLUGIN_PATH}/scripts/admin.js`,
    output: {
      filename: "admin.js",
      path: path.resolve(__dirname, dist),
    },
    module: {
      rules: commonRules,
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
      rules: commonRules,
    },
    plugins: [themeCopy(dist), cssExtract().plugin],
  };
};

module.exports = (env) => {
  return [
    themeConfig(env),
    // pluginConfig(env), pluginAdminConfig(env)
  ];
};
