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
                    $("#check-e").fadeOut();
                    $("#pass-e").fadeIn();
                  $("#pass-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">Your Password Must Contain At Least 8 Characters, At Least 1 Number, 1 Capital Letter ,  and 1 Lowercase Letter </span>');
                      $("#signup").text('Sign Up');
                      });}


                else if (response== "Exist") {
                  $("#check-e").fadeIn(1000,function(){
                    $("#pass-e").fadeOut();
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


function hsup(){
            var data = $("#gsf").serialize();
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
                    $("#check-e").fadeOut();
                    $("#pass-e").fadeIn();
                  $("#pass-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:12px">Your Password Must Contain At Least 8 Characters, At Least 1 Number, 1 Capital Letter ,  and 1 Lowercase Letter </span>');
                      $("#signup").text('Sign Up');
                      });}


                else if (response== "Exist") {
                  $("#check-e").fadeIn(1000,function(){
                    $("#pass-e").fadeOut();
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



function adlogin(){
    var data = $("#adloginf").serialize();
    $.ajax({
      type:'POST', url: 'check_admin.php', data:data, beforeSend:
      function(){

        $("#login").html('logging in...');
      }, success:
      function(response)
      {
        if(response=="Valid"){
          $("#login").fadeOut();
          $("#check-e").fadeOut();

          setTimeout('window.location.href="admin"',2000);
        }

        else if (response== "Invalid") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">Incorrect username or password.</span>');
              $("#login").text('Login');
          });

        }
        else{
          $("#check-e").fadeIn(1000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#login").text('Login');
              });
        }


    }});
    return false;
}


function showBtn(){
      $(".book").show();
      return false;
}


function showForm(){
  $("#starts").click(function() {
      $(".selsch, .startsch, .endsch,.sn").slideDown();
       $(".btnsch").show();
      return false;
  })
}





function createSchedule(){
    var data = $("#sform").serialize();
    $.ajax({
      type:'POST', url: 'add_schedule.php', data:data, beforeSend:
      function(){

        $("#btnsch").html('Creating...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $("#btnsch").fadeOut();
          $("#check-e").fadeOut();

          setTimeout('window.location.href="index.php"',2000);
        }

        else if (response== "Exists") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">You already have an appointment on that day</span>');
              $("#btnsch").text('Create');
          });

        }
        else{
          $("#check-e").fadeIn(1000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#btnsch").text('Create');
              });
        }


    }});
    return false;
}



function upSchedule(x){
    var data = $("#suform").serialize();
    $.ajax({
      type:'POST', url: 'edit_sche.php?id='+x, data:data, beforeSend:
      function(){

        $("#btnusch").html('Updating...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $("#btnusch").fadeOut();
          $("#ucheck-e").fadeOut();
          $("#sucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Updated Successfully</span>');
          setTimeout('window.location.href="index.php"',2000);
        }

        else if (response== "Exists") {
          $("#ucheck-e").fadeIn(3000,function(){
              $("#ucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">You already have an appointment on that day</span>');
              $("#btnsuch").text('Update');
          });

        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#ucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#btnsuch").text('Update');
              });
        }


    }});
    return false;
}


function delSchedule(x){
    var data = $("#suform").serialize();
    $.ajax({
      type:'POST', url: 'del_sche.php?id='+x, data:data, beforeSend:
      function(){

        $("#btndel").html('Deleting...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $("#btndel").fadeOut();
          $("#ucheck-e").fadeOut();
          $("#ducheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Deleted Successfully</span>');
          setTimeout('window.location.href="index.php"',2000);
        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#ucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#btndel").text('Delete');
              });
        }


    }});
    return false;
}


function showSche(){
  var irrelevant = 'irrelevant';
  var element = document.getElementById("sup_id");
  var x = element.options[element.selectedIndex].value;
  console.log(x);
          $.ajax({
          type: 'POST',
          url: 'show_sche.php?id='+x,
          data: {mydata: irrelevant},
          success: function(data){

          $("#schedule").html(data);

                  }

          });

}


function showdates(){
  var element = document.getElementById("day");
  var y = element.options[element.selectedIndex].text;
  console.log(y);

  switch (y) {
    case 'Monday':
        $("#date").html('<input type="date" class="form-control" name="date" step="7" min="2017-03-13" id="monDate" oninput="showBtn()">');
      break;

    case 'Tuesday':
      $("#date").html('<input type="date"  class="form-control" name="date" step="7" min="2017-03-14" id="tueDate" oninput="showBtn()">');
      break;

    case 'Wednesday':
        $("#date").html('<input type="date"  class="form-control" name="date" step="7" min="2017-03-15" id="wedDate"  oninput="showBtn()">');
      break;

    case 'Thursday':
      $("#date").html('<input type="date" class="form-control" name="date" step="7" min="2017-03-16" id="thurDate"  oninput="showBtn()">');
      break;

    case 'Friday':
        $("#date").html('<input type="date" class="form-control" name="date" step="7" min="2017-03-17" id="friDate"  oninput="showBtn()">');
      break;

    case 'Saturday':
      $("#date").html('<input type="date" class="form-control" name="date" step="7" min="2017-03-18" id="satDate"  oninput="showBtn()">');
      break;
    default:
      alert('NO AVAILABLE DAY');
      console.log('NO AVAILABLE DAY')
    break;
  }

}


