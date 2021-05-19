<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
?>

<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $ran = "OD".rand(10000,9999999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Gateway</title>
</head>
<body>

<?php
  if(isset($_GET['id'])){
    $sql="SELECT book.bname, book.price from book where book.bid={$_GET["id"]};";
    $res=$db->query($sql);
    $rows=$res->fetch_assoc();

    $sql1="INSERT INTO temp_payments (txn_id, cus_id, bid) values ('{$ran}', {$_SESSION['CUS_ID']}, {$_GET['id']});";
    $db->query($sql1);
  }
  else{
    $sql="SELECT book.bid, book.bname, book.price from book inner join cart where book.bid=cart.bid and cart.cus_id={$_SESSION["CUS_ID"]};";
    $res=$db->query($sql);
    $price = 0;
    $bnames = '';
    while($rows=$res->fetch_assoc()){
      $sql1="INSERT INTO temp_payments (txn_id, cus_id, bid) values ('{$ran}', {$_SESSION['CUS_ID']}, {$rows['bid']});";
      $db->query($sql1);
      $price += $rows['price'];
      $bnames = $bnames.$rows['bname'].', ';
    }
    $bnames = substr_replace($bnames, '', strlen($bnames)-2);
  }
?>

<form method="POST" action="pgRedirect.php?">
  <div id="form-main-container">
    <div id="form-area">
      <div id="form-title">
      <b>Payment Details<b>
      </div>
      <div id="form-body">
      <div>
      
      <div class="col-12"> 
      <fieldset class="form-group">
      <label class="form-label" for="ORDER_ID">Transaction ID</label>
      <input id="ORDER_ID"  class="form-control" name="ORDER_ID" value="<?php echo $ran ?>" type="text" readonly/>
      </fieldset></div>
      
      <div class="col-12"> 
      <fieldset class="form-group">
      <label class="form-label" for="CUST_NAME">Customer Name</label>
      <input type="text" id="CUST_ID" class="form-control" name="CUST_ID" value="<?php echo $_SESSION['CUS_NAME'];?>" readonly/>
      </fieldset></div>
      
      <div class="col-12"> 
      <fieldset class="form-group">
      <label class="form-label" for="TXN_AMOUNT">Transaction Amount</label>
      <input type="text" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" 
      value="<?php 
      if(isset($_GET['id']))
        echo $rows['price'];
      else
        echo $price;
      ?>" readonly/>
      </fieldset></div>
      
      <div class="col-12"> 
      <fieldset class="form-group">
      <label class="form-label" for="bname"><b>Book Name</b></label>
      <input type="text" class="form-control" name="bname" id="bname" 
      value="<?php 
      if(isset($_GET['id']))
        echo $rows['bname'];
      else{
        echo $bnames;
      }
      ;?>" readonly>
      </fieldset></div>
      
      <div style="display: none;">
      <label for="">INDUSTRY TYPE ID</label>
      <input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" type="text" value="Film" />

      <label for="">CHANNEL ID</label>
      <input id="CHANNEL_ID" name="CHANNEL_ID" type="text" value="WEB"/>
      </div>
      </div>
    

      <div class="center-text button-area">
      <button class="btn btn-cancel" type="submit"/>Pay</button>
      </div></div></div>
  </div>
</form>

<style>
  *,
*:after,
*:before {
  box-sizing: border-box;
}
.center-text{
  text-align:center;
}

body {
  background: #8120a1;
}

#form-main-container {
  display: block;
  position: relative;
  background-color: #fff;
  border-color: #d8e2e7;
  border: 1px solid #e5e5e5;
  border-radius: .25rem;
  margin-top: 2rem;
  margin-bottom: 2rem;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  padding: 1%;
}

#tabs {
  position: relative;
  width: 100%;
  margin: 0 auto;
  font-weight: 300;
  font-size: 1.5rem;
  text-align: center;
}

#tabs ul {
  position: relative;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flex;
  display: -webkit-box;
  display: flex;
  margin: 0 auto;
  padding: 0;
  max-width: 90%;
  list-style: none;
  -webkit-box-orient: horizontal;
  -webkit-flex-flow: row wrap;
  -ms-flex-flow: row wrap;
  flex-flow: row wrap;
  -webkit-justify-content: center;
  -moz-justify-content: center;
  -ms-justify-content: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}

