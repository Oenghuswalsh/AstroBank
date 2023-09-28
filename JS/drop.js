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
  const button = document.getElementById(buttonId); // Get the Id fo the clicked button
  button.addEventListener("click", () => {
    // Reset all buttons to their original state
    buttonIds.forEach((id) => {
      const resetButton = document.getElementById(id);
      resetButton.style.backgroundColor = "transparent"; // Reset background color to transparent
      resetButton.style.border = "none"; // reset border to none
    });

    // Set the "Banking" button to the desired style of #ff7a00 orande border and #ffd900 yellow background
    const bankingButton = document.getElementById("banking-button");
    bankingButton.style.backgroundColor = "#ffd900";
    bankingButton.style.border = "solid 2px #ff7a00";

    // Set the clicked button to the desired style of #ff7a00 orande border and #ffd900 yellow background
    button.style.backgroundColor = "#ffd900";
    button.style.border = "solid 2px #ff7a00";

    // Hide all containers
    for (const containerKey in containers) {
      if (containers.hasOwnProperty(containerKey)) {
        containers[containerKey].style.display = "none";
      }
    }

    // Display the corresponding container relating to the ID of the clicked button
    containers[buttonId.split("-")[0]].style.display = "flex";

    // Hide or display the subButtons according to the ID of the button clicked
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
  // Get id of the button and the form
  var searchButton = document.getElementById("searchButton");
  var searchForm = document.getElementById("searchForm");
  var menuIcon = document.getElementById("menuIcon");
  var navMenu = document.getElementById("navMenu");

  // Click event listener for search button
  searchButton.addEventListener("click", function () {
    // Toggle the "display" class on the form to control its visibility
    if (
      searchForm.style.display === "none" ||
      searchForm.style.display === ""
    ) {
      searchForm.style.display = "block";
    } else {
      searchForm.style.display = "none";
    }
  });

  // Click event listener for search button
  menuIcon.addEventListener("click", function () {
    // Toggle the "display" class on the form to control its visibility
    if (navMenu.style.display === "none" || navMenu.style.display === "") {
      navMenu.style.display = "flex";
    } else {
      navMenu.style.display = "none";
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loanCalculatorForm");
  const repaymentAmount = document.getElementById("repaymentAmount");
  const totalCost = document.getElementById("totalCost");

  // Add a reference to the reset button
  const resetButton = document.querySelector('input[type="reset"]');

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const loanType = form.loanType.value;
    const loanAmount = parseFloat(form.loanAmount.value);
    const deposit = parseFloat(form.deposit.value);
    const term = parseFloat(form.term.value);
    const interestRate = parseFloat(form.interestRate.value) / 100;
    const repaymentFrequency = form.repaymentFrequency.value;

    // Calculate the repayment amount and total cost here
    // You can use different formulas based on the loan type

    // Example formula for monthly payments:
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
  // Add an event listener to the reset button to clear the form fields
  resetButton.addEventListener("click", function () {
    form.reset();
    // Clear the result fields as well
    repaymentAmount.textContent = "0.00";
    totalCost.textContent = "0.00";
  });
});
