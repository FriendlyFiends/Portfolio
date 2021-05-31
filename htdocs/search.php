<html>
<link rel="stylesheet" href="./css/stylesheet.css">

<?php
    $q = $_GET['q'];
    if(($_GET['q']=='')) {
        
        header('Location: blog.php?q=Search...');
        
    }
    if (($_GET['q'])!== '') {  
        
    $con = mysqli_connect('localhost','root', '','search_bar_tutorial');
        
?>
   <script type="text/javascript">
       
function active() {
    var sb = document.getElementById('searchBox');
        if(sb.value == 'Search...') {
            sb.value = ""
            sb.placeholder = 'Search...'
    }
}
       
function inactive() {
    var sb = document.getElementById('searchBox');
        if(sb.value == 'Search...') {
            sb.value = ""
            sb.placeholder = 'Search...'
}
       }
</script>
<head>
    
    <form action="blog.php" method="GET"> 
        
        <input type="text" placeholder="search..." name="q">
        <button type="submit">submit</button>
        
    </form>
    
</head>
    
<body>
    
<?php
if(!isset($q)) {
    
    echo '';
    
    } else {
    
        $query = mysqli_query($con, "SELECT * FROM products WHERE title LIKE '%$q%' OR description LIKE '%$q%'");
        $num_rows = mysqli_num_rows($query);
    
?>
    <p><strong><?php echo $num_rows; ?></strong> results for '<?php echo $q; ?>'</p>
    
<?php
    while($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $desc = $row['description'];
        echo '<h3><a class="link" href="./links/' . $id . '.php">' . $title . '</a></h3> ' . $desc . '<br />';
    }
}
?>
</body>
</html>
<?php 
    }
 ?>