<?php
  session_start();
  if(!isset($_SESSION["AID"])){
    header("location:admin/");
  }
  include("../db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>Upload books</title>
</head>
<body>

<?php include("header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" enctype = "multipart/form-data" method = "POST" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Upload books</h1>
    <hr>
    <?php
      if (isset($_POST["upload"])) {
        $target_img = "media/book_img/";
        $target_file = "media/book_file/";

        $target_img_dir = $target_img.basename($_FILES["bookimg"]["name"]);
        $target_file_dir = $target_file.basename($_FILES["bookfile"]["name"]);
        
        if (move_uploaded_file($_FILES["bookimg"]["tmp_name"],$target_img_dir) &&
        move_uploaded_file($_FILES["bookfile"]["tmp_name"],$target_file_dir)) 
        {
          $sql = "INSERT INTO book (bname, author, bimage, bfile, keywords, cat_id, price) 
           VALUES ({$_POST['name']},{$_POST['author']},{$target_img_dir},{$target_file_dir},{$_POST['keywords']},{$_POST['book_category']},{$_POST['price']});";
           $res = $db->query($sql);
           print_r($res);
           echo "<p style='color:green'>Upload successful</p>";
        }
        else {
          echo "<p style='color:red'>Upload unsuccessful</p>";
      }
    }
    ?>
    <label for="name"><b>Name of the book</b></label>
    <input type="text" placeholder="Enter the name of the book" name="name" required>
    
    <label for="author"><b>Author</b></label>
    <input type="text" placeholder="Enter author" name="author" required>

    <label for="keywords" style="margin :auto;"><b>Keywords&emsp;&emsp;&emsp;</b></label>
    <br>
    <div style="padding-top:7px">
    <textarea name="keywords" placeholder="Enter keywords" rows="3" cols="35" style="background-color : rgb(243, 243, 243);"></textarea>
    </div>
    <br>

    <label for="book_category"><b>Category&emsp;&emsp;&emsp;&nbsp;</b></label>
    <select name="book_category" style="background-color: rgb(235, 235, 235);" >
        <option>select category</option>
        <?php
          $sql = "SELECT * from category";
          $res = $db->query($sql);
          while ($rows = $res->fetch_assoc()) {
            echo "
            <option value={$rows['cat_id']}>{$rows['cat_name']}</option>
            ";
          }
        ?>
    </select>
    <br><br>

    <label for="book_img"><b>Book Image&emsp;&emsp;</b></label>
    <input type="file" placeholder="Image of book" name="bookimg" required>
    <br><br>

    <label for="book"><b>Book File&emsp;&emsp;&emsp;</b></label>
    <input type="file" placeholder="bookfile" name="bookfile" required>
    <br><br>
    <label for="price"><b>Price&emsp;&emsp;&emsp;&emsp;&emsp;</b></label>
    <input type="number" placeholder="Enter price" name="price" style="background-color: rgb(235, 235, 235)" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="upload" name="upload">Upload</button>
    </div>
  </div>
</form>

</body>
</html>