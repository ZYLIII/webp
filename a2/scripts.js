document.addEventListener("DOMContentLoaded", function () {
  const mobileNavIcon = document.querySelector(".mobile-nav-icon");
  const mynavbar = document.querySelector(".mynavbar");

  mobileNavIcon.addEventListener("click", function () {
    mynavbar.classList.toggle("active");
  });
});

document.getElementById('dateWrapper').addEventListener('click', () => {
    document.getElementById('date').focus();
});


document.addEventListener("DOMContentLoaded", () => {
  // Set minimum date to today for the date input
  const today = new Date().toISOString().split("T")[0];
  document.getElementById("date").setAttribute("min", today);
  const dateWrapper = document.getElementById("dateWrapper");
  const dateInput = document.getElementById("date");

  dateWrapper.addEventListener("click", function () {
    dateInput.focus();
  });
});

function convertToUpper(inputElem) {
  inputElem.value = inputElem.value.toUpperCase();
}

function validateDate(dateElem) {
    const selectedDate = new Date(dateElem.value);
    const today = new Date();
    const dateWrapper = document.getElementById('dateWrapper');
    if (selectedDate < today) {
        let errorMsg = dateWrapper.querySelector('.error');
        if (!errorMsg) {
            errorMsg = document.createElement('span');
            errorMsg.className = 'error';
            dateWrapper.appendChild(errorMsg);
        }
        errorMsg.textContent = 'Please select a valid date!';
        dateElem.value = '';
    } else {
        const errorMsg = dateWrapper.querySelector('.error');
        if (errorMsg) {
            dateWrapper.removeChild(errorMsg);
        }
    }
}


function showAdvice(selectElem) {
  const adviceBox = document.getElementById("advice");
  switch (selectElem.value) {
    case "childhood":
      adviceBox.textContent =
        "A disclaimer that multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 – 48 hours afterwards.";
      break;
    case "influenza":
      adviceBox.textContent =
        "The best time to get vaccinated is in April and May each year for optimal protection over the winter months.";
      break;
    case "covid":
      adviceBox.textContent =
        "Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains.";
      break;
    case "bloodtest":
      adviceBox.textContent =
        "That some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment.";
      break;
    default:
      adviceBox.textContent = "";
  }
}
