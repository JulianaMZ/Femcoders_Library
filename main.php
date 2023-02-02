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
    <div id="header">
        <i class="fa-solid fa-3x fa-book"></i>
        <h1>FemCoders Library</h1>
    </div>
    <div class="mobile-container">
        <input type="checkbox"/>
        <i class="fa fa-bars"></i>
        <i class="fa fa-times"></i>
        <div class="myLinks">
          <a href="./main.php">Home</a>
          <a href="./addbook.php">Add Books</a>
        </div>
    </div>
<div class="search-container">
  <form action="search.php" method="GET">
	  <input type="text" name="query" placeholder="Search by author or title..." class="search-input"/>
	  <button type="submit" value="Search" class="search-button" > <img class = "search-icon" src="./images/searchicon.svg" alt= "search"/></button>
  </form>
</div>


    <?php
include("connection.php");


//$sql = "SELECT author, title, isbn, description, img FROM books";
$sql = "SELECT isbn, author, title, img FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $itemDetail =  "Author: ".$row["author"]."Title: ".$row["title"]."</br>";
    echo $itemDetail;
//    echo "Author: " . $row["author"]. "Title: " . $row["title"]. "ISBN: " . $row["isbn"]. "Description: " . $row//["description"]. "Book cover: " . "<br>";
    echo '<a href="./bookdetails.php?isbn='.$row["isbn"].'"> <img class="img" src="data:image/jpeg;base64,'.base64_encode( $row["img"]) .'" /></a></br>';
  }
} else {
  echo "0 results";
}

mysqli_close($conn);


?>

<script src="https://kit.fontawesome.com/27198e3231.js" crossorigin="anonymous"></script>
</body>
</html>

