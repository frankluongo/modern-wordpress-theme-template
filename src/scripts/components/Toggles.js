function Toggle(toggle) {
  const ctrl = document.querySelector(`#${toggle.dataset.ctrl}`);
  if (!ctrl) return;

  toggle.addEventListener("click", onClick);

  function onClick() {
    const state = ctrl.getAttribute("aria-hidden") === "true";
    ctrl.setAttribute("aria-hidden", !state);
  }
}

export default function Toggles() {
  const toggles = document.querySelectorAll("[data-toggle]");
  if (!toggles) return;
  toggles.forEach((toggle) => Toggle(toggle));
}
