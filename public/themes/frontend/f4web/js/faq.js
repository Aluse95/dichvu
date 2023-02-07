const faqContentItems = document.querySelectorAll(".faq-content-item");

faqContentItems.forEach((faqContentItem) => {
  faqContentItem.addEventListener("click", () => {
    document.querySelector(".faq-content-item.active")
      ? document
          .querySelector(".faq-content-item.active")
          .classList.remove("active")
      : faqContentItem.classList.add("active");
  });
});
