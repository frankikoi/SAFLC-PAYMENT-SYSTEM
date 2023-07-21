<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enroll Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="studentForm">
                    <div class="row">
                        <div class="col-4">
                            <label for="st_fName" class="col-form-label">First Name</label>
                            <input type="text" class="form-control" name="st_fName" id="st_fName" maxlength="15"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="st_mName" class="col-form-label">Middle Name</label>
                            <input type="text" class="form-control" name="st_mName" id="st_mName" maxlength="15"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="st_lName" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" name="st_lName" id="st_lName" maxlength="15"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <!-- StudentID -->
                            <input type="text" class="form-control" name="st_id" id="st_id" hidden>
                        </div>
                        <div class="col-12">
                            <label for="st_level" class="col-form-label">Level</label>
                            <select class="form-control" name="st_level" id="st_level" required>
                                <option value='1'>Nursery</option>
                                <option value='2'>Nursery-2</option>
                                <option value='3'>Kinder</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <!-- <label for="st_dateEnrolled" class="col-form-label">Student ID</label> -->
                            <input type="hidden" name="st_dateEnrolled" id="st_dateEnrolled"
                                value="<?php echo date('Y-m-d') ?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="st_SY" class="col-form-label">School Year</label>
                            <select class="form-control" name="st_SY" id="st_SY">
                                <?php
                                $currentYear = date('Y');
                                $nextYear = $currentYear + 1;
                                $schoolYearStart = date('Y-m-d', strtotime('June 15'));
                                $schoolYearEnd = date('Y-m-d', strtotime('June 15 next year'));
                                $schoolYearRange = $currentYear . '-' . $nextYear;
                                ?>
                                <option value="<?php echo $schoolYearRange ?>"><?php echo $schoolYearRange ?></option>
                                <?php while ($schoolYearStart < $schoolYearEnd) {
                                    $currentYear = date('Y', strtotime($schoolYearStart));
                                    $nextYear = $currentYear + 1;
                                    $schoolYearRange = $currentYear . '-' . $nextYear;
                                    ?>
                                    <option value="<?php echo $schoolYearRange ?>"><?php echo $schoolYearRange ?></option>
                                    <?php
                                    $schoolYearStart = date('Y-m-d', strtotime($schoolYearStart . ' +1 year'));
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" name="st_ToP" id="st_ToP" value="1" hidden>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        var baseurl = "<?php echo base_url() ?>"

        console.log(baseurl);

        modal.find('.modal-footer button[type="submit"]').click(function () {
            var form = modal.find('#studentForm');
            // Check if the form is valid
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.addClass('was-validated');
                console.log(form);
                return;
            }

            var formData = form.serialize();

            var formValues = form.serializeArray();


            $.ajax({
                url: baseurl + 'enroll',
                type: 'POST',
                data: formData,
                dataType: 'json',

                success: function (response) {
                    if (response.errors) {
                        var jsonparse = JSON.parse(response);
                        console.log(formData);
                        console.log(response.errors)
                        console.log(response);
                    } else {
                        Swal.fire({
                            title: response.title,
                            icon: response.icon,
                            showConfirmButton: true
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                    console.log(response);

                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

        });
    });
</script>