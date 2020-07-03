<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>Control Panel</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
/* style of text headligs */
  h1{
  /* style text color and size */
    color:rgba(255, 0, 0, 0.7);
   text-align: center;
   font-size: 35px;
      /*style of background and border  */
  margin: auto;
  background-color:white;
  padding: 50px;
  height: 100px;
  border-style: solid;
 border-color: rgba(255, 0, 0, 0.7);
}
/* style of text headligs */
  h2{
    /* style text color and size */
  color:rgba(255, 0, 0, 0.7);
  margin: auto;
  text-align: center;
  font-size: 25px;
}

  /* style of button  */
  button{
    /* style text color and size */
    color: white;
    text-align: center;
    text-decoration: none;
    font-size:15px;
    cursor: pointer; /*icon */
      /*style of background and border  */
    background-color: #B0E0E6;
    border: 1px solid black;
    padding: 20px 34px;
    border-radius: 12px;


  }
    /* style of mid page content button */
.mid{
  float: left;
  height: 500px;
  width: 100%;
  background-color:#F8F8FF;
 }
/* I need two different types of buttons to create
it horizontally and vertically, so I only add the different feature.*/
button.btn-group-vertically{
display:inline-block; /*vertically*/
margin-left:10px;
  }
  button.btn-group-horizontally{
 display:block; /*horizontally*/
margin-left:490px;
    }

</style>

<?php
// use method " viwe the new page .php"
    function newpage($newpage) {
$host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

  header("Location: http://$host$uri/$newpage");
  exit;
}
// use method " conect whith Data Base"
        function conectDB($type) {
// info of my DB
          $servername = "localhost:3306";
          $username = "root";
          $password = "sh123321";
// start conect
          $conn = new mysqli($servername, $username, $password);

          if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
          }
          // name database and info taple need cheng
          $sql = "INSERT INTO robot.control_robot (type_button)
          VALUES ('$type')";

          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();

  }


          if(array_key_exists('Forwards', $_POST)) {
              conectDB("Forwards");
              newpage('Forwards.php');
          }
          else if(array_key_exists('Left', $_POST)) {
              conectDB("Left");        newpage('Left.php');
          }
            else if(array_key_exists('Stop', $_POST)) {
                      conectDB("Stop");
                  }
                  else if(array_key_exists('Right', $_POST)) {
                      conectDB("Right");    newpage('Right.php');
                  }                  else if(array_key_exists('Backwards', $_POST)) {
                                        conectDB("Backwards");    newpage('Backwards.php');
                                    }
    ?>

</head>
<body>
<h1>Control Panel
<img src="r.png" style="width:150px ;float:right ; height: 150px"></h1>
<div class="mid">
  </br></br></br></br></br></br>
  <form method="post">
<button name="Forwards" class="btn-group-horizontally">Forwards<i class='far fa-arrow-alt-circle-up'></i></button>
<button  name="Left" class="btn-group-vertically" style="margin-left:380px" >Left<i class='far fa-arrow-alt-circle-left'></i></button>
<button name="Stop"class="btn-group-vertically">Stop<i class='far fa-stop-circle'></i></button>
<button name="Right"class="btn-group-vertically">Right<i class='far fa-arrow-alt-circle-right'></i></button>
<button name="Backwards"class="btn-group-horizontally">Backwards<i class='far fa-arrow-alt-circle-down'></i></button>
	</form>

</div>
<h2>Thank you </h2>
</body>

</html>
