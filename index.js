// Add Defer attribute for this script in the html head??
"use strict";

document.getElementById("header").onclick = changeColour;
document.getElementById("facePicture").addEventListener("mouseover", changePic);
document.getElementById("facePicture").addEventListener("mouseout", restorePic);
// document.getElementById("body").addEventListener("load", startTime);
// console.log(4);
// document.getElementById("body").addEventListener("beforeunload", leaveAlert);

// function hideVideo() {
//   document.getElementById("studenthack").style.display = "none";
// }
//
// function showVideo() {
//   document.getElementById("studenthack").style.display = "block";
// }

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

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

// function checker(id) {
//   if (document.getElementById(id).value === "") {
//     document.getElementById(id).style.borderColor = "red";
//   } else {
//     document.getElementById(id).style.borderColor = "white";
//   }
// }

// function leaveAlert() {
  // console.log(1);
  // window.alert("Thank you for visiting");
  // debugger;
  // setTimeout(console.log(10),5000);
  // console.log(1);
//   return "Thank you for visiting";
// }
