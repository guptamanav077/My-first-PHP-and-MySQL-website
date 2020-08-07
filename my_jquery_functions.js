//This file with contain the functions that need to be loaded before body as this file is in the head.

function popUp() { //have to have it outside the document ready because this is needed to load with the body not wait till body finishes loading
  // document.getElementById("hiddenModal").modal = 'show';
  // var person = prompt("Please enter your full name:");
  checkCookie();
  $('#hiddenModal').modal('show');
  startTime();
  // document.cookie = "username="+person+"; expires=Thu, 18 Dec 2100 12:00:00 UTC";
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}

$(document).ready(function(){

  $("input, textarea").blur(function(){
    if ($("#"+this.id).val() === "") {
      $(this).css("border-color", "red");
    } else {
      $(this).css("border-color", "white");
    }
  });

  $("#hide").click(function() {
    $("#studenthack").hide("slow");
    // document.getElementById("studenthack").style.display = "none";
  });

  $("#show").click(function() {
    $("#studenthack").show("slow");
    // document.getElementById("studenthack").style.display = "block";
  });

  $("#fade").click(function () {
    $("#studenthack").fadeToggle("slow");
  });

});

//Have to have the body and elements loaded before they can be refered to.
//But functions can be declared before elements declared,
//statements(assigning event handlers) must be declared after the elements have been declared.

//jQuery attachs the event handler and states the function of the event handler,
//all in one go

//Unliike javascript where you have to do the event handler and functions seperately
