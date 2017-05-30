<?php

    session_start();
    if (!isset($_SESSION['email'])) {
      header("location: ../");
    }
    require('../lib\connectdb.ext');
    require('../lib\functions.php');
    $user= getUser();
    $admin = getAdmin();
    $admins = getAdmins();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stupervision</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <script src="../assets/js/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

        <nav class="navbar navbar-default snav">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="../home.php">Stupervision</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><img src="<?php require('../lib\imgcheck.php');?>" alt="" class="img-circle" height="25px" width="25px"> <?php require('../lib\studentcheck.php');?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="index.php">Profile</a></li>
                                <li role="presentation"><a href="settings.php">Settings</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                <ul class="nav nav-tabs nav-justified">
                  <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          Appointments <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li role="presentation"><a data-toggle="tab" href="#cr_app">Create Appointments</a></li>
                          <li role="presentation"><a data-toggle="tab" href="#v_app">View Appointments</a></li>
                        </ul>
                  </li>
                  <li role="presentation"><a data-toggle="tab" href="#messages">Messages</a></li>
                </ul>


                <div class="tab-content">
                  <div id="cr_app" class="tab-pane fade in active">
                        <h1 class="text-center" style="font-weight:lighter">Book An Appointment</h1>
                        <p>Select a Supervisor</p>
                        <form class="" action="index.html" name="appf" id="appf" method="post">

                          <p id="check-e" class="bg-danger"></p>
                          <p id="check-s" class="bg-success"></p>

                          <select class="form-control" name="sup_id" id="sup_id" oninput="showSche()">
                            <option value="0">Select Lecturer</option>
                            <?php
                              foreach($admins as $admin){
                                echo '<option value="'.$admin['id'].'">'.$admin['title'].' '.$admin['firstname'].' '.$admin['lastname'] .'   </option>';
                              }
                             ?>

                          </select>
                          <br>
                          <div id="schedule">

                          </div>
                          <br>
                          <div id="date">

                          </div>
                          <a onclick="selectApp()" class="btn btn-success book">Book</a>
                        </form>
                  </div>
                  <div id="v_app" class="tab-pane fade">
                    <div class="table-responsive">
                      <table class="table">
                      <tr class="th">
                        <th>S/N</th>
                        <th>Supervisor Name</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th> Confirmed </th>
                        <th> </th>
                      </tr>
                      <?php
                      $i=1;
                        $row = getSApp();
                        if(count($row) > 0){
                        foreach($row as $app) {

                          echo "<tr>
                          <th>".$i."</th>
                          <th>";

                          $usql = "SELECT *  FROM `admin` where `id` = '".$app['sup_id']."'";
                          $ustmt = $conn->query($usql);
                          $ustmt->execute();
                          $nuser = $ustmt->fetch(PDO::FETCH_ASSOC);

                          echo $nuser['title']." ".$nuser['firstname']." ".$nuser['lastname']."</th>
                          <th>".$app['date']."</th>
                          <th>";


                          $ssql = "SELECT *  FROM `schedule` where `id` = '".$app['sch_id']."' and `sup_id` ='".$app['sup_id']."'";
                          $sstmt = $conn->query($ssql);
                          $sstmt->execute();
                          $ssche = $sstmt->fetch(PDO::FETCH_ASSOC);

                          echo $ssche['start']."</th>
                          <th>".$ssche['end']."</th>
                          <th>";

                          if ($app['confirm'] !=1 ){
                            echo "<a href=\"#\" class='text-center' style=\"color:red\"  data-toggle=\"modal\" data-target=\"#delmod".$app['id']."\"><i class=\"fa fa-cog\"></i></a></th>

                            <th><a href=\"#\" class='text-center' style=\"color:red\"  data-toggle=\"modal\" data-target=\"#messModal".$app['id']."\"><i class=\"fa fa-envelope\"></i></a></th>
                            </tr>";


                          }else {
                            echo "<a href=\"#\" class='text-center' style=\"color:green\"  data-toggle=\"modal\" data-target=\"#delmod".$app['id']."\" ><i class=\"fa fa-check\"></i></a></th>
                            <th><a href=\"#\" class='text-center' style=\"color:red\"  data-toggle=\"modal\" data-target=\"#messModal".$app['id']."\"><i class=\"fa fa-envelope\"></i></a>
                            </th>
                            </tr>";
                          }

                          echo '<div class="modal fade" id="delmod'.$app['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title">Confirm Appointment</h4>
                               </div>
                               <div class="modal-body" style="font-size: 18px;font-family: calibri;">
                                 <p id="daucheck-e" class="bg-success"></p>
                                 <p id="cucheck-e" class="bg-danger"></p>
                                 <p>Are you sure you want to delete this Appointment?</p>
                               </div>
                               <div class="modal-footer">
                                 <a type="button" class="btn btn-sm btn-danger" id="delApp" onclick="delSapp('.$app['id'].')">Delete</a>
                               </div>
                             </div>
                           </div>
                          </div>
                          ';


                          echo '    <div class="modal fade" tabindex="-1" role="dialog" id="messModal'.$app['id'].'">
                               <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                   <div class="modal-header" style="background:black;color:white;">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white">×</span></button>
                                     <h6 class="modal-title">New Message</h6>
                                   </div>
                                   <div class="modal-body mmodal-body" style="font-size: 18px;font-family: calibri;">
                                   <form class="" action="#" method="post" id="messform" name="messform">
                                       <div class="input-group">
                                        <div class="input-group-addon iga">To</div>
                                         <input type="text" class="form-control mform-control" name="student_id" value="'.$nuser['title'].' '.$nuser['lastname'].'" disabled>
                                       </div>
                                       <div class="input-group">
                                        <div class="input-group-addon iga">Subject</div>
                                         <input type="text" class="form-control mform-control" name="subject" value="">
                                       </div>
                                       <textarea name="message" class="form-control mform-control" rows="8" cols="80"></textarea>
                                       </div>
                                   </form>

                                   <div class="modal-footer">
                                     <p id="dmaucheck-e" class="bg-danger"></p>
                                     <p id="cmucheck-e" class="bg-success"></p>
                                     <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                     <a type="button" class="btn btn-sm btn-primary ms" id="btndel"  onclick="sendsmessage('.$app['id'].')">Send </a>
                                   </div>
                                 </div>
                               </div>
                              </div>
                              ';





                              $i++;
                            }
                          }
                          else{
                            echo "<h1 class='text-center'>No appointments</h1>";
                            echo "<script>$('.th').hide() </script>";
                          }
                            ?>
                     </table>
                   </div>



                  </div>
                  <div id="messages" class="tab-pane fade">
                    <?php
                    try{
                      $sql = "SELECT COUNT(*) FROM `message` where `student_id` = '".$user['id']."'";
                      $stmt = $conn->query($sql);
                      $stmt->execute();




                      // $mess = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($stmt->fetchColumn() > 0) {
                      $msql = "SELECT * FROM `message` where `student_id` = '".$user['id']."'  ORDER BY date DESC";
                      $mstmt = $conn->query($msql);
                      $mstmt->execute();
                      $messs = $mstmt->fetchAll();
                      foreach($messs as $mess) {

                      $ssql = "SELECT * FROM `admin` where id ='".$mess['sup_id']."'";
                      $sustmt = $conn->query($ssql);
                      $sustmt->execute();
                      $sup = $sustmt->fetch(PDO::FETCH_ASSOC);



                      echo '
                                         <div class="col-md-12 well mwell"  data-toggle="modal" data-target="#nmessMod'.$mess['id'].'">
                                           <div class="row">
                                             <div class="col-md-3">
                                                <b>'.$sup['title'].' '.$sup['lastname'].'
                                            </b> </div>
                                             <div class="col-md-7">
                                                <b>'.$mess['subject'].'</b>- '.substr($mess['message'],0,20).'
                                              ...</div>
                                             <div class="col-md-2">
                                               '.date("h:i a M-d",  strtotime($mess['date'])).'
                                             </div>
                                           </div>
                                         </div>';


                                         echo '    <div class="modal fade" tabindex="-1" role="dialog" id="nmessMod'.$mess['id'].'">
                                              <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                  <div class="modal-header" style="background:black;color:white;">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white">×</span></button>
                                                    <h6 class="modal-title">You have a New Message</h6>
                                                  </div>
                                                  <div class="modal-body mmodal-body" style="font-size: 18px;font-family: calibri;">
                                                  <form class="" action="#" method="post" id="messform" name="messform">
                                                      <div class="input-group">
                                                       <div class="input-group-addon iga">From</div>
                                                        <input type="text" class="form-control mform-control" name="sup_id" value="'.$sup['title'].' '.$sup['lastname'].'" disabled>
                                                      </div>
                                                      <div class="input-group">
                                                       <div class="input-group-addon iga">Subject</div>
                                                        <input type="text" class="form-control mform-control" name="subject" value="'.$mess['subject'].'" disabled>
                                                      </div>
                                                      <textarea name="message" class="form-control mform-control" rows="8" cols="80" disabled>'.$mess['message'].'</textarea>
                                                      </div>
                                                  </form>

                                                  <div class="modal-footer">
                                                    <p id="dmaucheck-e" class="bg-danger"></p>
                                                    <p id="cmucheck-e" class="bg-success"></p>
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                             </div>
     ';


                      }
                    }
                      else{
                        echo "<h1 class='text-center'>You Currently have no messages</h1>";
                        $conn= null;

                      }
                    }
                    catch(PDOException $e)
                    {
                      echo $e->getMessage();
                    }

                    ?>
                  </div>
                  </div>
                </div>

              </div>

            </div>
          </div>





    <script src="../assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="../assets/js/scripts.js" charset="utf-8"></script>
  </body>
</html>
