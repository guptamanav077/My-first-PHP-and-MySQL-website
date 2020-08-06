// Add Defer attribute for this script in the html head??
"use strict";

document.getElementById("header").onclick = changeColour;
document.getElementById("facePicture").addEventListener("mouseover", changePic);
document.getElementById("facePicture").addEventListener("mouseout", restorePic);

function hideVideo() {
  document.getElementById("studenthack").style.display = "none";
}

function showVideo() {
  document.getElementById("studenthack").style.display = "block";
}

function currentDate() {
  document.getElementById('date').innerHTML = new Date(Date.now());
}

function changeColour() {
  let cars = ["green", "lightblue", "yellow"];
  let randomNumber = getRndInteger(0,2);
  let colorr = cars[randomNumber];
  let myElements = document.getElementsByClassName("middle");
  document.getElementById("main").style.borderColor = colorr;
  let x;
  for (x of myElements) {
    x.style.backgroundColor = colorr;
  }
}

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function changePic() {
  document.getElementById("facePicture").src = "troll.png";
}

function restorePic() {
  document.getElementById("facePicture").src = "face.jpg";
}

function checker(id) {
  if (document.getElementById(id).value === "") {
    document.getElementById(id).style.borderColor = "red";
  } else {
    document.getElementById(id).style.borderColor = "white";
  }
}
