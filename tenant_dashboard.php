<?php include('theader.php'); ?>
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

if( isset($_POST['name']) || isset($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO `repair`(`phonenumber`, `name`, `status`, `date_created`, `lev`, `description`) VALUES ('".$phone."', '".$name."','Pending', now(), 0, '".$description."')";
    if(!mysqli_query($link, $query))

        {
            die("DAMMIT");
        }
        else{
            echo "Repair details submitted";
        }
}

mysqli_close($link);


?>
<?php
                $con=mysqli_connect("localhost","root","","rms");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $sql="SELECT * FROM tenants WHERE national_id = '".$_SESSION['national_id']."' ";

                  if ($result=mysqli_query($con,$sql)) {
                    while($row = mysqli_fetch_array($result)) {
                        $house_id = $row['house_id'];
                        $full_names = $row['full_names'];
                        $national_id = $row['national_id'];
                        $tenant_id = $row['tenant_id'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $rent_due = $row['rent_due'];
                        $rent_status = $row['rent_status'];
                        echo "
                        <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='portlet light '>
                                Hello ".$full_names."
                                <span class='pull-right caption-subject font-red-sunglo bold uppercase'>House ".$house_id."</span>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='col-md-8'>
                              <div class='portlet light '>
                                <div class='portlet-title'>
                                    <div class='caption'>
                                        <i class='icon-share font-red-sunglo'></i>
                                        <span class='caption-subject font-red-sunglo bold uppercase'>
                                        Report Repair
                                        </span>
                                    </div>
                                </div>
                                <div class='portlet-body'>
                                    <div class='table-responsive'>
                                        <form action='tenant_dashboard.php' method='post' >
                                                <input class='form-control' name='phone' value='";?><?php echo $row['phone']?><?php echo"' type='hidden'>
                                            <div class='form-group'>
                                                <label>State Your Problem</label>
                                                <input class='form-control' name='name' placeholder='' required>
                                            </div>
                                            
                                            <div class='form-group'>
                                                <label>Describe Your Problem</label>
                                                <textarea class='form-control' name='description' placeholder='' ></textarea> 
                                            </div>                                    
                                            <button type='submit' class='btn btn-default'>Submit</button>
                                            <button type='reset' class='btn btn-default'>Reset </button>
                                        </form>
                                    </div>
                                </div>
                              </div>

                            </div>
                            <div class='col-md-4'>
                             <div class='portlet light '>
                                <div class='portlet-title'>
                                    <div class='caption'>
                                        <i class='icon-share font-red-sunglo'></i>
                                        <span class='caption-subject font-red-sunglo bold uppercase'>Pay Rent</span>
                                    </div>
                                </div>
                                <div class='portlet-body' style='border:1px solid #f3f3f3'>
                                  <div id='paypal-button-container'></div>";?>
                                  <script>
                                      paypal.Button.render({

                                          env: 'sandbox', // sandbox | production

                                          // PayPal Client IDs - replace with your own
                                          // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                                          client: {
                                              sandbox:    'AWWnZ9cdzkxjQgAbtr2Oe0Lu20OooyGg36cSe8OmFDfhTrtthiPmTEXYc5UzrCE33zvdfZp-K38vo0aG',
                                              production: 'AXAQlNSL_CNv2s1cRdh-vYTWwA95ZplMmQZWiSA5qQ_z7l8axrNwn0C16x7VcCdIr3NmGUvtOBhZPMzG'
                                          },

                                          // Show the buyer a 'Pay Now' button in the checkout flow
                                          commit: true,

                                          // payment() is called when the button is clicked
                                          payment: function(data, actions) {

                                              // Make a call to the REST api to create the payment
                                              return actions.payment.create({
                                                  payment: {
                                                      transactions: [
                                                          {
                                                              amount: { total: '0.01', currency: 'USD' }
                                                          }
                                                      ]
                                                  }
                                              });
                                          },

                                          // onAuthorize() is called when the buyer approves the payment
                                          onAuthorize: function(data, actions) {

                                              // Make a call to the REST api to execute the payment
                                              return actions.payment.execute().then(function() {
                                                  window.alert('Payment Complete!');
                                              });
                                          }

                                      }, '#paypal-button-container');
                                    </script>
                                    <?php echo "
                                </div>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        ";
                        
                    } 
                    mysqli_free_result($result);
                  }
                


                mysqli_close($con);
              ?>

                
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>