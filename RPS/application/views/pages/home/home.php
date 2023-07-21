<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    $this->load->view("template/tophead");

    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php $this->load->view("template/sidebar"); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view("template/header"); ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <button type="button" id="btn_createTuition" class="btn btn-warning btn-sm btn_createTuition" data-toggle="modal" data-target="#createTuition">Create Tuition</button>
 </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Full paid</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $countFull ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Pending</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $countPending ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total Students</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $countStudent ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             


                <!-- NEW ROW FOR NURSERY TUITION -->
                <!-- START -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Nursery Tuition</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" data-order='[[ 0, "desc" ]]' id="dataTable"
                                        width="100%" cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>School Year</th>
                                                <th>Level</th>
                                                <th>Tuition</th>
                                                <th>Miscelanious</th>
                                                <th>Books</th>
                                                <th>Graduation Fee</th>
                                                <th>School Supplies</th>
                                                <th>Others</th>
                                                <th>Total </th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                           <?php foreach($nurseryTuition as $nt):?>
                                                <tr>
                                                <td><?php echo $nt -> sc_SY ?> </td>
                                                <td><?php echo $nt -> sc_level ?> </td>
                                                <td><?php echo $nt -> sc_tuition ?> </td>
                                                <td><?php echo $nt -> sc_misc ?> </td>
                                                <td><?php echo $nt -> sc_books ?> </td>
                                                <td><?php echo $nt -> sc_gradFee ?> </td>
                                                <td><?php echo $nt -> sc_schoolSupp ?> </td>
                                                <td><?php echo $nt -> sc_others ?> </td>
                                                <td><?php echo $nt -> sc_total ?> </td>
                                            
                                                </tr>
                                                <?php endforeach?>
                                           </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->


                <!-- NEW ROW FOR NURSERY2 TUITION -->
                <!-- START -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Nursery 2 Tuition</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" data-order='[[ 0, "desc" ]]' id="dataTable"
                                        width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>School Year</th>
                                                <th>Level</th>
                                                <th>Tuition</th>
                                                <th>Miscelanious</th>
                                                <th>Books</th>
                                                <th>Graduation Fee</th>
                                                <th>School Supplies</th>
                                                <th>Others</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($nursery2Tuition as $nt2):?>
                                                <tr>
                                                <td><?php echo $nt2 -> sc_SY ?> </td>
                                                <td><?php echo $nt2 -> sc_level ?> </td>
                                                <td><?php echo $nt2 -> sc_tuition ?> </td>
                                                <td><?php echo $nt2 -> sc_misc ?> </td>
                                                <td><?php echo $nt2 -> sc_books ?> </td>
                                                <td><?php echo $nt2 -> sc_gradFee ?> </td>
                                                <td><?php echo $nt2 -> sc_schoolSupp ?> </td>
                                                <td><?php echo $nt2 -> sc_others ?> </td>
                                                <td><?php echo $nt2 -> sc_total ?> </td>
                                            
                                                </tr>
                                                <?php endforeach?>
                                           </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
                 <!-- NEW ROW FOR KINDER TUITION -->
                <!-- START -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Kinder Tuition</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" data-order='[[ 0, "desc" ]]' id="dataTable"
                                        width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>School Year</th>
                                                <th>Level</th>
                                                <th>Tuition</th>
                                                <th>Miscelanious</th>
                                                <th>Books</th>
                                                <th>Graduation Fee</th>
                                                <th>School Supplies</th>
                                                <th>Others</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($kinderTuition as $kt):?>
                                                <tr>
                                                <td><?php echo $kt -> sc_SY ?> </td>
                                                <td><?php echo $kt -> sc_level ?> </td>
                                                <td><?php echo $kt -> sc_tuition ?> </td>
                                                <td><?php echo $kt -> sc_misc ?> </td>
                                                <td><?php echo $kt -> sc_books ?> </td>
                                                <td><?php echo $kt -> sc_gradFee ?> </td>
                                                <td><?php echo $kt -> sc_schoolSupp ?> </td>
                                                <td><?php echo $kt -> sc_others ?> </td>
                                                <td><?php echo $kt -> sc_total ?> </td>
                                            
                                                </tr>
                                                <?php endforeach?>
                                           </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->

              

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php $this->load->view("template/footer") ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php $this->load->view("pages/home/homeModals/createTuition") ?>
    <?php $this->load->view("pages/home/modals/logoutSesh") ?>

    <!-- Load botHead -->
    <?php $this->load->view("template/bothead") ?>


</body>

</html>