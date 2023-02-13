const searchBtn = document.querySelector("#header .search-container i");
const closeBtn = document.querySelector(
  "#search-modal .search-modal-close-button i"
);
const submitBtn = document.querySelector(
  "#search-modal .search-submit-button a"
);
const searchModal = document.querySelector("#search-modal");
const searchModalContainer = document.querySelector(
  "#search-modal .search-modal-container"
);

searchBtn.addEventListener("click", () => {
  searchModal.style.display = "flex";
  searchModal.style.animation = "fadeIn ease 0.5s";
  searchModalContainer.style.animation = "jellyIn ease 1s";
});

closeBtn.addEventListener("click", () => {
  searchModalContainer.style.animation = "jellyOut ease 1s";
  setTimeout(() => {
    searchModal.style.animation = "fadeOut ease 0.5s";
    searchModal.style.display = "none";
  }, 1000);
});

submitBtn.addEventListener("click", () => {
  searchModalContainer.style.animation = "jellyOut ease 1s";
  setTimeout(() => {
    searchModal.style.animation = "fadeOut ease 0.5s";
    searchModal.style.display = "none";
  }, 1000);
});
