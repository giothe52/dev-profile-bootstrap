<?php
    session_start(); //we need session for the log in thingy XD 
    include("../functions.php");
    if($_SESSION['login']!==true){
        header('location:index.php');
        session_destroy();
    }
    if($_SESSION['useraccesstype'] !== 'ADMIN')
    {
        
          header('location:../index.php');
          session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory System - Add Equipment</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div class="">
        <i><?php echo $_SESSION['Department'] ?></i>
        <input type="hidden" name="accesstype" id="accesstype" value="<?php echo $_SESSION['useraccesstype'] ?>" >
    </div>
    <div class="sidebar-brand-text mx-3"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../home.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <div id="equipmaintenance" name = "equipmaintenance">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesupply"
                        aria-expanded="true" aria-controls="collapsesupply">
                            <i class="fas fa-sticky-note"></i>
                            <span>Supply | Materials</span>
                        </a>
                        <div id="collapsesupply" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" id="ASM" name="ASM" href="../supply/add_supply.php">Add Supply | Materials</a>
                                <a class="collapse-item" id="ESM" name="ESM" href="../supply/UpdateSupply.php">Edit Supply | Materials</a>
                                <a class="collapse-item" id="RSM" name="RSM" href="../supply/request_supply.php">Request Supply | Material</a>
                                <a class="collapse-item" id="RI" name="RI" href="../supply/supplyinfo.php">Request Information</a>
                            </div>
                        </div>
                    </li>
                </div>
                <div id="equipmaintenance" name = "equipmaintenance">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos"
                        aria-expanded="true" aria-controls="collapseTwos">
                            <i class="fas fa-tv"></i>
                            <span> Equipment | Furniture</span>
                        </a>
                        <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" id="AEF" name="AEF" href="add_equipment.php">Add Equipment | Furniture</a>
                                <a class="collapse-item" id="EEF" name="EEF" href="../UpdateQuantity.php">Edit Equipment | Furniture</a>
                                <a class="collapse-item" id="REF" name="REF" href="request_equip.php">Request Equip | Furniture</a>
                                <a class="collapse-item" id="RI" name="RI" href="equipinfo.php">Request Information</a>
                            </div>
                        </div>
                    </li>
                </div>
                <!-- Nav Item - Utilities Collapse Menu -->
                <div id="UserMaintenance" name = "UserMaintenance">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Account</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" id="UR" name="UR" href="../useraccountrequest.php">User Request</a>
                                <a class="collapse-item" href="../UserMaintenanceEdit.php">User Maintenance</a>
                            </div>
                        </div>
                    </li>
                </div>
                <div id="pendingrequest" name="pendingrequest">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Request</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" id="PRFA" name="PRFA" href="../PendingSupply.php">Supply And Materials</a>
                            <a class="collapse-item" id="PRFA" name="PRFA" href="../PendingEquip.php">Equipment And Furniture</a>
                        </div>
                    </div>
                </li>
                </div>
                <!-- Nav Item - Charts -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
                    
                </li> -->
                
                <!-- Nav Item - Tables -->
                <div name="reports"  id = "reports">        
                    <li class="nav-item">
                        <a class="nav-link" href="../Reports.php">
                            <i class="fas fa-fw fa-table"></i>
                        <span>Reports</span></a>
                    </li>
                </div>
                
                
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
                
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
</ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">  <i><?php echo $_SESSION['Fullname'] ?></i></span>
                                <img class="img-profile rounded-circle"
                                    src="undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                        <!-- Begin Page Content -->
                <div class="container-fluid-sm">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       <form method="POST">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Equiment And Furniture</h6>

                        </div>                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_field" width="150%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Description</th>
                                            <th width="10%">Quantity</th>
                                            <th>Unit</th>
                                            <th>Property Code</th>
                                            <th>Serial Number</th>
                                            <th width="11%">Amount</th>
                                            <th>Account Code</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input class="form-control" type="text" name="itemname[]" required=""></td>
                                            <td><input class="form-control" type="text" name="description[]" required=""></td>
                                            <td><input class="form-control" type="number" name="qty[]" required=""></td>
                                            <td><input class="form-control" type="text" name="unit[]" required=""></td>
                                            <td><input class="form-control" type="text" name="pc[]"></td>
                                            <td><input class="form-control" type="text" name="serial[]" required=""></td>
                                            <td><input class="form-control" type="number" name="amount[]" required=""></td>
                                            <td><input class="form-control" type="text" name="cc[]"></td>
                                            <td><a class="btn btn-warning btn-circle btn-sm" name="add" id="add">
                                            <i class="fas fa-plus"></i></a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <center>
                            <?php 
                                   if(isset($_POST['submit'])){
                                       $localhost = "localhost";
                                        $username = "root";
                                        $pass = "";
                                        $dbname = "db_inventory";
                                        $conn = mysqli_connect($localhost, $username, $pass, $dbname);
                                       $unit = $_POST['unit'];
                                       $qty = $_POST['qty'];
                                       $description = $_POST['description'];
                                       $serial = $_POST['serial'];
                                       $amount = $_POST['amount'];
                                       $fullname = $_SESSION['Fullname'];
                                       $Department = $_SESSION['Department'];
                                       $pc = $_POST['pc'];
                                       $cc = $_POST['cc'];
                                       $itemname = $_POST['itemname'];
                                           foreach ($itemname as $key => $value){
                                               $chkuserquery = "SELECT * FROM equipment_tbl where Item_Code = '".$serial[$key]."'";
                                               $result =mysqli_query($conn, $chkuserquery) ;
                                               if (!mysqli_num_rows($result))
                                               {
                                                    $total = $qty[$key] * $amount[$key];
                                                   $save = "INSERT INTO `equipment_tbl`(`itemname`,`Description`, `Qty`,`Unit`,`PropertyNumber`, `Item_Code`, `Amount`, `Totalamount`,`AccountCode`,`Department`,`CreateBy`)VALUES
                                                   ('".$value."','".$description[$key]."','".$qty[$key]."','".$unit[$key]."','".$pc[$key]."','".$serial[$key]."','".$amount[$key]."','".$total."','".$cc[$key]."','".$Department."','".$fullname."')";
                                                   $query = mysqli_query($conn, $save) ;
                                                   echo "<span style ='Color:Green'>Item '".$itemname[$key]."' Successfully Saved !</span> </br>";   
                                               }
                                               else{
                                                     
                                                     echo "<span style ='Color:red'>Serial Number '".$serial[$key]."' Already Exist</span> </br>";   

                                               }
                                           }
                                   }
                               ?>
                               </br>
                            <input type="submit" name="submit" id="submit" onclick="confirm('Are you sure you want to save?')"  name="submit" class="btn btn-success" value="SAVE">
                            </center>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="savemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Successfully Save</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                <center>
              
                    <a class="btn btn-primary" href="equipment/add_equipment.php">OK</a>
                </center>
            
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var html = '<tr><td><input class="form-control" type="text" name="itemname[]" required=""></td><td><input class="form-control" type="text" name="description[]" required=""></td><td><input class="form-control" type="number" name="qty[]" required=""></td><td><input class="form-control" type="text" name="unit[]" required=""></td><td><input class="form-control" type="text" name="pc[]"></td><td><input class="form-control" type="text" name="serial[]" required=""></td><td><input class="form-control" type="number" name="amount[]" required=""><td><input class="form-control" type="text" name="cc[]"></td><td><a href="#" class="btn btn-danger btn-circle btn-sm" name="remove" id="remove"><i class="fas fa-trash"></i></td></tr>';

            var max = 5;
            var x = 1;
            $("#add").click(function(){
                if(x <= max){
                    $("#table_field").append(html);
                    x++;
                }
            });
            $("#table_field").on('click','#remove',function(){
                $(this).closest('tr').remove();
                x--;
            });
            var useraccesstype = $("#accesstype").val();
    if(useraccesstype == "ADMIN")
    {
                    $('#RI').show();
                    $('#REF').hide();
                    $('#RSM').hide();
                    $("#SupplyMaintenance").show();
                    $("#equipmaintenance").show();
                    $('#pending').show();
                    console.log('ADMIN')
    }
    else
     {
                    $('#pendingrequest').hide();
                    $('#RSM').show();
                    $('#ASM').hide();
                    $('#ESM').hide();
                    $('#AEF').hide();
                    $('#EEF').hide();
                    $("#pendingsupply").hide();
                    $("#UserMaintenance").hide();
                    $("#reports").hide();
                    $('#pending').hide();
                    $('#PendingRequestITEM').hide();
                    $('#report').hide();
                    $('#PRO').hide();
                    $('#PRFA').hide();
                    $('#UR').hide();
                    $('#PR').hide();
                    $('#PendingPurchaseOrder').hide();
                    
                    console.log('NOT ADMIN')
     }
        });
    </script>
</body>

</html>