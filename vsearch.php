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
                                    
                                        <?php
                                            $con=mysqli_connect("localhost","root","","rms");
                                            // Check connection
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $query = $_GET['query'];
                     
                                            $query = htmlspecialchars($query); 
                    
                     
                                            $query = mysqli_real_escape_string($con,$query);
                                            // makes sure nobody uses SQL injection
                     
                                            $raw_results = mysqli_query($con,"SELECT houses.property_id, houses.house_id, houses.state, houses.vacancy, houses.type, houses.value, property.property_name FROM houses INNER JOIN property ON property.property_id=houses.property_id WHERE ((`property_name` LIKE '%".$query."%') OR (`type` LIKE '%".$query."%')) AND (houses.vacancy='Vacant')") or die(mysqli_error());
                     
                                            if(mysqli_num_rows($raw_results)){ // if one or more rows are returned do following
                                                echo"
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
                                                <tbody>
                                                ";
                                                while($results = mysqli_fetch_array($raw_results)){
                                                 $property_name = $results['property_name'];
                      $id = $results['house_id'];
                      $state = $results['state'];
                      $vacancy = $results['vacancy'];
                      $type = $results['type'];
                      $value = $results['value'];
                                                    echo "
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
                                                    ";
                                                }
                                                

                                                mysqli_free_result($raw_results);
                                               
                                            }
                                             else{
                                                echo "<p class='ass'>No results</p>";
                                                }
                                            mysqli_close($con);
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>
        </div>
         <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
 <!-- /. WRAPPER  -->
     <!-- JS Scripts-->
    <!-- jQuery Js -->
<?php include('footer.php'); ?>