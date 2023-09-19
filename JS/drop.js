const bankingButton = document.getElementById("banking-button");
const personalButton = document.getElementById("personal-button");
const businessButton = document.getElementById("business-button");
const loansButton = document.getElementById("loans-button");
const insuranceButton = document.getElementById("insurance-button");
const aboutButton = document.getElementById("about-button");
const contactButton = document.getElementById("contact-button");
const subButtons = document.querySelector(".sub-buttons");
const personalContainer = document.querySelector(".personal-container");
const businessContainer = document.querySelector(".business-container");
const loansContainer = document.querySelector(".loans-container");
const insuranceContainer = document.querySelector(".insurance-container");
const aboutContainer = document.querySelector(".about-container");
const contactContainer = document.querySelector(".contact-container");

const buttonIds = [
  "banking-button",
  "personal-button",
  "business-button",
  "loans-button",
  "insurance-button",
  "about-button",
  "contact-button",
];

const containers = {
  banking: subButtons,
  personal: personalContainer,
  business: businessContainer,
  loans: loansContainer,
  insurance: insuranceContainer,
  about: aboutContainer,
  contact: contactContainer,
};

buttonIds.forEach((buttonId) => {
  const button = document.getElementById(buttonId);
  button.addEventListener("click", () => {
    // First, reset all buttons to their original state
    buttonIds.forEach((id) => {
      const resetButton = document.getElementById(id);
      resetButton.style.backgroundColor = "blue"; // Revert background color
      resetButton.style.color = "white"; // Revert font color
    });

    // Set the "Banking" button to the desired style
    const bankingButton = document.getElementById("banking-button");
    bankingButton.style.backgroundColor = "yellow";
    bankingButton.style.color = "black";

    // Set the clicked button to the desired style
    button.style.backgroundColor = "yellow";
    button.style.color = "black";

    // Hide all containers
    for (const containerKey in containers) {
      if (containers.hasOwnProperty(containerKey)) {
        containers[containerKey].style.display = "none";
      }
    }

    // Display the corresponding container
    containers[buttonId.split("-")[0]].style.display = "flex";

    // Handle the subButtons display logic
    if (
      buttonId === "loans-button" ||
      buttonId === "insurance-button" ||
      buttonId === "about-button" ||
      buttonId === "contact-button"
    ) {
      subButtons.style.display = "flex";
      bankingButton.style.backgroundColor = "blue";
      bankingButton.style.color = "white";
      personalButton.style.display = "none";
      businessButton.style.display = "none";
    } else if (
      buttonId === "banking-button" ||
      buttonId === "personal-button" ||
      buttonId === "business-button"
    ) {
      personalButton.style.display = "flex";
      businessButton.style.display = "flex";
      subButtons.style.display = "flex";
    }
  });
});
