<?php
include('includes/connection.php');
if(isset($_POST['submit'])){
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_fullname'];

    
    $query = "update admin set admin_email    = '$email',
                               admin_password = '$password',
                               full_name      = '$fullname'
             where admin_id = {$_GET['id']}";
    mysqli_query($conn,$query);    
}

$query    = "select * from admin where admin_id = {$_GET['id']}";
$result   = mysqli_query($conn,$query);
$adminSet = mysqli_fetch_assoc($result); 

 include('includes/admin_header.php'); ?>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="manage_admin.php" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                                <input name="admin_email" type="text" class="form-control" value="<?php echo $adminSet['admin_email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                                <input name="admin_password" type="password" class="form-control" value="<?php echo $adminSet['admin_password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Admin Full Name</label>
                                                <input name="admin_fullname" type="text" class="form-control" value="<?php echo $adminSet['full_name'] ?>">
                                            </div>                              
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    Update                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
                            </div>
                            </div>
            </div>

<?php include('includes/admin_footer.php'); ?>