// JavaScript Document

//ean hide and show
function myEanHideAndShowFunction() {
  var x = document.getElementById("ean");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

//cvr hide and show
function myCvrHideAndShowFunction() {
  var x = document.getElementById("cvr");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

//fødelsdato hide and show
function myFødselsDatoHideAndShowFunction() {
  var x = document.getElementById("fødselsdato");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
