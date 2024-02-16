VanillaTilt.init(document.querySelectorAll(".card"), {
  max: 25,
  speed: 400,
  glare: true,
  "max-glare": 1,
});

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    var loader = document.getElementById("preloader");
    loader.classList.add("hidden");
    document.querySelector(".Main_topic_mood").classList.add("animate");
    document.querySelector(".icon_head").classList.add("animate");
  }, 4000);
});

window.addEventListener("scroll", function () {
  var navigationSection = document.querySelector(".navigation_section");

  if (window.scrollY > 50) {
    navigationSection.classList.add("show");
  } else {
    navigationSection.classList.remove("show");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var featuresLink = document.querySelector(".features");

  featuresLink.addEventListener("click", function (event) {
    event.preventDefault();

    featuresLink.classList.add("active");

    var targetSection = document.getElementById("test");
    targetSection.scrollIntoView({
      behavior: "smooth",
    });

    setTimeout(function () {
      featuresLink.classList.remove("active");
    }, 3000);
  });
});

$(document).ready(function () {
  $(".menu-toggle").click(function () {
    $(".Navigation_Bar").toggleClass("open");
  });
});

document.getElementById("About_us").addEventListener("click", function(event) {
event.preventDefault(); // Prevent default link behavior (i.e., navigating to href)
window.location.href = 'About_us.php';
});
