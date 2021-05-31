<html>
    <title>Login</title>
<body>
    
<?php
    
    session_start();
    
    $host="localhost";
    $user="root";
    $password="";
    $db="login";
    //Connect to server and select database
    $con = mysqli_connect($host,$user,$password,$db);
  
if (isset($_POST['uname'])) {
    
    $username = $_POST['uname'];
    $password= $_POST['psw'];
    $sql = "select * from loginform where username='".$username."'AND password='".$password."' limit 1"; 
    
    $result = mysqli_query($con, $sql); 
    
    if(mysqli_num_rows($result)){
        
        header("LOCATION: ./admin.php");
        exit();
        
    } else {
        echo "FAIL";
    }
    
    
}
          
?>
        
    <form name="input" action="blog.php" method="get">
        
        <input type="submit" value="Back">
        
    </form>  
        
    </body>
</html>