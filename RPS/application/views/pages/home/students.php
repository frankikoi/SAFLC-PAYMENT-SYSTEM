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
                        <h1 class="h3 mb-0 text-gray-800">Students</h1>
                               <button type="button" id="btn_enroll" class="btn btn-primary btn_enroll" data-toggle="modal" data-target="#exampleModal" >Enroll Student</button>

                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table data-order='[[ 0, "desc" ]]' class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <!-- <th>Guardian</th>
                                            <th>Contact Number </th>
                                            <th>Date Enrolled</th> -->
                                            <!-- <th>Type of Payment</th> -->
                                            <th>School Year</th>
                                            <th>Tuition</th>
                                            <th>Balance</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($students as $student): ?>
                                            <?php $student-> st_balance = $student->st_total - $student->st_payable;
                                                  $middle = ucfirst(substr($student->st_mName, 0, 1));

                                            ?>

                                        <tr>
                                            <td class = 'id' name='id' id='id'><?php echo $student-> st_id?></td>
                                            <td class = 'st_name' name='st_name' id='st_name'><?php echo $student-> st_fName . ' ' . $middle . '.' . ' ' . $student->st_lName?></td>
                                            <td class = 'st_level'><?php echo $student-> st_level?></td>
                                            <!-- <td><?php echo $student-> st_email?></td>
                                            <td><?php echo $student-> st_cNumber?></td> -->
                                            <!-- <td class = 'st_typePayment' name ='st_typePayment' id='st_typePayment'><?php echo $student-> st_typePayment?></td> -->
                                            <!-- <td><?php echo $student-> st_dateEnrolled?></td>  -->
                                            
                                            <td class = 'st_SY' name = 'st_SY' id = 'st_Sy'><?php echo $student-> st_SY?></td>
                                            <td class = 'st_total' name = 'st_total' id = 'st_total'><?php echo $student-> st_total?></td>
                                            <!-- <td class = 'st_payable' name = 'st_payable' id = 'st_payable'><?php echo $student-> st_payable?></td> -->
                                            <td><?php 
                                                        if ($student->st_balance == 0) {
                                                            echo "No Balance";
                                                        }else 
                                                            echo $student-> st_balance?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning btn-sm btn_trans" data-toggle="modal" data-target="#transModal">&#8369</button>

                                                <button type="button" class="btn btn-danger btn-sm btn_view" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye"></i></button>
                                            </td>
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
<?php 

$this->load->view("template/bothead");
// <!-- Load Modals -->
$this->load->view("pages/home/modals/addStudent");
$this->load->view("pages/home/modals/transaction");
$this->load->view("pages/home/modals/viewTransaction");
?>

<!-- <script>
    $(document).ready(function() {
    $("#studentForm").validate();
  });
  
    </script> -->

</body>

</html>