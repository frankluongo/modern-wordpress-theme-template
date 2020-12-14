const glob = require("glob");

function getEntrypoints() {
  const scripts = {};
  const files = glob.sync("./src/scripts/*.js");
  files.forEach((file) => {
    const name = getName(file);
    scripts[name] = file;
  });
  return scripts;
}

function getName(file) {
  const beforeJsArr = file.split(".js")[0].split("/");
  const lastItem = beforeJsArr[beforeJsArr.length - 1];
  return lastItem;
}
exports.entry = getEntrypoints();
