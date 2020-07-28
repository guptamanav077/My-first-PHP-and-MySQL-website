function hideVideo() {
  document.getElementById("studenthack").style.display = "none";
}

function showVideo() {
  document.getElementById("studenthack").style.display = "block";
}

function currentDate() {
  document.getElementById('date').innerHTML = new Date(Date.now());
}
