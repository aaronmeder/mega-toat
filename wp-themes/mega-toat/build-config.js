const domain = "telltec.local";
const dest = "./dist";

const host = `https://${domain}`;

const entries = [
  "./assets/admin.js",
  "./assets/admin.scss",
  "./assets/main.js",
  "./assets/main.scss",
  "./assets/print.scss",
  "./assets/editorTinyMce.scss",
  "./assets/editor.scss",
];

const watchFiles = [
  "*.php",
  "templates/**/*",
  "lib/**/*",
  "inc/**/*",
  "./Components/**/*.{php,twig}",
];

module.exports = {
  dest,
  host,
  domain,
  entries,
  watchFiles,
};
