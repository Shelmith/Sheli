<?php include('header.php'); ?>
<?php
define('DB_NAME', 'rms');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

if(!$link)
{
    die('Could not connect to database: ' . mysqli_error($link));
}

$db_select = mysqli_select_db($link, DB_NAME);

if(!$db_select)
{
    die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($link));
}

if( isset($_POST['submit'])) {
    $id = $_POST['house_id'];

    $full_names = $_POST['full_names'];
    $national_id = $_POST['national_id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date_of_entry = $_POST['date_of_entry'];
    $date = new DateTime('' . date("Y-m-08") . '');
    $today = new DateTime('' . date("Y-m-d") . '');
    if ($date<$today){
      $date->modify('+1 month');  
    }
    $rent_due = $date->format('Y-m-d');                            
    
    
    // $rent_due = $_POST['date'];

    
    //Insert tenant details
    $sql10y = "INSERT INTO tenants (house_id, full_names, national_id, phone, email, date_of_entry, rent_due) VALUES ('{$id}', '{$full_names}', '{$national_id}', '{$phone}', '{$email}', '{$date_of_entry}', '{$rent_due}')";
     $link->query($sql10y);

     //10c. Update House to occupied
     $sql10z = "UPDATE houses  SET vacancy = 'Occupied' WHERE house_id = '$id'";
     $link->query($sql10z);

      

    

    // if(!mysqli_query($link, $query))

    //     {
    //         die("DAMMIT");
    //     }
    //     else{
    //         echo "Tenant details added";
    //     }
}
mysqli_close($link);


?>  
	                  <!-- /. ROW  -->
      <div class="row">
        <div class="col-lg-12">
            <div class="portlet light "> 
                    <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo"></i>
                                    <span class="caption-subject font-red-sunglo bold uppercase">New Tenant</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default" href="tenant_list.php">
                                        <i class="fa fa-group"></i>
                                    </a>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form  action="tenant_add.php" method="post" role="form" name="tenant" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label>House Number</label>
                                    <select class="form-control" name="house_id">
                                        <?php
                                            $con=mysqli_connect("localhost","root","","rms");
                                            // Check connection
                                            if (mysqli_connect_errno())
                                              {
                                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                              }

                                            $sql="SELECT house_id FROM houses WHERE vacancy='Vacant'";

                                            if ($result=mysqli_query($con,$sql))
                                              {
                                              // Fetch one and one row


                                            while($row = mysqli_fetch_array($result)) {
                                                $house_id = $row['house_id'];
                                                echo "<option value='".$row['house_id']."'>".$house_id."</option>";
                                            } 


                                              // Free result set
                                              mysqli_free_result($result);
                                            }


                                            mysqli_close($con);
                                            ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label>ID Number</label>
                                    <input class="form-control" placeholder="" name="tenant_id">
                                </div >-->
                                <div class="form-group">
                                    <label>Full Names</label>
                                    <input class="form-control" placeholder="" name="full_names" required>
                                </div>
                                <div class="form-group">
                                    <label>National Id</label>
                                    <input class="form-control" max="8" min="7" placeholder="" name="national_id" required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail Address</label>
                                    <input type="email" class="form-control" placeholder="johndoe@domain" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" value="+254" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Date of Entry</label>
                                    <input type= "date" class="form-control" placeholder="dd/mm/yy" max="" name="date_of_entry" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Rent Due</label>
                                    <input type= "date" class="form-control" placeholder="dd/mm/yy" name="rent_due" required>
                                </div> -->
                                
                                <button type="submit"  name="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<footer></footer>
	</div>
     <!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>
<?php include('footer.php'); ?>