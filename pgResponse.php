<?php
include("db.php");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        
        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
        if (isset($_POST) && count($_POST)>0 ){

            $sql = "SELECT * from temp_payments WHERE txn_id='{$_POST["ORDERID"]}';";
            $res = $db->query($sql);
            $row = $res->fetch_assoc();

            $sql1 = "INSERT INTO payments (txn_id, cus_id, bid, logs) VALUES ('{$row['txn_id']}', {$row['cus_id']}, {$row['bid']}, '{$_POST['TXNDATE']}')";
            $res1 = $db->query($sql1);

            $sql2 = "DELETE FROM temp_payments WHERE txn_id='{$_POST["ORDERID"]}';";
            $res2 = $db->query($sql2);

            if($res1){
                echo "<br><h1 style='text-align:center; color:green;'>Transaction successful</h1>" . "<br/>";
            }else{
                echo "<br><h1 style='text-align:center; color:red;'>Transaction status failure</h1>" . "<br/>";
            }
        }
        
    }
    else {
        echo "<br><h1 style='text-align:center; color:red;'>Transaction status failure</h1>" . "<br/>";
    }

    if (isset($_POST) && count($_POST)>0 )
    {
        foreach($_POST as $paramName => $paramValue) {
                echo "<br/>" . $paramName . " = " . $paramValue;
        }
    }
    

}
else {
    echo "<b>Checksum mismatched.</b>";
    //Process transaction as suspicious.
}

?>