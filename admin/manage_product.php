<?php
include('includes/connection.php');
if(isset($_POST['save']))
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
	
	
	$query="Insert into product (pro_name , pro_desc , pro_price , cat_id , pro_image ) Values ('$pro_name' , '$pro_desc' , '$pro_price' , '$cat_id' , '$pro_image')";
	
	mysqli_query($conn , $query);

	/*Do not execute below code*/
}

include('includes/admin_header.php');

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
								<h3 class="text-center title-2">Create New Product</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="selectcat" class=" form-control-label">Category </label>
									</div>
									<div class="col-12 col-md-12">
										<select name="selectcat" id="selectcat" class="form-control-lg form-control">
											<?php
       $query="select cat_id ,cat_name  from category";

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
	<label for="cc-product" class="control-label mb-1">Product Name</label>
	<input id="cc-product" name="pro_name" type="text" class="form-control" >
</div>

<div class="form-group">
	<label for="cc-desc" class="control-label mb-1">Product Descrption</label>
	<input id="cc-desc" name="pro_desc" type="text" class="form-control" >
</div>

<div class="form-group">
	<label for="cc-price" class="control-label mb-1">Product Price</label>
	<input id="cc-price" name="pro_price" type="text" class="form-control" >
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


<button id="save-button" type="submit" name="save" class="btn btn-lg btn-info btn-block">
									<i class="fa fa-plus fa-lg"></i>&nbsp;
									<span id="payment-button-amount">Add </span>

								</button>
</div>
</form>


<div class="row m-t-30">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category</th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Image</th>
						<th>Update</th>
						<th>Delete</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					$query = "select * from product";
				
					$result = mysqli_query($conn , $query);
			


					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo"<td>{$row['pro_id']}</td>";
					 $query2 = "select * from category where cat_id={$row['cat_id']}";
					 		$result2 = mysqli_query($conn , $query2);
					 	while ($row2 = mysqli_fetch_assoc($result2))
					 	{
						echo"<td>{$row2['cat_name']}</td>";
						}
						echo"<td>{$row['pro_name']}</td>";
						echo"<td>{$row['pro_desc']}</td>";	
						echo"<td>{$row['pro_price']}</td>";	
					
						//		echo"<td><a href='update_category.php?id={$row['pro_id']}' class='btn btn-info'>View Image</td>";
						    echo"<td> <img src='proimages/{$row['pro_image']}' alt=' No Image Uploaded' width='100' height='100'></td>";
												echo"<td><a href='update_product.php?id={$row['pro_id']}' class='btn btn-warning'>Update</td>";
												echo"<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</td>";
												echo "</tr>";
											}


											?>

										</tbody>
									</table>
								</div>
								<!-- END DATA TABLE-->
							</div>
						</div>
					</div>



					<?php include('includes/admin_footer.php');?>