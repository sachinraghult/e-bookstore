<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
</head>
<body>

<?php include("includes/header.php");?>

<div class="formfield" style="float: right; padding-right: 80px;">
<button class="upload" onclick="location.replace('profile.php')">BACK</button>
<div id="expand">
</div></div>
<br><br>
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" enctype = "multipart/form-data" method = "post">
  <div id="wrapper">
    <div id="signup">
  <?php 
      if(isset($_POST["update"]))
      {
        $_POST['cus_name'] = addslashes($_POST['cus_name']);
        $_POST['cus_mail'] = addslashes($_POST['cus_mail']);

        $sql = "UPDATE customer 
        SET cus_name = '{$_POST["cus_name"]}', cus_mail = '{$_POST["cus_mail"]}'
        WHERE customer.cus_id = {$_SESSION['CUS_ID']}";
        $res = $db->query($sql);
        $_SESSION['CUS_NAME'] = $_POST["cus_name"];

        if($_POST['profile'] == 2)
        {
            $sql1 = "UPDATE customer
            SET cus_image = 'admin/media/profile_img/def99864.jpg'
            WHERE customer.cus_id = {$_SESSION['CUS_ID']}";
            $res1 = $db->query($sql1);
        }

        if($res)
          echo "<br><br><b><p style='color:green'>Corrected the Details</p></b>";

        $target_img = "admin/media/profile_img/";

        if($_FILES['cus_img']['size'] != 0 && $_FILES['cus_img']['error'] == 0)
        {
            $target_img_dir = $target_img.basename($_FILES["cus_img"]["name"]);

            $target_img_dir = str_replace(' ', '-', $target_img_dir);
            $target_img_dir = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir);

            $target_img_dir = addslashes($target_img_dir);

            $qry = "SELECT * from customer where cus_image = '{$target_img_dir}';";
            $result = $db->query($qry);
            if($result->num_rows>0)
            {
                $find = basename($target_img_dir);
                $ext = pathinfo(basename($target_img_dir), PATHINFO_EXTENSION);
                $replace =  str_replace('.', '', basename($target_img_dir, $ext)).rand(0000,9999).'.'.$ext;
                $target_img_dir = str_replace($find, $replace, $target_img_dir);
            }

            if(move_uploaded_file($_FILES["cus_img"]["tmp_name"],$target_img_dir))
            {
                $sql2 = "UPDATE customer 
                SET cus_image = '{$target_img_dir}'
                WHERE customer.cus_id = {$_SESSION['CUS_ID']}";
                $res2 = $db->query($sql2);
            }
            else
            {
                echo "<b><p style='color:red'>Unable to upload User profiel pic</p></b>";
            }
        }
     }

    if(isset($_SESSION['CUS_ID']))
    {
        $qry="SELECT * from customer where customer.cus_id = {$_SESSION['CUS_ID']};";
        $ans = $db->query($qry);
        $val = $ans->fetch_assoc();
    }
    ?>


    <h2>Edit Profile</h2>
    <hr><br>

    <i><div id="usermessage"></div></i>

    <div class="formfield"><br>
    <label for="name">User Name <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="text" name="cus_name" id="cus_name" value="<?php echo $val['cus_name']; ?>" onkeyup="userCheck(); disfunc();" required>

    <div class="formfield"><br>
    <label for="name">Email <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="email" name="cus_mail" value="<?php echo $val['cus_mail']; ?>" required>
    
    <div class="formfield"><br> 
    <label for="image">Change Profile Pic</label>&emsp;&emsp;
    <select name="profile" id="dropdown" style="margin-top:10px;" onclick="hidefunc()" required>
        <option value='1' >Update Profile</option>
        <option value='2' >Remove Profile</option>
    </select>
    <input type="file" id='profilepic' placeholder="image" name="cus_img" accept="image/*" style="margin-top:15px; display: inline"></div><br>

    <div class="formfield" style="float: left; padding-left: 80px;">
    <button type="submit" id="submit" class="upload" name="update">UPDATE</button>
    <div id="expand">
    </div></div>

    <div class="formfield" style="float: left; padding-left: 100px;">
    <button type="reset" class="upload">RESET</button>
    <div id="expand">
    </div></div>
    </div>
  </div>
</form>
</div>

