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
  const button = document.getElementById(buttonId); // Get the Id of the clicked navbar button
  button.addEventListener("click", () => {
    // Reset all navbar buttons to their original state
    buttonIds.forEach((id) => {
      const resetButton = document.getElementById(id);
      resetButton.style.backgroundColor = "transparent"; // Reset background color of navbar button to transparent
      resetButton.style.border = "none"; // reset border of navbar button to none
    });

    // Set the Banking button style to #ff7a00 orande border and #ffd900 yellow background
    const bankingButton = document.getElementById("banking-button");
    bankingButton.style.backgroundColor = "#ffd900";
    bankingButton.style.border = "solid 2px #ff7a00";

    // Set the clicked navbar button style to #ff7a00 orande border and #ffd900 yellow background
    button.style.backgroundColor = "#ffd900";
    button.style.border = "solid 2px #ff7a00";

    // Hide all dropdown containers
    for (const containerKey in containers) {
      if (containers.hasOwnProperty(containerKey)) {
        containers[containerKey].style.display = "none";
      }
    }

    // Display the dropdown container relating to the ID of the clicked navbar button
    containers[buttonId.split("-")[0]].style.display = "flex";

    // Hide or display the navbar subButtons according to the ID of the button clicked
    if (
      buttonId === "loans-button" ||
      buttonId === "insurance-button" ||
      buttonId === "about-button" ||
      buttonId === "contact-button"
    ) {
      subButtons.style.display = "flex";
      bankingButton.style.backgroundColor = "white";
      bankingButton.style.color = "black";
      bankingButton.style.border = "none";
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
document.addEventListener("DOMContentLoaded", function () {
  // Get the id of the menu icon and search icon for toggling the navbar and search bar on moblie display
  var searchButton = document.getElementById("searchButton");
  var searchForm = document.getElementById("searchForm");
  var menuIcon = document.getElementById("menuIcon");
  var navMenu = document.getElementById("navMenu");

  searchButton.addEventListener("click", function () {
    // Toggle the display of the search bar on moblie display
    if (
      searchForm.style.display === "none" ||
      searchForm.style.display === ""
    ) {
      searchForm.style.display = "block";
    } else {
      searchForm.style.display = "none";
    }
  });

  menuIcon.addEventListener("click", function () {
    // Toggle the display of the navbar dropdown menu on moblie display
    if (navMenu.style.display === "none" || navMenu.style.display === "") {
      navMenu.style.display = "flex";
    } else {
      navMenu.style.display = "none";
    }
  });
});
// Functions and formula to calculate the repayment amount and total loan costs
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loanCalculatorForm");
  const repaymentAmount = document.getElementById("repaymentAmount");
  const totalCost = document.getElementById("totalCost");

  const resetButton = document.querySelector('input[type="reset"]');

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const loanType = form.loanType.value;
    const loanAmount = parseFloat(form.loanAmount.value);
    const deposit = parseFloat(form.deposit.value);
    const term = parseFloat(form.term.value);
    const interestRate = parseFloat(form.interestRate.value) / 100;
    const repaymentFrequency = form.repaymentFrequency.value;

    // Formula for monthly payments:
    const monthlyInterestRate = interestRate / 12;
    const numberOfPayments = term;
    const monthlyRepayment =
      ((loanAmount - deposit) *
        (monthlyInterestRate *
          Math.pow(1 + monthlyInterestRate, numberOfPayments))) /
      (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);

    const totalCostOfLoan = monthlyRepayment * numberOfPayments;

    repaymentAmount.textContent = monthlyRepayment.toFixed(2);
    totalCost.textContent = totalCostOfLoan.toFixed(2);
  });
  // Reset button to clear the calculator form fields
  resetButton.addEventListener("click", function () {
    form.reset();

    repaymentAmount.textContent = "0.00";
    totalCost.textContent = "0.00";
  });
});
// Open an account form validation function
function validateForm() {
  var accountType = document.getElementById("account_type").value;
  var errorMessage = document.getElementById("error_message");

  if (accountType === "Select an account type") {
    errorMessage.textContent = "Please select an account type.";
    return false;
  } else {
    errorMessage.textContent = "";
    return true;
  }
}
