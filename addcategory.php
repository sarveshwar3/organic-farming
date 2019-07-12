<?php 
   $connection = mysqli_connect("localhost","root","","organic");
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container jumbotron">
<form method="post">
   <div class="form-group">
   <label>Category</label>
   <input type="text" name="category" class="form-control" placeholder="Enter category">
   </div>
   <center>
   <div class="form-group">
   <input type="submit" name="category_submit" class="btn btn-success">
   </div>
   </center>
</form>
</div>
</body>
</html>
<?php 
if(isset($_POST['category_submit'])){
    $category = $_POST["category"];
    $query = "INSERT INTO `category`(`name`) VALUES ('$category');";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>alert('category added')</script>";
    }
    else{
        echo "Error in adding category";
    }
}
?>