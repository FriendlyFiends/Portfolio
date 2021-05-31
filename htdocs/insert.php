<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "search_bar_tutorial";
    
    // get values form input text and number

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "INSERT INTO `products`(`title`, `description`) VALUES ('$title', '$desc')";
    
    $result = mysqli_query($connect, $query);
    
    // check if mysql query successful

    if($result)
    {
        echo '<center>Data Inserted</center>';
    }
    
    else{
        echo '<center>Data Not Inserted</center>';
    }

    mysqli_close($connect);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP INSERT DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <center>
            <div class="desc">Upload an Article</div>
        <form action="admin.php" method="post">

            <input type="text" name="title" required placeholder="Title"><br><br>
            <input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>

            <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="desc" 
      	placeholder="Say something about this article..."></textarea>
  	</div>


            <input type="submit" name="insert" value="Add Article To Database">

        </form>
        </center>
    </body>

</html>