const { entry } = require("./entries");
const {
  pluginBabelLoader,
  themeBabelLoader,
  cssLoader,
  adminCssLoader,
  pluginCssLoader,
  fontLoader,
  imageLoader,
  sassLoader,
} = require("./loaders");
const { themeCopy, cssExtract } = require("./plugins");

// Entries
exports.entry = entry;

// Loaders
exports.pluginBabelLoader = pluginBabelLoader;
exports.themeBabelLoader = themeBabelLoader;

exports.adminCssLoader = adminCssLoader;
exports.pluginCssLoader = pluginCssLoader;
exports.cssLoader = cssLoader;
exports.sassLoader = sassLoader;

exports.fontLoader = fontLoader;
exports.imageLoader = imageLoader;

// Plugins
exports.themeCopy = themeCopy;
exports.cssExtract = cssExtract;
