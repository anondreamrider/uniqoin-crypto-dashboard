'use strict';



/**
 * chart
 */


document.addEventListener("DOMContentLoaded", function () {
  // Sample data for portfolio values
  var data = {
      labels: ["2023-04-11", "2023-04-16", "2023-04-25", "2023-05-01", "2023-05-02", "2023-06-03","2023-06-08", "2023-06-09", "2023-06-15", "2023-06-22", "2023-07-11", "2023-07-28","2023-08-05", "2023-08-11", "2023-09-17", "2023-10-18", "2023-11-12", "2023-11-17", "2023-11-19", "2023-11-22", "2023-11-30" ],
      datasets: [{
          label: "Portfolio Value",
          borderColor: "#1a82ca",
          backgroundColor: "rgba(26, 130, 202, 0.3)",
          data: [20000, 3000, 40000, 50000, 60000, 55000, 70000, 80000, 60000, 50000, 60000, 55000, 100000, 70000, 90000, 60000, 80000, 85000, 135000, 140000, 140989]
      }]
  };

  // Create the area chart
  var ctx = document.getElementById("portfolioChart").getContext("2d");
  var portfolioChart = new Chart(ctx, {
      type: "line",
      data: data,
      options: {
          scales: {
              x: [{
                  type: "time",
                  time: {
                      unit: "month",
                      displayFormats: {
                          month: "MMM YYYY"
                      }
                  },
                  ticks: {
                      source: "labels"
                  }
              }],
              y: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          },
          plugins: {
              legend: {
                  display: true,
                  position: 'top',
              }
          }
      }
  });
});

/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  navToggler.classList.toggle("active");
  document.body.classList.toggle("active");
}

addEventOnElem(navToggler, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  navToggler.classList.remove("active");
  document.body.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);



/**
 * header active
 */

const header = document.querySelector("[data-header]");

const activeHeader = function () {
  if (window.scrollY > 300) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", activeHeader);

function myFunction() {
  var element = document.body;
  element.classList.toggle("toggle-switch");
}


function toggleShow () {
  var el = document.getElementById("box");
  el.classList.toggle("show");
}

/**
 * toggle active on add to fav
 */

const addToFavBtns = document.querySelectorAll("[data-add-to-fav]");

const toggleActive = function () {
  this.classList.toggle("active");
}

addEventOnElem(addToFavBtns, "click", toggleActive);



/**
 * scroll revreal effect
 */

const sections = document.querySelectorAll("[data-section]");

const scrollReveal = function () {
  for (let i = 0; i < sections.length; i++) {
    if (sections[i].getBoundingClientRect().top < window.innerHeight / 1.5) {
      sections[i].classList.add("active");
    } else {
      sections[i].classList.remove("active");
    }
  }
}

scrollReveal();

addEventOnElem(window, "scroll", scrollReveal);






