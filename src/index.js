import React from "react";
import ReactDOM from "react-dom";
import Application from "./components/Application";
import "./styles/app.scss";

document.addEventListener("DOMContentLoaded", () => {
  const wrapper = document.getElementById("app");
  ReactDOM.render(<Application />, wrapper);
});
