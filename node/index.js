const os = require("os");
const express = require("express");

const app = express();
const PORT = process.env.PORT || 3001;

app.get("/", (req, res) => {
  res.json({
    app: "node-express demo",
    endpoints: ["/date", "/env", "/server"],
  });
});

app.get("/date", (req, res) => {
  res.json({ date: new Date().toISOString().slice(0, 10) });
});

app.get("/env", (req, res) => {
  res.json({ TESTOWYENV: process.env.TESTOWYENV ?? null });
});

app.get("/server", (req, res) => {
  res.json({
    hostname: os.hostname(),
    os: os.platform(),
    arch: os.arch(),
    port: String(PORT),
    runtime: process.version,
  });
});

app.listen(PORT, () => {
  console.log(`node-express demo listening on :${PORT}`);
});
