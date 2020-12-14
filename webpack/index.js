const { entry } = require("./entries");
const {
  babelLoader,
  cssLoader,
  fontLoader,
  imageLoader,
  sassLoader,
} = require("./loaders");
const { themeCopy, cssExtract } = require("./plugins");

// Entries
exports.entry = entry;

// Loaders
exports.babelLoader = babelLoader;
exports.cssLoader = cssLoader;
exports.fontLoader = fontLoader;
exports.imageLoader = imageLoader;
exports.sassLoader = sassLoader;

// Plugins
exports.themeCopy = themeCopy;
exports.cssExtract = cssExtract;