#tabs ul li {
  position: relative;
  display: block;
  width: 100%;
  margin: 0.5%;
  padding: 1%;
  text-align: center;
  flex: 1;
  z-index: 1;
  border-radius: 2%;
}

#tabs ul li a {
  position: relative;
  display: block;
  color: #343434;
  overflow: visible;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  transition: border 0.5s;
  white-space: nowrap;
  line-height: 2.5;
  text-decoration: none;
  outline: none;
}

#tabs ul li a:hover {
  border-bottom: 1px solid rgba(0, 0, 0, 1);
  transition: border 0.5s;
}

#tabs ul li.active-tab a:before {
  position: absolute;
  top: 100%;
  left: 50%;
  width: 0;
  height: 0;
  border: solid transparent;
  content: '';
  pointer-events: none;
  border-width: 1rem;
  border-top-color: rgba(0, 0, 0, 0.2);
  margin-left: -1rem;
  transition: border 0.5s;
}

#tabs ul li.active-tab a:hover:before {
  border-top-color: rgba(0, 0, 0, 0.5);
  transition: border 0.5s;
}

#tabs ul li.active-tab a:after {
  position: absolute;
  top: 100%;
  left: 50%;
  width: 0;
  height: 0;
  border: solid transparent;
  content: '';
  pointer-events: none;
  border-width: 0.9rem;
  border-top-color: #fff;
  margin-left: -0.9rem;
}

#form-area {
  position: relative;
  overflow: hidden;
  width: 100%;
  font-weight: 300;
  font-size: 1.2rem;
  margin: 1rem;
  margin-top: 2rem;
}

#form-title {
  border-bottom: solid 1px #d8e2e7;
  padding-bottom: .8rem;
  width: 97%;
  font-weight:bold;
  color:#8120a1;
}

#form-body {
  margin-top: 2rem;
}

.col-3 {
  float: left;
  width: 30%;
  margin: 1%;
  padding: 1%;
}

.col-6 {
  display: inline-block;
  width: 62.5%;
  margin: 1%;
  padding: 1%;
}

.col-12 {
  display: inline-block;
  width: 95%;
  margin: 1%;
  padding: 1%;
}

.col-2 {
  display: inline-block;
  width: 17%;
  margin: 1%;
  padding: 1%;
}

.row {
  display: block;
  margin: 2%;
  margin-top: 0;
  padding: 2%;
  padding-top: 0;
}

.left-align {
  float: left;
}

.right-align {
  float: right;
}

.button-area {
  margin-top: 1%;
  margin-right: 5%;
  margin-left: 1%;
  padding: 2%;
}

.button-save-area {
  margin-top: 1%;
  margin-left: 10%;
  padding: 2%;
}

.form-group {
  margin-bottom: 0.2rem;
}

fieldset {
  border: 0;
  padding: 0;
}

.form-label {
  display: block;
  margin-bottom: 6px;
  font-size: 1rem;
}

label {
  margin: 0;
  display: block;
}

.form-control {
  box-shadow: none;
  font-size: 1rem;
  color: #343434!important;
  width: 100%;
  padding: .375rem .75rem;
  line-height: 1.5;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  -webkit-border-radius: .25rem;
  border-radius: .25rem;
}

textarea {
  resize: none;
  border: 0.1rem solid #ccc;
  border-radius: 0.25rem;
  width: 100%;
}

.btn {
  -webkit-border-radius: 3px;
  border-radius: 3px;
  border: 1px solid #00a8ff;
  background: #00a8ff;
  color: #fff;
  font-weight: 600;
  display: inline-block;
  padding: .375rem 1rem;
  font-size: 1rem;
  line-height: 1.5;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  user-select: none;
}

.btn-cancel {
  background-color: #8120A1;
  border-color: #8120A1;
}

.btn-send {
  background-color: #6b7a85;
  border-color: #6b7a85;
}

.btn-save {
  background-color: #6b7a85;
  border-color: #6b7a85;
}
label{
  color:#777;
  font-weight:600;
  text-transform:camel;
}
.form-control{
  color:#777 !important;
}
</style>


</body>
</html>