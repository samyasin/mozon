<?php 
include('includes/connection.php');
if(isset($_POST['update']))
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
	
	$query="Update admin set admin_email='$email' , admin_password='$password', admin_fullname='$fullname' ,
	 admin_image='$admin_image' where admin_id={$_GET['id']}";
	
	mysqli_query($conn , $query);


header("location:manage_admin.php");

	//dei;
	/*Do not execute below code*/
}


$query="select * from admin where admin_id={$_GET['id']}";
$result = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($result);
include('includes/admin_header.php');
?>
<hr>
<hr>
<hr>
<hr>
<hr>


<div class="col-lg-12">
	<div class="card">
		<div class="card-header">Update Admin </div>
		<div class="card-body card-block">
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
					<button type="submit" name="update" class="btn btn-success btn-sm">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>



		</div>
	</div>




<?php include('includes/admin_footer.php');?>