const cssnano = require("cssnano");
const purgecss = require("postcss-purgecss");

// class {
//   static extract(content) {
//     return content.match(/[A-z0-9-:\/]+/g) || [];
//   }
// }
module.exports = ({ env }) => {
  const plugins = ["postcss-preset-env", cssnano];
  if (env === "production") {
    return {
      plugins: [
        ...plugins,
        purgecss({
          content: ["./src/templates/**/*.php"],
          defaultExtractor: (content) => content.match(/[A-z0-9-:\/]+/g) || [],
        }),
      ],
    };
  } else {
    return {
      plugins,
    };
  }
};
