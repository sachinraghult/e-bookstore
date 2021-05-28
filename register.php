<!DOCTYPE html>
<html>
<?php
  ob_start();
  session_start();
  if(isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
  include("includes/main_header.php");
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">

    <style>
    body{
      background-image: url("images/register.gif");
      background-size: cover;
    }
    </style>

    <script type="text/javascript">
    function CheckPassword() 
    { 
      var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
      if(document.getElementById('pwd').value.match(decimal)) 
      { 
        document.getElementById('pwdmessage').style.color = 'lime';
        document.getElementById('pwdmessage').innerHTML = 'Valid Password';
      }
      else
      { 
        document.getElementById('pwdmessage').style.color = 'tomato';
        document.getElementById('pwdmessage').innerHTML = 'Should contain minimum 6 characters with at least a numeric, uppercase ,lowercase and special character';
      }
    }

    function check() 
    {
      if (document.getElementById('pwd').value ==
      document.getElementById('cnfmpwd').value) 
      {
        document.getElementById('message').style.color = 'lime';
        document.getElementById('message').innerHTML = 'matching';
      } 
      else 
      {
        document.getElementById('message').style.color = 'tomato';
        document.getElementById('message').innerHTML = 'not matching';
      }
    }
    function userCheck()
    {
      var regex=  /^[A-Za-z0-9_@.|-]*$/;
      if (document.getElementById('name').value.match(regex)) 
      {
        document.getElementById('usermessage').style.color = 'lime';
        document.getElementById('usermessage').innerHTML = 'Valid Username';
      } 
      else 
      {
        document.getElementById('usermessage').style.color = 'tomato';
        document.getElementById('usermessage').innerHTML = 'Only special characters   _ @ . | -  are allowed';
      }
    }
    function disfunc()
    {
      if(document.getElementById('usermessage').style.color == 'lime' &&
        document.getElementById('message').style.color == 'lime' &&
        document.getElementById('pwdmessage').style.color == 'lime')
        {
        document.getElementById("submit").removeAttribute("disabled");
      }
      else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }
  </script>
 
</head>
<body>
 
<?php ?>

<div class="login-box" style="margin-left: auto; margin-top: 100px">
<h2>Create Account</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" enctype = "multipart/form-data" method = "post">
    <p style="color: white">Please fill in this form to create an account.</p>
    <hr>
 
    <?php
      if(isset($_POST['submit']))
      {
        $_POST['email'] = addslashes($_POST['email']);
        $_POST['name'] = addslashes($_POST['name']);
        $_POST['pwd'] = addslashes($_POST['pwd']);

        $sql1="SELECT * from customer where customer.cus_mail='{$_POST['email']}';";
        $res1=$db->query($sql1);
 
        if($res1->num_rows==0)
        {
          $target_img = "admin/media/profile_img/";
          $target_img_dir = $target_img.basename($_FILES["profile"]["name"]);

          $target_img_dir = str_replace(' ', '-', $target_img_dir);
          $target_img_dir = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir);

          $target_img_dir = addslashes($target_img_dir);

          $qry = "SELECT * from customer where cus_image = '{$target_img_dir}'";
          $result = $db->query($qry);
          if($result->num_rows>0){
            $find = basename($target_img_dir);
            $ext = pathinfo(basename($target_img_dir), PATHINFO_EXTENSION);
            $replace =  str_replace('.', '', basename($target_img_dir, $ext)).rand(0000,9999).'.'.$ext;
            $target_img_dir = str_replace($find, $replace, $target_img_dir);
          }
          
          if (move_uploaded_file($_FILES["profile"]["tmp_name"],$target_img_dir)) 
          {
            $sql="INSERT INTO customer (cus_name, cus_image, cus_mail, cus_pass) VALUES ('{$_POST['name']}', '{$target_img_dir}', '{$_POST['email']}', '{$_POST['pwd']}');";
             $res = $db->query($sql);
             echo "<p style='color:lime'>Registration Successful</p>";
  
             header("location:login.php");
          }
          else 
          {
            $sql="INSERT INTO customer (cus_name, cus_image, cus_mail, cus_pass) VALUES ('{$_POST['name']}', 'admin/media/profile_img/def99864.jpg', '{$_POST['email']}', '{$_POST['pwd']}');";
             $res = $db->query($sql);
             echo "<p style='color:lime'>Registration Successful</p>";
  
             header("location:login.php");
          }
        }
        else
        {
          echo "<p style='color:tomato'>Email Id already exists !</p>";
        }
      }
    ?>
 
    <i><div id="usermessage"></div></i>
    <br>

    <div class="user-box">
      <input type="text" id="name" name="name" onkeyup="userCheck(); disfunc()" required>
      <label>Username</label>
    </div>

    <div class="user-box">
      <input type="email" name="email" required>
      <label>Email</label>
    </div>

    <div class="user-box">
      <input type="password" name="pwd" id="pwd" onkeyup="CheckPassword(); check(); disfunc()" required>
      <label>Password</label>
      <i><div id="message" style="float: right;"></div><i>
    </div>

    <div class="user-box">
      <input type="password" name="cnfmpwd" id="cnfmpwd" onkeyup="check(); disfunc()" required>
      <label style="float: left;">Confirm Password</label>
    </div>
    

    <i><div id="pwdmessage"></div><i>
    <br>
  
    <div class="user-box">
      <input type="file" name="profile" accept="image/*">
      <label>Profiel Pic</label>
    </div>

    <a>
    <button type="submit" style="color: white; font-size: 100%; font-family: inherit; border: none; padding: 0!important; background: none!important; 
    cursor: pointer;" class="signup" name="submit" onclick="" id="submit">
      Register
    </button>
    </a>
    <br><br>
    <i>
    <div style="color: whitesmoke;">
      Existing User? &ensp;<span onclick="location.replace('login.php')" 
      style="color:yellowgreen; text-decoration:underline; cursor:pointer">Login Here..</span>
    </div>
    </i>
</form>

<style>
  #register{
    background: #8ae600;
  }

  #register:after{
    color: #8ae600;
  }
</style>

<?php ob_end_flush();?>
 
</body>
</html>