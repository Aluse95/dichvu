import { $, $$ } from "./app.js";

const removeActive = (element) => {
  $(`.${element}.active`)
    ? $(`.${element}.active`).classList.remove("active")
    : "";
};

const stepButtons = $$(".step-button");
const stepContents = $$(".step-content");

stepButtons.forEach((stepButton, index) => {
  stepButton.addEventListener("click", (e) => {
    removeActive("step-button");
    removeActive("step-content");
    stepButton.classList.add("active");
    stepContents[index].classList.add("active");
  });
});
