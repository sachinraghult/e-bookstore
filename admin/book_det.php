<?php
  session_start();
  include("../db.php");
  if(!isset($_SESSION["AID"])){
    header("location:../admin_login.php");
  }
  $i=0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book</title>
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
</head>
<body>

<?php

    $sql = "SELECT book.*,category.cat_name from book inner join category on book.cat_id = category.cat_id where book.bid = {$_GET['id']};";
    $sql1 = "SELECT comment.comment, comment.logs, customer.cus_name from comment inner join customer where comment.cus_id = customer.cus_id and comment.bid = {$_GET['id']}
    ORDER BY comment.com_id DESC;";
    $res = $db->query($sql);
    $res1 = $db->query($sql1);
    $res2 = $db->query($sql1);
    $rows = $res->fetch_assoc();

    while($rows2 = $res2->fetch_assoc()){
        $i++;
    }

    echo '<div class="background"></div>';
    include("header.php");
    echo '<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.3">
    </head>';

    if($res->num_rows>0)
    {
    $file = $rows['bfile'];
    $file = preg_replace('/\s+/', '%20', $file);
    echo"
    <div>
        <a href={$file} target='_blank' style='text-decoration:none;'>
        <div id='curve' class='card' style='float:left; margin: 10%'>
            <div class='footer'>
                <div class='connections'>
                    <div class='connection facebook'><div class='icon'>View</div></div>
                </div>
                <svg id='curve'>
                    <path id='p' d='M0,200 Q80,100 400,200 V150 H0 V50' transform='translate(0 300)' />
                    <rect id='dummyRect' x='0' y='0' height='450' width='400'
                fill='transparent' />
                    
                    <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,100 400,50 V150 H0 V50' fill='freeze' begin='dummyRect.mouseover' end='dummyRect.mouseout' dur='0.1s' id='bounce1' />
                    
                    <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,0 400,50 V150 H0 V50' fill='freeze' begin='bounce1.end' end='dummyRect.mouseout' dur='0.15s' id='bounce2' />
                    
                    <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,80 400,50 V150 H0 V50' fill='freeze' begin='bounce2.end' end='dummyRect.mouseout' dur='0.15s' id='bounce3' />
                    
                    <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,45 400,50 V150 H0 V50' fill='freeze' begin='bounce3.end' end='dummyRect.mouseout' dur='0.1s' id='bounce4' />
                    
                    <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,50 400,50 V150 H0 V50' fill='freeze' begin='bounce4.end' end='dummyRect.mouseout' dur='0.05s' id='bounce5' />
        
                    <animate xlink:href='#p' attributeName='d' to='M0,200 Q80,100 400,200 V150 H0 V50' fill='freeze' begin='dummyRect.mouseout' dur='0.15s' id='bounceOut' />
                </svg>
                <div class='info'>
                    <div class='name' style='color:black'>{$rows['bname']}</div>
                    <div class='job' style='color:black'>{$rows['author']}</div>
                </div>
                </div>
                    <div class='card-blur'></div>
                </div>
        </div> 
        </a>


        <div style='float:right;  margin-left: 20%; margin-top: 5%; position: absolute;'>
        <table class='container' style='background-color:#1F2739; width: 60%'>
        <thead>
        <tr>
            <th style='color: #FB667A'>BOOK NAME</th>
            <td><b>{$rows['bname']}</b></td>
        </tr>
        <tr>
        <th style='color: #FB667A'>AUTHOR</th>
            <td><b>{$rows['author']}</b></td>
        </tr>
        <tr>
        <th style='color: #FB667A'>DESCRIPTION&ensp;&ensp;&ensp;</th>
            <td><b>{$rows['keywords']}</b></td>
        </tr>
        <tr>
        <th style='color: #FB667A'>PRICE</th>
            <td><b>&#8377; {$rows['price']}</b></td>
        </tr>
        <tr>
        <th style='color: #FB667A'>CATEGORY</th>
            <td><b>{$rows['cat_name']}</b></td>
        </tr>
        </thead>
        <tbody></tbody>
        </table>
        </div>
        </div>
        ";
    }
    else {
        echo "<p style='color: red'>No Records found</p>";
    }
    
    echo "<h1 style='position: absolute; margin-top: 650px; margin-left: 25%;'>Customer Comments</h1> <br><br>";
    
    if ($res1->num_rows > 0) {
        echo "<div style='position: absolute; margin-top: 680px; margin-left: 10%; width: 60%'>
        <table class='container' style='background-color:#1F2739;'>
        <thead>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>COMMENT</th>
            <th>TIME LOG</th>
        </tr>
        </thead>
        <tbody>
        ";
        while($rows1 = $res1->fetch_assoc()){
            echo"
                <tr>
                    <td><b>{$rows1['cus_name']}</b></td>
                    <td>{$rows1['comment']}</td>
                    <td><i>{$rows1['logs']}</i></td>
                </tr>";
        }
        echo "  
            </tbody>
            </table>
            </div>
            ";
    }
    else {
        echo "<div style='margin: 680px; margin-left:600px; margin-right:0px; position:absolute; float:right'>
         <p style='color: red; text-align:center; font-size:30px'><span style=' background-color:white;'>No Comments</span></p>
         </div>";
    }

?>


<style>
html,
body {
    height: 100%;
    width: 100%;
}

.background {
    position: absolute;
    top: -40px;
    left: -40px;
    height: <?php echo 170+($i*7.5)?>%;
    width: 103%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    -webkit-filter: blur(30px);
    filter: blur(30px);
}

.card {
    position: absolute;
    border-radius: 8px;
    height: 500px;
    width: 400px;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    box-shadow: 0 0 80px -10px black;
    overflow: hidden;
}

.card-blur {
    position: absolute;
    height: 100%;
    width: calc(100% + 1px);
    background-color: black;
    opacity: 0;
    transition: opacity 0.15s ease-in;
}

.card:hover .card-blur {
    opacity: 0.6;
}

.footer {
    z-index: 1;
    position: absolute;
    height: 80px;
    width: 100%;
    bottom: 0;
}

svg#curve {
    position: absolute;
    fill: white;
    left: 0;
    bottom: 0;
    width: 400px;
    height: 450px;
}

.connections {
    height: 80px;
    width: 400px;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 100px;
    margin: auto;
}

.connection {
    height: 25px;
    width: 25px;
    border-radius: 100%;
    background-color: white;
    display: inline-block;
    padding: 5px;
    margin-right: 25px;
    transform: translateY(200px);
    transition: transform 1s cubic-bezier(.46, 1.48, .18, .81);
}

.card:hover .connection {
    transform: translateY(0px);
}

.info {
	font-family: Inconsolata;
    padding-left: 20px;
    transform: translateY(250px);
    
    transition: transform 1s cubic-bezier(.31,1.21,.64,1.02);
}

.card:hover .info {
    transform: translateY(0px);
}

.name {
    font-weight: bolder;
    padding-top: 5px;
}

.job {
    margin-top: 10px;
}

.connection.facebook {
    height: 40px;
    width: 70px;
    margin-left: 20px;
    padding: 5px 13px;
    border-radius: 10%;
    overflow: hidden;
    background-color: #ff1a75;
}

.connection.facebook .icon {
    height: 100%;
    width: 100%;
    background-position: center;
    background-size: cover;
    color: black;
    font-size: 20px;
    font-weight: bold;
}

.card {
    background-image: url("<?php echo $rows['bimage']?>");
}

.background {
    background-image: url("<?php echo $rows['bimage']?>");
}
</style>

<style>
  #books{
    background: #8ae600;
  }

  #books:after{
    color: #8ae600;
  }
</style>

</body>
</html>