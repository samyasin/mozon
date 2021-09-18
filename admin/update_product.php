<?php
include('includes/connection.php');
if(isset($_POST['update']))
{
	//data Get from Form

	$pro_name = $_POST['pro_name'];
	$pro_desc = $_POST['pro_desc'];
	$pro_price = $_POST['pro_price'];
	$cat_id = $_POST['selectcat'];

	  $pro_image=$_FILES['pro_image']['name'];
    $tmp_name=$_FILES['pro_image']['tmp_name'];
    $path='proimages/';
   move_uploaded_file($tmp_name, $path.$pro_image);
	

	
	$query="update  product  set pro_name ='$pro_name' , pro_desc='$pro_desc' , pro_price='$pro_price' , cat_id='$cat_id' , pro_image='$pro_image' where pro_id ={$_GET['id']} ";
	
	mysqli_query($conn , $query);

	header("location:manage_product.php");

	/*Do not execute below code*/
}

include('includes/admin_header.php');


$query="select * from product where pro_id={$_GET['id']}";
$result = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($result);


//$query="select * from category where cat_id={$_GET['id']}";
$query2="select * from category INNER JOIN product ON category.cat_id=product.cat_id and pro_id={$_GET['id']}";
$result2 = mysqli_query($conn , $query2);
$row2 = mysqli_fetch_assoc($result2);





?>


<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Manage Products</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Update Product</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="selectcat" class=" form-control-label">Select Category </label>
									</div>
									<div class="col-12 col-md-12">
										<select name="selectcat" id="selectcat" class="form-control-lg form-control">
											<?php
										
											$query="select cat_id , cat_name from category";
											$categories = mysqli_query($conn, $query);

											while($data = mysqli_fetch_array($categories))
											{
            echo "<option value='". $data['cat_id'] ."'>" .$data['cat_name'] ."</option>";  // displaying data in option menu
          }	
          ?>  
        </select>
      </div>
    </div>

    <div class="form-group">
    	<label for="cc-cat_id" class="control-label mb-1">Category</label>
    	<input id="cc-cat_id" name="curretcat"  type="text" class="form-control" value="<?php echo $row2['cat_name'];?>" >
    </div>

    <div class="form-group">
    	<label for="cc-product" class="control-label mb-1">Product Name</label>
    	<input id="cc-product" name="pro_name" type="text" class="form-control" value="<?php echo $row['pro_name'];?>" >
    </div>

    <div class="form-group">
    	<label for="cc-desc" class="control-label mb-1">Product Descrption</label>
    	<input id="cc-desc" name="pro_desc" type="text" class="form-control"  value="<?php echo $row['pro_desc'];?> ">
    </div>

    <div class="form-group">
    	<label for="cc-price" class="control-label mb-1">Product Price</label>
    	<input id="cc-price" name="pro_price" type="text" class="form-control" value="<?php echo $row['pro_price'];?>" >
    </div>



	<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
						<input type="file" id="pro_image" name="pro_image" placeholder="Product Image" 
						class="form-control">
					</div>
				</div>


    <button id="payment-button" type="submit" name="update" class="btn btn-lg btn-info btn-block">
    	<i class="fa fa-plus fa-lg"></i>&nbsp;
    	<span id="payment-button-amount">Update Now </span>

    </button>
  </div>
</form>


</div>
</div>
</div>



<?php include('includes/admin_footer.php');?>