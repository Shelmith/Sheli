<?php include('theader.php'); ?>
                       <!-- /. ROW  -->
          <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class='portlet light '>
                        <div class='portlet-title'>
                            <div class='caption'>
                                <i class='icon-share font-red-sunglo'></i>
                                <span class='caption-subject font-red-sunglo bold uppercase'><i class='fa fa-home'></i> | Houses</span>
                            </div>
                            <div class='actions'>
                                <form action='vsearch.php' class="pull-left" method='GET'>
                                    <input class="form-control" type='text' name='query' placeholder="Search..." />
                              </form>
                                <a class='btn btn-circle btn-icon-only btn-default' href='dashboard.php' style="margin-left: 10px">
                                    <i class='fa fa-dashboard'></i>
                                </a>
                                <a class='btn btn-circle btn-icon-only btn-default' href='house_add.php'>
                                    <i class='fa fa-plus'></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive table-scrollable ">
                                <table class="table table-advance table-hover">
								                  <thead>
                                    <tr>
                                      <th>Property</th>
                                      <th>House</th>
                                      <th>Type</th>
                                      <th>Value</th>
                                      <th>State</th>
                                      <th>Vacancy</th>
                                        
                                      <th>Options</th>
                                    </tr>
                                  </thead>
                            	<?php
									$con=mysqli_connect("localhost","root","","rms");
									// Check connection
									if (mysqli_connect_errno())
									  {
									  echo "Failed to connect to MySQL: " . mysqli_connect_error();
									  }

									$sql="SELECT houses.property_id, houses.house_id, houses.state, houses.vacancy, houses.type, houses.value, property.property_name FROM houses  INNER JOIN property ON property.property_id=houses.property_id WHERE houses.vacancy='Vacant'";

									if ($result=mysqli_query($con,$sql))
									  {
									  // Fetch one and one row
									

									while($row = mysqli_fetch_array($result)) {
									    $property_name = $row['property_name'];
                      $id = $row['house_id'];
									    $state = $row['state'];
									    $vacancy = $row['vacancy'];
                      $type = $row['type'];
                      $value = $row['value'];
                      
									    echo "
                        <tbody>
                          <tr>
                            <td class='highlight'><div class='success'></div>&nbsp; &nbsp;".$property_name."</td>
                            <td>".$id."</td>
                            <td>".$type."</td>";?>
                            <td><?php echo number_format($value)?></td><?php echo"
                            <td>".$state."</td>
                            <td>".$vacancy."</td>                            
                            <td>
                            <div class='btn-group btn-group-solid'>
                                
                                <a class='btn green-meadow' href='#' title='Like'>
                                    <i class='fa fa-thumb'></i></a>
                            </div>
                            </td>
                          </tr>
                        </tbody>";
									} 

									echo "</table>";

									  // Free result set
									  mysqli_free_result($result);
									}


									mysqli_close($con);
									?>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        <footer></footer>
        </div>
         <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
 <!-- /. WRAPPER  -->
     <!-- JS Scripts-->
    <!-- jQuery Js -->
<?php include('footer.php'); ?>