<?php
include('includes/connection.php');
if(isset($_POST['save']))
{
	//data Get from Form

	$cat_name = $_POST['cat_name'];
    $cat_image=$_FILES['cat_image']['name'];
    $tmp_name=$_FILES['cat_image']['tmp_name'];
    $path='catimages/';

    
    //move image to folder adminsimages
    move_uploaded_file($tmp_name, $path.$cat_image);

	
	$query="Insert into category (cat_name , cat_image) Values ('$cat_name' , '$cat_image')";
	
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
						<div class="card-header">Manage Categories</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Create New Category</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-cattitle" class="control-label mb-1">Category Name</label>
									<input id="cc-cattitle" name="cat_name" type="text" class="form-control">
								</div>



				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
						<input type="file" id="cat_image" name="cat_image" placeholder="Category Image" 
						class="form-control">
					</div>
				</div>

								<button id="payment-button" type="submit" name="save" class="btn btn-lg btn-info btn-block">
									<i class="fa fa-plus fa-lg"></i>&nbsp;
									<span id="payment-button-amount">Create</span>

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
												<th>Title</th>
												<th>Image</th>
												<th>Update</th>
												<th>Delete</th>
												
											</tr>
										</thead>
										<tbody>

											<?php 
											$query = "select * from category";
											$result = mysqli_query($conn , $query);

											while ($row = mysqli_fetch_assoc($result)) {
												echo "<tr>";
												echo"<td>{$row['cat_id']}</td>";
												echo"<td>{$row['cat_name']}</td>";
												    echo"<td> <img src='catimages/{$row['cat_image']}' alt=' No Image Uploaded' width='200' height='200'></td>";	
												echo"<td><a href='update_category.php?id={$row['cat_id']}' class='btn btn-warning'>Update</td>";
												echo"<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</td>";
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