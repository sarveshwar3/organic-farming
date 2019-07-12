<?php $connection = mysqli_connect("localhost","root","","organic"); ?>

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
  <label> Product name </label>
  <input type="text" name="pname" class="form-control" placeholder="Enter product name">
  </div>
  <div class="form-group">
  <select class="form-control" name="pcategory">
  <?php 
    $query1 = "select * from category;";
    $result1 = mysqli_query($connection,$query1);
    while($rows = mysqli_fetch_assoc($result1)){
        $cid = $rows["id"];
        $category = $rows["name"];
  ?> 
      <option><?php echo $category; ?></option>
    <?php } ?>   <!-- closing while loop -->
    </select>
    </div>
  <div class="form-group">
  <label> Product desc </label>
  <input type="text" name="pdesc" class="form-control" placeholder="Enter product name">
  </div>
  <div class="form-group">
  <label> Product Price </label>
  <input type="text" name="pprice" class="form-control" placeholder="Enter product name">
  </div>
  <div class="form-group">
  <label> Product stock </label>
  <input type="text" name="pstock" class="form-control" placeholder="Enter product name">
  </div>
  <center>
  <button type="submit" name="product_submit" class="btn btn-primary">Submit</button>
  </center>
</form>
</div>
</body>

</html>
<?php 
if(isset($_POST["product_submit"])){
    $pname = $_POST["pname"];
    $pdesc = $_POST["pdesc"];
    $pprice = $_POST["pprice"];
    $pstock = $_POST["pstock"];
    $cname = $_POST["pcategory"];
    echo $cname;
    $query2 = "select * from category where name='$cname'";
    $result2 = mysqli_query($connection,$query2);
    while($rows = mysqli_fetch_assoc($result2)){
        $cid = $rows["id"];
    }
    $query = "INSERT INTO `product`(`pname`,`pdesc`, `pprice`, `stock`,`cid`, `cname`) VALUES ('$pname','$pdesc','$pprice','$pstock',$cid,'$cname')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "Product added successfully";
    }
}

?>