<script>
    function hidefunc()
    {
        if(document.getElementById('dropdown').value == "1")
            document.getElementById('profilepic').style.display="inline";
        else
            document.getElementById('profilepic').style.display="none";
    }
    function userCheck()
    {
      var regex=  /^[A-Za-z0-9_@.|-]*$/;
      if (document.getElementById('cus_name').value.match(regex)) 
      {
        document.getElementById('usermessage').style.color = 'green';
        document.getElementById('usermessage').innerHTML = 'Valid Username';
      } 
      else 
      {
        document.getElementById('usermessage').style.color = 'red';
        document.getElementById('usermessage').innerHTML = 'Only special characters   _ @ . | -  are allowed';
      }
    }
    function disfunc()
    {
      if(document.getElementById('usermessage').style.color == 'green')
        {
        document.getElementById("submit").removeAttribute("disabled");
      }
      else{
        document.getElementById("submit").setAttribute("disabled", "disabled");
      }
    }
</script>

<style>
        #profile{
          background: #8ae600;
        }

        #profile:after{
          color: #8ae600;
        }
        * {
          margin: 0 auto;
          transition: 0.5s ease all;
        }
        *:focus {
          outline: none;
        }
        body {
          margin: 0 auto;
          background: #1d1f20;
          font-family: sans-serif;
          text-transform: uppercase;
          color: #F4F4F8;
        }
        #wrapper {
          width: 50%;
          background: #009FB7;
          padding: 0px 80px 40px;
          display: flex;
          margin-top: 15px;
          margin-bottom: 10%;
          z-index: 998;
          position: relative;
          overflow: hidden;
          margin-right: 30%;
          border-radius: 30px;
          /*box-shadow: 30px 25px 30px 0px #dddbe0;*/
        }
        #signup {
          width: 100%;
        }
        #line {
          width: 25px;
          height: 2px;
          background: white;
          margin-left: 15px;
        }
        h2 {
          padding: 25px 0px;
          width: 90%;
          font-weight: 100;
          font-size: 40px;
          letter-spacing: 3px;
          margin-left:7%;
        }
        #form {
          width: 90%;
          padding-top: 5%;
        }
        .formfield {
          position: relative;
        }
        button{
          padding: 5px 15px;
          background: none;
          border: none;
          /*border: solid 1px #F4F4F8;*/
          font-family: sans-serif;
          color: #F4F4F8;
          font-size: 20px;
          letter-spacing: 1.5px;
          font-weight: lighter;
          margin: 25px 0px;
          cursor: pointer;
          box-shadow: 0px 0px 0px 2px #F4F4F8;
        }
        button:hover, button:active, button:focus {
          /*border: solid 1px #fc4144;*/
          box-shadow: none;
          cursor: pointer;
          /*box-shadow: inset 90px 0px 0px 1px #fc4144;*/
        }
        input[type="text"], input[type="email"], textarea, option, select {
          padding: 3px;
          width: 100%;
          background: none;
          border: none;
          border-bottom: solid 1px #ff9b9d;
          margin-bottom: 10px;
          font-family: sans-serif;
          color: #F4F4F8;
          font-size: 14px;
          letter-spacing: 1.5px;
          font-weight: lighter;
        }
        input[type="password"] {
          letter-spacing: 4px;
        }
        input[type="text"]:hover, input[type="text"]:active, input[type="text"]:focus, input[type="text"]:valid, input[type="email"]:hover, input[type="email"]:active, input[type="email"]:focus, input[type="email"]:valid, textarea:hover, textarea:active, textarea:focus, textarea:valid {
          border-bottom: solid 20px #c61aff;
        }

        option:hover, option:active, option:focus, option:valid {
          border-bottom: solid 20px #c61aff;
        }

        option {
          background: #c61aff;
        }

        label {
          position: relative;
          left: 5px;
          top: 5px;
          font-size: 15px;
          letter-spacing: 1.5px;
          font-weight: bold;
        }
        input[type="text"]:hover + label, input[type="text"]:active + label, input[type="text"]:focus + label, input[type="text"]:valid + label, input[type="password"]:hover + label, input[type="password"]:active + label, input[type="password"]:focus + label, input[type="password"]:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        textarea:hover + label, textarea:active + label, textarea:focus + label, textarea:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        input[type="email"]:hover + label, input[type="email"]:active + label, input[type="email"]:focus + label, input[type="email"]:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        #expand {
          content: '';
          background: #c61aff;
          height: 0px;
          width: 0px;
          top: 35px;
          left: 35px;
          z-index: -10000;
          transition: 1s ease all;
          position: absolute;
          transform: translate(-50%, -50%);
          border-radius: 50%;
        }
        button:hover + #expand, button:active + #expand, button:focus + #expand {
          height: 700px;
          width: 700px;
        }
</style>
<script>
    var submit = document.querySelector("#submit");
    var expandBg = document.querySelector("#expand");

    submit.onclick = function() {
      expandBg.style.background = "#fcd25a";
}
  </script>
</body>
</html>