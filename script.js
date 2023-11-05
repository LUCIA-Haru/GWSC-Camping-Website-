/* Toggle Menu */
const body = document.querySelector("mainwrapper");
const nav = document.querySelector("nav");
const sidebarOpen = document.querySelector(".sidebarOpen");
const sidebarClose = document.querySelector(".sidebarClose");
const mainwrapper = document.querySelector(".mainwrapper");

// Function to open the sidebar
function openSidebar() {
  nav.classList.add("active");
}

// Function to close the sidebar
function closeSidebar() {
  nav.classList.remove("active");
}

sidebarOpen.addEventListener("click", openSidebar);

sidebarClose.addEventListener("click", closeSidebar);

mainwrapper.addEventListener("click", (e) => {
  let clickedElm = e.target;

  if (
    !clickedElm.classList.contains("sidebarOpen") &&
    !clickedElm.classList.contains("menu")
  ) {
    closeSidebar(); // Close the sidebar when clicking outside
  }
});

// /* Event listener */
// toggle.addEventListener("click", toggleNavMenu, false);

// slider banner

const slides = document.querySelectorAll(".slide-container");
let index = 0;

// next
function next() {
  slides[index].classList.remove("active2");
  index = (index + 1) % slides.length;
  slides[index].classList.add("active2");
}

// prev
function prev() {
  slides[index].classList.remove("active2");
  index = (index - 1 + slides.length) % slides.length;
  slides[index].classList.add("active2");
}

// autoplay

setInterval(next, 6000);

// Pas Validator
var lockIcon = document.querySelector(".fa-lock");
var password = document.querySelector("#pass");
var state = false;
let text, validIcons, invalidIcons;

function toggle() {
  myFunction();
  if (state) {
    function displayPass() {
      document.getElementById("pass").setAttribute("type", "password");
    }
    setTimeout(displayPass, 80);

    state = false;
  } else {
    function displayText() {
      document.getElementById("pass").setAttribute("type", "text");
    }
    setTimeout(displayText, 80);

    state = true;
  }
}

function myFunction() {
  var eye = document.querySelector(".eye-close");
  imgsrc = document.getElementById("img1").src;
  if (imgsrc.indexOf("eye-close") != -1) {
    eye.classList.add("eye-open");
    document.getElementById("img1").src =
      "https://i.postimg.cc/3JHFrZ3v/eye-open.png";
  } else {
    eye.classList.remove("eye-open");
    document.getElementById("img1").src =
      "https://i.postimg.cc/HWMtCN1m/eye-close.png";
  }
}

// checkpass

function textChange() {
  var password = document.getElementById("pass").value;
  var capital = document.getElementById("capital");
  var specialChar = document.getElementById("special-char");
  var number = document.getElementById("number");
  var moreThan8 = document.getElementById("more-than-8");

  // Check for uppercase letter
  if (/[A-Z]/.test(password)) {
    capital.querySelector(".fa-check").style.opacity = "1";
    capital.querySelector(".fa-times").style.opacity = "0";
  } else {
    capital.querySelector(".fa-check").style.opacity = "0";
    capital.querySelector(".fa-times").style.opacity = "1";
  }

  // Check for special character
  if (/[!@#$%^&*]/.test(password)) {
    specialChar.querySelector(".fa-check").style.opacity = "1";
    specialChar.querySelector(".fa-times").style.opacity = "0";
  } else {
    specialChar.querySelector(".fa-check").style.opacity = "0";
    specialChar.querySelector(".fa-times").style.opacity = "1";
  }

  // Check for number
  if (/\d/.test(password)) {
    number.querySelector(".fa-check").style.opacity = "1";
    number.querySelector(".fa-times").style.opacity = "0";
  } else {
    number.querySelector(".fa-check").style.opacity = "0";
    number.querySelector(".fa-times").style.opacity = "1";
  }

  // Check for length greater than or equal to 8
  if (password.length >= 8) {
    moreThan8.querySelector(".fa-check").style.opacity = "1";
    moreThan8.querySelector(".fa-times").style.opacity = "0";
  } else {
    moreThan8.querySelector(".fa-check").style.opacity = "0";
    moreThan8.querySelector(".fa-times").style.opacity = "1";
  }
}

// Translate
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    { pageLanguage: "en" },
    "google_translate_element"
  );
}

// Cookie
const cookieBox = document.querySelector(".cookiewrapper"),
  buttons = document.querySelectorAll(".cbtn");
console.log(cookieBox, buttons);
const executeCodes = () => {
  // if (document.cookie.includes("GWSC")) return;
  cookieBox.classList.add("show");
  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      cookieBox.classList.remove("show");

      // for accept
      if (button.id == "acceptBtn") {
        //duration
        document.cookie = "cookieBy= GWSC; max-age = " + 60 * 60 * 24;
      }
    });
  });
};
//executeCodes function will be called on webpage load
window.addEventListener("load", executeCodes);

// Scroll to top
// Get the button

let topbtn = document.getElementById("topbtn");

// Listen to the scroll event on the window
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topbtn.style.display = "block"; // Show the button
  } else {
    topbtn.style.display = "none"; // Hide the button
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
