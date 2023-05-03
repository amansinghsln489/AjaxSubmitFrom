<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>JavaScript Form Validation</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    </head>
<body>
    <style>
        .midd{
             text-align: center;
             border: 2px solid;
             margin-top: 1rem;
             padding: 20px 20px 20px 20px;
             margin: 40px 500px 40px 500px;
             background-color: rgba(50, 115, 220, 0.3);
        }  
    </style>
   <script>
      $(document).ready(function() {
       $('#name1').on('input', function () {
        checkuser();
       });
        $('#email1').on('input', function () {
        checkemail();
      });
       $('#mobile1').on('input', function () {
        checkmobile();
      });
       $('#city1').on('input', function () {
        checkcity();
       });
 
      $("#submitbtn").click(function() {
   
        if (!checkuser() && !checkemail() && !checkmobile() && !checkcity()) {
           
            $("#message").html(`<div >Please fill all required field</div>`);
        } 
        else if (!checkuser() || !checkemail() || !checkmobile() || !checkcity()) {
            $("#message").html(`<div>Please fill all required field</div>`);
           
        }
        else {
            console.log("ok");
            $("#message").html("");
            var form = $('#myform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
               
                success: function (data) {
                    $('#message').html(data);
                },
               
            });
        }
      });
     });
       function checkuser()
       {
         var pattern = /^[A-Za-z0-9]+$/;
         var user = $('#name1').val();
         var validuser = pattern.test(user);
          if ($('#name1').val().length < 4)
           {
               $("#formerror").html('username length is too short');
                 return false;
            }
            else if (!validuser)
            {
              $("#formerror").html('username should be a-z ,A-Z only');
               return false;
            } 
            else
             {
              $('#formerror').html('');
                return true;
            }
        }
        function checkemail() {
           var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
           var email = $('#email1').val();
           var validemail = pattern1.test(email);
           if (email == "") {
               $('#error').html('required field');
                return false;
            } else if (!validemail) {
              $('#error').html('invalid email');
               return false;
            } else {
              $('#error').html('');
              return true;
           }
        }
        function checkmobile() {
          if (!$.isNumeric($("#mobile1").val())) {
               $("#mobile_err").html("only number is allowed");
                return false;
            } else if ($("#mobile1").val().length != 10) {
               $("#mobile_err").html("10 digit required");
               return false;
            }
            else {
               $("#mobile_err").html("");
               return true;
            }
        }
        function checkcity(){
          var city = $('#city1').val();
          if (city == "") {
             $('#city_err').html('required field');
              return false;
            }
            else {
                $('#city_err').html('');
                return true;
            }
        }
    </script>
    <div class="midd">
    <h1>Employee  Registration From!</h1>
    <div id="message"> </div>
    <form aciton ="" id="myform" name="myForm"  method="post">
        <div class="formdesign" id="name">
            Name: <input type="text" name="name1" id="name1" ><b><span id="formerror"> </span></b><br><br>
        </div>

        <div class="formdesign" id="email">
            Email: <input type="text" name="email1" id="email1" ><b><span id="error"> </span></b><br><br>
        </div>

        <div class="formdesign" id="phone">
            Phone: <input type="text" name="mobile1" id="mobile1"><b><span id="mobile_err"></span></b><br><br>
        </div>
            <div class="formdesign" id="pass">
               City:  <input list="country" name="city1" id="city1"><b><span id="city_err" ></span></b><br><br>
               <datalist id="country">
                  <option value="Noida" >
                  <option value="Delhi" >
                  <option value="Punjab" >
                  <option value="Lucknow" >
                  <option value="Ghaziabad" >
               </datalist>
           </div> 
         <button type="button" id="submitbtn" >Submit</button>
        </div>
        </div>
    </form>
    </div>
</body>
</html>