function selectApp(){
    var data = $("#appf").serialize();
    $.ajax({
      type:'POST', url: 'selectApp.php', data:data, beforeSend:
      function(){

        $(".book").html('Booking...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $(".book").fadeOut();
          $("#check-e").fadeOut();
          $("#check-s").html("Appointment created Succesfully");

          setTimeout('window.location.href="index.php"',2000);
        }

        else if (response== "Exists") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">Number of students full for that day, please select another day</span>');
              $(".book").text('Book');
          });

        }else if (response== "Late") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">Please select another day, it\'s past 10 hours to the appointment</span>');
              $(".book").text('Book');
          });

        }else if (response== "Sameday") {
          $("#check-e").fadeIn(3000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">You can\'t book on the same day, please select another day</span>');
              $(".book").text('Book');
          });

        }
        else{
          $("#check-e").fadeIn(1000,function(){
              $("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $(".book").text('Book');
              });
        }


    }});
    return false;
}




function delApp(x){
    var data = "";
    $.ajax({
      type:'POST', url: 'deleteApp.php?id='+x, data:data});
        //   , beforeSend:
        //   function(){
        //
        //     $("#delApp").html('Deleting...');
        // //   }, success:
    //   function(response)
    //   {
    //     if(response=="Go"){
    //       $("#delApp").fadeOut();
    //       $("#ucheck-e").fadeOut();
    //       $("#daucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Deleted Successfully</span>');
    //       $('#confmod'+x).modal('hide');
    //       $('#messModal'+x).modal('show');
    //       //
    //       // setTimeout('window.location.href="sendmessage.php"',2000);
    //     }
    //     else{
    //       $("#ucheck-e").fadeIn(1000,function(){
    //           $("#ucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
    //           $("#delApp").text('Delete');
    //           });
    //     }
    //
    //
    // }});
    return false;
}



function delSapp(x){
    var data = "";
    $.ajax({
      type:'POST', url: 'deleteApp.php?id='+x, data:data, beforeSend:
          function(){

            $("#delApp").html('Deleting...');
          }, success:
      function(response)
      {
        if(response=="Go"){
          $("#delApp").fadeOut();
          $("#cucheck-e").fadeOut();
          $("#daucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Deleted Successfully</span>');
          setTimeout('window.location.href="index.php"',2000);
        }
        else{
          $("#cucheck-e").fadeIn(1000,function(){
              $("#cucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#delApp").text('Delete');
              });
        }


    }});
    return false;
}


function hdm(x){
  $('#confmod'+x).modal('hide');
}


function conApp(x){
    var data = "";
    $.ajax({
      type:'POST', url: 'confirmApp.php?id='+x, data:data, beforeSend:
      function(){

        $("#conApp").html('Confirming...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $("#conApp").fadeOut();
          $("#ucheck-e").fadeOut();
          $("#cucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Confirmed Successfully</span>');
          setTimeout('window.location.href="index.php"',2000);
        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#ucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#conApp").text('Confirm');
              });
        }


    }});
    return false;
}


function sendMessage(x){
    var data = $("#messform").serialize();
    $.ajax({
      type:'POST', url: 'sendmessage.php?id='+x, data:data, beforeSend:
      function(){

        $(".ms").html('Sending...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $(".ms").fadeOut();
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Sent and deleted Successfully</span>');
          delApp(x);
          setTimeout('window.location.href="index.php"',1000);
        }
        else if(response=="empty"){
          $(".ms").html("No message sent")
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">You didn\'t send any message</span>');
          delApp(x);
          setTimeout('window.location.href="index.php"',1000);
        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#dmaucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#conApp").text('Confirm');
              });
        }


    }});
    return false;
}


function sendsmessage(x){
    var data = $("#messform").serialize();
    $.ajax({
      type:'POST', url: 'sendmessage.php?id='+x, data:data, beforeSend:
      function(){
        $(".ms").html('Sending...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $(".ms").fadeOut();
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Sent Successfully</span>');
          setTimeout('window.location.href="index.php"',1000);
        }
        else if(response=="empty"){
          $(".ms").html("No message sent")
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">You didn\'t send any message</span>');
          setTimeout('window.location.href="index.php"',1000);
        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#dmaucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              $("#conApp").text('Confirm');
              });
        }


    }});
    return false;
}



function mess(x){
    var data = $("#messform1").serialize();
    $.ajax({
      type:'POST', url: 'sendmessage.php?id='+x, data:data, beforeSend:
      function(){
        $(".mes").html('Sending...');
      }, success:
      function(response)
      {
        if(response=="Go"){
          $(".mes").fadeOut();
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">Sent Successfully</span>');
          setTimeout('window.location.href="index.php"',1000);
        }
        else if(response=="empty"){
          $(".mes").html("No message sent")
          $("#dmaucheck-e").fadeOut();
          $("#cmucheck-e").html('<span style="color:rgb(35, 219, 25);font-family:calibri;font-size:13px">You didn\'t send any message</span>');
          setTimeout('window.location.href="index.php"',1000);
        }
        else{
          $("#ucheck-e").fadeIn(1000,function(){
              $("#dmaucheck-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">'+response+'</span>');
              });
        }


    }});
    return false;
}
