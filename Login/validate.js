$(document).ready(function() {
  $("#name").after("<span id='uname'> </span>");
	$("#password").after("<span id='pwd'> </span>")
	$("#email").after("<span id='mail'> </span>");

  $("#name").focus(function(){
    $("#uname").removeClass('ok');
		$("#uname").removeClass('error');
		$("#uname").addClass('info');
		$("#uname").text("Name should have alphabets only");

  })
  $("#name").blur(function(){
    var name=$("#name").val();
    if(name=="")
    {
      $("#uname").removeClass('info')
      $("#uname").removeClass('error');
      $("#uname").removeClass('ok');
      $("#uname").text("");
    }
    else{
    var testExp= new RegExp(/^[a-zA-Z]+$/);
    if(!testExp.test(name))
    {
      $("#uname").removeClass('ok')
      $("#uname").removeClass('info');
      $("#uname").addClass('error');
      $("#uname").text("name incorrect!");
    }
    else {
      $("#uname").removeClass('info')
      $("#uname").removeClass('error');
      $("#uname").removeClass('ok');
      $("#uname").text("");
    }
}

  })


  $("#password").focus
	(function(){
		$("#pwd").removeClass('ok');
		$("#pwd").removeClass('error');
		$("#pwd").addClass('info');
		$("#pwd").text("Password should be atleast 6 characters long");
	});

  $("#password").blur
  (function(){
    var testpwd= new RegExp(/^([a-zA-Z0-9._-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    var password = $("#password").val();
    if(!password)
    {
      $("#pwd").removeClass('info')
      $("#pwd").removeClass('error');
      $("#pwd").removeClass('ok');
      $("#pwd").text("");
    }
    else
      {
        if(password.length<6)
    {
      $("#pwd").removeClass('info');
      $("#pwd").addClass('error');
      $("#pwd").removeClass('ok');
      $("#pwd").text("password incorrect!");
    }
    else
    {

      $("#pwd").removeClass('info');
      $("#pwd").removeClass('error');
      $("#pwd").removeClass('ok');
      $("#pwd").text("");
    }
  }
  });

  $("#email").focus
  (function(){
    $("#mail").removeClass('ok');
    $("#mail").removeClass('error');
    $("#mail").addClass('info');
    $("#mail").text("Enter valid Email format");
  });

  $("#email").blur
	(function(){
    var testEmail= new RegExp(/^([a-zA-Z0-9._-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
		var email = $("#email").val();
		if(email=="")
		{
			$("#mail").removeClass('info')
			$("#mail").removeClass('error');
			$("#mail").removeClass('ok');
			$("#mail").text("");
		}
		else
		{
		if(testEmail.test(email))
		{
			$("#mail").removeClass('error');
			$("#mail").removeClass('info');
			$("#mail").removeClass('ok');
			$("#mail").text("");
		}
		else
		{
			$("#mail").removeClass('info');
			$("#mail").removeClass('ok');
			$("#mail").addClass('error');
			$("#mail").text("Email incorrect!");

		}
	}


	});

});
