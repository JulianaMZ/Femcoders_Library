<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FemCoders Library</title>
</head>
<body>
    <div class="logo">
        <i class="fa-solid fa-3x fa-book"></i>
        <h1>FemCoders Library</h1>
    </div>
    <div class="mobile-container">
        <input type="checkbox">
        <i class="fa fa-bars"></i>
        <i class="fa fa-times"></i>
        <div class="myLinks">
          <a href="./main.php">Home</a>
          <a href="./addbook.php">Add Books</a>
        </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            </a>
        </div>
    </div>

<?php
 include("connection.php");

$getIsbn = $_GET['isbn'];
$sql = "SELECT isbn, author, title, description, img FROM books where isbn=?";

$stmt= $conn->prepare($sql);
$stmt->bind_param("s", $getIsbn);

if($stmt->execute()){
    $result = $stmt->get_result();
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    } 

    //echo "No of records : ".$result->num_rows."<br>";
    $row=$result->fetch_object();

    echo "Author: " . $row->author. "Title: " . $row->title. "ISBN: " . $row->isbn. "Description: " . $row->description. "Book cover: " . "<br>";
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row->img) .'" />';
    
}
else{
    echo $connection->error;
}



/* $user = $stmt->get_result()->fetch_assoc();
//$row = mysql_fetch_row($result);
echo "<pre>";
print_r($user);
echo "</pre>"; */
/* echo $row[0];
echo "Author: " . $row["author"]. "Title: " . $row["title"]. "ISBN: " . $row["isbn"]. "Description: " . $row["description"]. "Book cover: " . "<br>";
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["img"]) .'" />';
 */
mysqli_close($conn);
?>

    <a href="addbook.php?isbn=<?php echo $row->isbn ?> ">
        <img class = "icon" src="./images/pen-to-square-solid.svg" alt= "edit"/>
    </a>

    <a href="delete.php?isbn=<?php echo $row->isbn ?> ">
    <img class = "icon" src="./images/trash-can-solid.svg" alt= "delete"/></a>
    <script src="https://kit.fontawesome.com/27198e3231.js" crossorigin="anonymous"></script>
</body>
</html>