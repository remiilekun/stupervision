function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!

 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
}

function login(){
    var data = $("#loginf").serialize();
    $.ajax({
      type:'POST', url: 'check_login.php', data:data, beforeSend:
      function(){

        $("#signin").html('Signing in...');
      }, success:
      function(response)
      {
        if(response=="Valid"){
          $("#signin").fadeOut();
          $("#check-e").fadeOut();

          setTimeout('window.location.href="dashboard"',2000);
        }

        else if (response== "Invalid") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">Incorrect username or password.</span>');
              $("#signin").text('Sign In');
          });

        }
        else{
          $("#check-e").fadeIn(1000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#signinbtn").text('Sign IN');
              });
        }


    }});
    return false;
}


function signup(){
            var data = $("#signupf").serialize();
            $.ajax({
              type:'POST', url: 'check_reg.php', data:data, beforeSend:
              function(){

                $("#signup").html('Processing...');
              }, success:
              function(response)
              {
                if(response=="Go"){
                  $("#signup").fadeOut();
                  $("#check-e").fadeOut();

                  setTimeout('window.location.href="dashboard/settings.php"',2000);
                }
                else if(response=="Mismatch"){
                  $("#check-e").fadeIn(1000,function(){
                  $("#pass-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">Your Password Must Contain At Least 8 Characters, At Least 1 Number, 1 Capital Letter ,  and 1 Lowercase Letter </span>');
                      $("#signup").text('Sign Up');
                      });}


                else if (response== "Exist") {
                  $("#check-e").fadeIn(1000,function(){
                      $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">This email has been registered.</span>');
                      $("#signup").text('Sign Up');
                  });
                }
                else{
                  $("#check-e").fadeIn(1000,function(){
                      $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">'+response+'</span>');
                      $("#signup").text('Sign Up');
                      });
                }


            }});
            return false;
}

$(".limg img, .limg span").click(function() {
    $("#imginput").click();
    return false;
})
