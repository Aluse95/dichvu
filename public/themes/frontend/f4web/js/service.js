const serviceTagsPC = document.querySelectorAll("#service .service-tag-item");
const serviceCardsPC = document.querySelectorAll("#service .service-card-item");
const serviceTagsM = document.querySelectorAll("#m-service .service-tag-item");
const serviceCardsM = document.querySelectorAll(
  "#m-service .service-card-item"
);

window.addEventListener("resize", () => {
  serviceTagsPC.forEach((serviceTag, index) => {
    let tagRect = serviceTag.getBoundingClientRect();

    let colorArr = [
      "--blue-5",
      "--blue-4",
      "--orange",
      "--orange-2",
      "--green",
    ];
    serviceCardsPC.forEach((serviceCardPC) => {
      if (serviceCardPC.style.display == "flex") {
        let serviceCardActive = serviceCardPC;
        let cardRect = serviceCardActive.getBoundingClientRect();

        console.log(tagRect.left, cardRect.left);
        serviceTag.addEventListener("click", () => {
          document
            .querySelector("#service .service-tag-item.active")
            .classList.remove("active");
          serviceTag.classList.add("active");
          document.querySelector(
            "#service .service-tag-item-smooth-container"
          ).style.left = `${tagRect.left - cardRect.left}px`;
          document.querySelector(
            "#service .service-tag-item-smooth-container"
          ).style.width = `${tagRect.width}px`;
          let title = serviceTag.querySelector("p").innerText.toLowerCase();
          serviceCardsPC.forEach((serviceCard) => {
            if (
              serviceCard.querySelector("h4").innerText.toLowerCase() == title
            ) {
              document.querySelector(
                "#service .service-tag-item-smooth-container"
              ).style.backgroundColor = `var(${colorArr[index]})`;
              document.querySelector(
                "#service .service-container .service-tag-item-smooth-container .service-tag-item-smooth-left"
              ).style.backgroundColor = `var(${colorArr[index]})`;
              document.querySelector(
                "#service .service-container .service-tag-item-smooth-container .service-tag-item-smooth-right"
              ).style.backgroundColor = `var(${colorArr[index]})`;
              serviceCard.style.backgroundColor = `var(${colorArr[index]})`;

              setTimeout(() => {
                serviceCard.style.display = "flex";
              }, 750);
            } else {
              serviceCard.style.backgroundColor = `var(${colorArr[index]})`;
              setTimeout(() => {
                serviceCard.style.display = "none";
              }, 750);
            }
          });
        });
      }
    });
  });
});

serviceTagsPC.forEach((serviceTag, index) => {
  let colorArr = ["--blue-5", "--blue-4", "--orange", "--orange-2", "--green"];
  let cardRect = document
    .querySelector("#service .service-card-item")
    .getBoundingClientRect();
  serviceTag.addEventListener("click", () => {
    setInterval(() => {
      let tagRect = serviceTag.getBoundingClientRect();

      document.querySelector(
        "#service .service-tag-item-smooth-container"
      ).style.width = `${tagRect.width}px`;
    }, 500);

    let tagRect = serviceTag.getBoundingClientRect();
    document
      .querySelector("#service .service-tag-item.active")
      .classList.remove("active");
    serviceTag.classList.add("active");
    document.querySelector(
      "#service .service-tag-item-smooth-container"
    ).style.left = `${tagRect.left - cardRect.left}px`;
    // document.querySelector(
    //   "#service .service-tag-item-smooth-container"
    // ).style.width = `${tagRect.width}px`;
    let title = serviceTag.querySelector("p").innerText.toLowerCase();
    serviceCardsPC.forEach((serviceCard) => {
      if (serviceCard.querySelector("h4").innerText.toLowerCase() == title) {
        document.querySelector(
          "#service .service-tag-item-smooth-container"
        ).style.backgroundColor = `var(${colorArr[index]})`;
        document.querySelector(
          "#service .service-container .service-tag-item-smooth-container .service-tag-item-smooth-left"
        ).style.backgroundColor = `var(${colorArr[index]})`;
        document.querySelector(
          "#service .service-container .service-tag-item-smooth-container .service-tag-item-smooth-right"
        ).style.backgroundColor = `var(${colorArr[index]})`;
        serviceCard.style.backgroundColor = `var(${colorArr[index]})`;

        setTimeout(() => {
          serviceCard.style.display = "flex";
        }, 750);
      } else {
        serviceCard.style.backgroundColor = `var(${colorArr[index]})`;
        setTimeout(() => {
          serviceCard.style.display = "none";
        }, 750);
      }
    });
  });
});

serviceTagsM.forEach((serviceTagM, index) => {
  serviceTagM.addEventListener("click", () => {
    document
      .querySelector("#m-service .service-tag-item.active")
      .classList.remove("active");
    serviceTagM.classList.add("active");
    let title = serviceTagM.querySelector("p").innerText.toLowerCase();
    serviceCardsM.forEach((serviceCardM) => {
      if (serviceCardM.querySelector("h4").innerText.toLowerCase() == title) {
        if (index == 0) {
          document
            .querySelector("#m-service .service-card-item.active")
            .classList.remove("active");
          serviceCardM.classList.add("active");

          document.querySelector(
            "#m-service .service-card-item:nth-child(2) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(2) "
          ).style.transform = "scale(0.95)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(2) "
          ).style.top = "calc(var(--top-dims) * 1)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.transform = "scale(0.9)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.top = "calc(var(--top-dims) * 2)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4)"
          ).style.transform = "scale(0.85)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4)"
          ).style.top = "calc(var(--top-dims) * 3)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5)"
          ).style.transform = "scale(0.8)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5)"
          ).style.top = "calc(var(--top-dims) * 4)";
        } else if (index == 1) {
          document
            .querySelector("#m-service .service-card-item.active")
            .classList.remove("active");
          serviceCardM.classList.add("active");
          document.querySelector(
            "#m-service .service-card-item:nth-child(1)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.transform = "scale(0.95)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3) "
          ).style.top = "calc(var(--top-dims) * 1)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.transform = "scale(0.9)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.top = "calc(var(--top-dims) * 2)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5)"
          ).style.transform = "scale(0.85)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5)"
          ).style.top = "calc(var(--top-dims) * 3)";
        } else if (index == 2) {
          document
            .querySelector("#m-service .service-card-item.active")
            .classList.remove("active");
          serviceCardM.classList.add("active");
          document.querySelector(
            "#m-service .service-card-item:nth-child(1)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(2)"
          ).style.left = "-150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.transform = "scale(0.95)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4) "
          ).style.top = "calc(var(--top-dims) * 1)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.left = "0";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.transform = "scale(0.9)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.top = "calc(var(--top-dims) * 2)";
        } else if (index == 3) {
          document
            .querySelector("#m-service .service-card-item.active")
            .classList.remove("active");
          serviceCardM.classList.add("active");
          document.querySelector(
            "#m-service .service-card-item:nth-child(1)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(2)"
          ).style.left = "-150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.transform = "scale(0.95)";
          document.querySelector(
            "#m-service .service-card-item:nth-child(5) "
          ).style.top = "calc(var(--top-dims) * 1)";
        } else if (index == 4) {
          document
            .querySelector("#m-service .service-card-item.active")
            .classList.remove("active");
          serviceCardM.classList.add("active");
          document.querySelector(
            "#m-service .service-card-item:nth-child(1)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(2)"
          ).style.left = "-150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(3)"
          ).style.left = "150%";
          document.querySelector(
            "#m-service .service-card-item:nth-child(4)"
          ).style.left = "-150%";
        }
      }
    });
  });
});
