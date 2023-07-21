<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	
	$this->load->view("template/tophead");
	
	?>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php $this->load->view("template/sidebar");?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
               <?php $this->load->view("template/header"); ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaction Log</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transaction Log</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" data-order='[[ 0, "desc" ]]' id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <!-- <th>ID</th> -->
                                            <th>Name</th>
                                            <th>OR Number</th>
                                            <th>Date of Payment</th>
                                            <th>Remarks</th>
                                            <th>Amount Paid</th>
                                            <th>Received by: </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment): 
                                        
                                            ?>
                                    
                                        <tr>
                                            <td><?php echo $payment-> id?></td>
                                            <!-- <td><?php echo $payment-> st_id?></td> -->
                                            <td><?php echo $payment-> name?></td>
                                            <td><?php echo $payment-> or_number?></td>
                                            <td><?php echo $payment-> date_paid?></td>
                                            <td><?php echo $payment-> remarks?></td>
                                            <td><?php echo $payment-> amount_paid?></td> 
                                            <td><?php echo $payment-> received_by?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("template/footer")?> 
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
   
    <?php $this->load->view("pages/home/modals/logoutSesh")?>

<!-- Load botHead -->
<?php $this->load->view("template/bothead")?>


</body>

</html>