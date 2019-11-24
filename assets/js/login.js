
  $('#signUpLink').click(function(){ onSignupClick(); return false; });
  $('#signInLink').click(function(){ onSignInclick(); return false; });


  var expanded = false;

  function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    } else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  }


$("#signUpForm").submit(function(){
  var checked = $("#signUpForm input:checked").length > 0;
  if (!checked){
      alert("Please check at least one genre");
      return false;
  }
});


$("#updateForm").submit(function(){
  var checked = $("#updateForm input:checked").length > 0;
  if (!checked){
      alert("Please check at least one genre");
      return false;
  }
});


 function onSignupClick() {
         document.getElementById("con-signIn").style.display = "none";
     document.getElementById("con-signUp").style.display = "block";
 }

 function onSignInclick() {
    document.getElementById("con-signIn").style.display = "block";
    document.getElementById("con-signUp").style.display = "none";
    
}

