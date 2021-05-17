<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/book_pur_cards.css">
</head>
<body>

<?php
    if (isset($_SESSION["CUS_ID"])) 
    {
        $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
        inner join category on category.cat_id = book.cat_id
        ORDER by payments.bill_id DESC";


        $res2=$db->query($sql2);
        echo"<h3>Your Store : )</h3><br>";
        
        if($res2->num_rows>0)
        { 
            echo " 
            <div class='container1'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                $img = "admin/{$rows2['bimage']}";
                echo"
                <a href='cust_book_det.php?id={$rows2['bid']}'><div class='cardWrap'>
                  <div class='card'>
                    <div class='cardBg' style='background-image: url({$img});'></div>
                    <div class='cardInfo' style='width:100%'>
                      <h3 class='cardTitle'>
                        {$rows2['bname']}
                      </h3>
                      <p>
                        {$rows2['author']}
                        <br>
                        {$rows2['cat_name']}
                      </p>
                    </div>
                  </div>
                </div>
                </a>
            ";
            }
            echo "</div>";
        }
        else
        {
            echo "<p style='color: red'>Sorry, you did'nt purchase any book  :(</p>";
        }
    }
?>

    </div>

    <script>
        const wrapper = document.querySelectorAll(".cardWrap");

        wrapper.forEach(element => {
        let state = {
            mouseX: 0,
            mouseY: 0,
            height: element.clientHeight,
            width: element.clientWidth
        };

        element.addEventListener("mousemove", ele => {
            const card = element.querySelector(".card");
            const cardBg = card.querySelector(".cardBg");
            state.mouseX = ele.pageX - element.offsetLeft - state.width / 2;
            state.mouseY = ele.pageY - element.offsetTop - state.height / 2;

            // parallax angle in card
            const angleX = (state.mouseX / state.width) * 30;
            const angleY = (state.mouseY / state.height) * -30;
            card.style.transform = `rotateY(${angleX}deg) rotateX(${angleY}deg) `;

            // parallax position of background in card
            const posX = (state.mouseX / state.width) * -40;
            const posY = (state.mouseY / state.height) * -40;
            cardBg.style.transform = `translateX(${posX}px) translateY(${posY}px)`;
        });

        element.addEventListener("mouseout", () => {
            const card = element.querySelector(".card");
            const cardBg = card.querySelector(".cardBg");
            card.style.transform = `rotateY(0deg) rotateX(0deg) `;
            cardBg.style.transform = `translateX(0px) translateY(0px)`;
        });
        });

    </script>
    
    </body>
    </html>