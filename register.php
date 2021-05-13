<!DOCTYPE html>
<html>
<?php
  session_start();
  if(isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <style>
    body{
        background-image: url(images/library.gif);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

    <script type="text/javascript">
    function CheckPassword() 
    { 
      var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
      if(document.getElementById('pwd').value.match(decimal)) 
      { 
        document.getElementById('usermessage').style.color = 'green';
        document.getElementById('usermessage').innerHTML = 'Valid Password';
        //return true;
        //document.getElementById("submit").removeAttribute("disabled");
      }
      else
      { 
        document.getElementById('usermessage').style.color = 'red';
        document.getElementById('usermessage').innerHTML = 'Should contain minimum 8 characters with at least a numeric, uppercase ,lowercase and special character';
        //return false;
        //document.getElementById("submit").setAttribute("disabled", "disabled");
      }
      if (document.getElementById('pwd').value ==
      document.getElementById('cnfmpwd').value) 
      {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        //return true;
        //document.getElementById("submit").removeAttribute("disabled");
  
      } 
      else 
      {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        //return false;
        //document.getElementById("submit").setAttribute("disabled", "disabled");
      }
      if(document.getElementById('pwd').value.match(decimal) && document.getElementById('pwd').value ==
      document.getElementById('cnfmpwd').value)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    function check() 
    {
      if (document.getElementById('pwd').value ==
      document.getElementById('cnfmpwd').value) 
      {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        return true;
        //document.getElementById("submit").removeAttribute("disabled");
      } 
      else 
      {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        return false;
        //document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }
    function userCheck()
    {
      var regex = /^[A-Za-z0-9_@.|-]*$/;
      if (document.getElementById('name').value.match(regex)) 
      {
        document.getElementById('usermessage').style.color = 'green';
        document.getElementById('usermessage').innerHTML = 'Valid Username';
        return true;
        //document.getElementById("submit").removeAttribute("disabled");
      } 
      else 
      {
        document.getElementById('usermessage').style.color = 'red';
        document.getElementById('usermessage').innerHTML = 'Only special characters   _ @ . | -  are allowed';
        return false;
        //document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }
    function disfunc()
    {
      if(CheckPassword() && check() && userCheck()){
        document.getElementById("submit").removeAttribute("disabled");
      }
      else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }
  </script>

</head>
<body>

<?php include("includes/main_header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" enctype = "multipart/form-data" method = "post" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <?php
      if(isset($_POST['submit']))
      {

        $sql1="SELECT * from customer where customer.cus_mail='{$_POST['email']}';";
        $res1=$db->query($sql1);

        if($res1->num_rows==0)
        {
          $target_img = "admin/media/profile_img/";
          $target_img_dir = $target_img.basename($_FILES["profile"]["name"]);
          
          if (move_uploaded_file($_FILES["profile"]["tmp_name"],$target_img_dir)) 
          {
            $sql="INSERT INTO CUSTOMER (cus_name, cus_image, cus_mail, cus_pass) VALUES ('{$_POST['name']}', '{$target_img_dir}', '{$_POST['email']}', '{$_POST['pwd']}');";
             $res = $db->query($sql);
             echo "<p style='color:green'>Registration Successful</p>";
  
             //header("location:login.php");
          }
          else 
          {
            echo "<p style='color:red'>Registration failed</p>";
          }
        }
        else
        {
          echo "<p style='color:red'>Email Id already exists !</p>";
        }
      }
    ?>

    <i><div id="usermessage"></div><i>
    <br>

    <label for="name"><b>User Name</b></label>
    <input type="text" placeholder="Name" name="name" id="name" onkeyup="userCheck()" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" id="pwd" onkeyup="CheckPassword()" required>

    <label for="cnfm-pwd"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cnfmpwd" id="cnfmpwd" onkeyup="check()" required>
    
    <i><div id="message"></div><i>
    <br><br>

    <label for="profile"><b>Profile pic</b></label>
    <input type="file" placeholder="profile" name="profile" accept="image/*" required>
    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup" name="submit" disabled="disabled" onclick="disfunc()" id="submit">Sign Up</button>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
