function popUp() { //have to have it outside the document ready because this is needed to load with the body not wait till body finishes loading
  // document.getElementById("hiddenModal").modal = 'show';
  $('#hiddenModal').modal('show');
}

$(document).ready(function(){

  $("input, textarea").blur(function(){
    if ($("#"+this.id).val() === "") {
      $(this).css("border-color", "red");
    } else {
      $(this).css("border-color", "white");
    }
  });


});

//Have to have the body and elements loaded before they can be refered to.
//But functions can be declared before elements declared,
//statements(assigning event handlers) must be declared after the elements have been declared.

//jQuery attachs the event handler and states the function of the event handler,
//all in one go

//Unliike javascript where you have to do the event handler and functions seperately
