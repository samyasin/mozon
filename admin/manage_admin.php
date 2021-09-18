
<?php 
include('includes/connection.php');
if(isset($_POST['save']))
{
	//data Get from Form
	$email = $_POST['admin_email'];
	$password = $_POST['admin_password'];
	$fullname = $_POST['admin_fullname'];
    $admin_image=$_FILES['admin_image']['name'];
    $tmp_name=$_FILES['admin_image']['tmp_name'];
    $path='adminsimages/';

    
    //move image to folder adminsimages
    move_uploaded_file($tmp_name, $path.$admin_image);
	
	/*echo '<pre>';
	print_r($_FILES);
	die;
	*/


	
	$query="Insert into admin (admin_email , admin_password, admin_fullname, admin_image) Values ('$email' , ' $password' , '$fullname' , '$admin_image')";
	
	mysqli_query($conn , $query);




	//dei;
	/*Do not execute below code*/
}

include('includes/admin_header.php');
?>
<hr>
<hr>
<hr>
<hr>
<hr>


<div class="col-lg-12">
	<div class="card">
		<div class="card-header">Manage Admin </div>
		<div class="card-body card-block">
			<form action="" method="post" class="" enctype="multipart/form-data">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<input type="text" id="username" name="admin_fullname" placeholder="Full Name" class="form-control">
					</div>
				</div>
			
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</div>
						<input type="email" id="email" name="admin_email" placeholder="Email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-asterisk"></i>
						</div>
						<input type="password" id="password" name="admin_password" placeholder="Password" class="form-control">
					</div>
				</div>


				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
						<input type="file" id="admin_image" name="admin_image" placeholder="Admin Image" 
						class="form-control">
					</div>
				</div>


				<div class="form-actions form-group">
					<button type="submit" name="save" class="btn btn-outline-success btn-large">Save Admin Information</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminmodal">
              Add New Admin By Modal
            </button>

				</div>
			</form>
		</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="addadminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Admin </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="post" class="" enctype="multipart/form-data">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<input type="text" id="username" name="admin_fullname" placeholder="Full Name" class="form-control">
					</div>
				</div>
			
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</div>
						<input type="email" id="email" name="admin_email" placeholder="Email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-asterisk"></i>
						</div>
						<input type="password" id="password" name="admin_password" placeholder="Password" class="form-control">
					</div>
				</div>


				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
						<input type="file" id="admin_image" name="admin_image" placeholder="Admin Image" 
						class="form-control">
					</div>
				</div>


				<div class="form-actions form-group">
				
			     	<button type="submit" name="save" class="btn btn-outline-success btn-large">Save Admin Information</button>
                  

				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-----------------------End Modal ------------------------->



<!-- Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Admin </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="" method="post" class="" enctype="multipart/form-data" >
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<input type="text" id="username" name="admin_fullname" placeholder="Full Name" class="form-control" value="<?php echo $row['admin_fullname'];?>">
					</div>
				</div>
			
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</div>
						<input type="email" id="email" name="admin_email" placeholder="Email" class="form-control" value="<?php echo $row['admin_email'];?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-asterisk"></i>
						</div>
						<input type="password" id="password" name="admin_password" placeholder="Password" class="form-control" value="<?php echo $row['admin_password'];?>">
					</div>
				</div>


				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
						<input type="file" id="admin_image" name="admin_image" placeholder="Admin Image" 
						class="form-control">
					</div>
				</div>


				<div class="form-actions form-group">
				
			     	<button type="submit" name="save" class="btn btn-outline-success btn-large">Save Admin Information</button>
                  

				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-----------------------      End Modal           -------------------------> 



	<div class="row m-t-30">
		<div class="col-md-12">
			<!-- DATA TABLE-->
			<div class="table-responsive m-b-40">
				<table class="table table-borderless table-data3">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>	

							<th>Image</th>

							<th>Update</th>
								<th>Update temp</th>
							<th>Delete</th>

						</tr>
					</thead>
					<tbody>

						<?php 
						$query = "select * from admin";
						$result = mysqli_query($conn , $query);

						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo"<td>{$row['admin_id']}</td>";
							echo"<td>{$row['admin_fullname']}</td>";	
							echo"<td>{$row['admin_email']}</td>";
						   
					//	 echo"<td><a href='update_admin.php?id={$row['admin_id']}' class='btn btn-info'>View Image</td>";
						    echo"<td> <img src='adminsimages/{$row['admin_image']}' alt=' No Image Uploaded' width='200' height='200'></td>";
							echo"<td><a href='update_admin.php?id={$row['admin_id']}' class='btn btn-warning'>Update</td>";
								echo"<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#updatemodal'>Update Admin By Modal</button></td>";
							echo"<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</td>";
							echo "</tr>";
						}


						?>

					</tbody>
				</table>
			</div>
			<!-- END DATA TABLE-->
		</div>
	</div>

<?php include('includes/admin_footer.php');?>