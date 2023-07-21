<div class="modal fade" id="createTuition" tabindex="-1" role="dialog" aria-labelledby="createTuitionLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTuitionLabel">Create Tuition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                PROBLEM HINDI NALABAS YUNG CONSOLE LOG 
            </div>
            <!-- <div class="modal-body">
                <form id="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sc_SY" class="col-form-label">School Year</label>
                                <select class="form-control" name="sc_SY" id="sc_SY">
                                    <?php
                                    $currentYear = date('Y');
                                    $nextYear = $currentYear + 1;
                                    $schoolYearStart = date('Y-m-d', strtotime('June 15'));
                                    $schoolYearEnd = date('Y-m-d', strtotime('June 15 next year'));
                                    $schoolYearRange = $currentYear . '-' . $nextYear;
                                    ?>
                                    <option value="<?php echo $schoolYearRange ?>"><?php echo $schoolYearRange ?>
                                    </option>
                                    <?php while ($schoolYearStart < $schoolYearEnd) {
                                        $currentYear = date('Y', strtotime($schoolYearStart));
                                        $nextYear = $currentYear + 1;
                                        $schoolYearRange = $currentYear . '-' . $nextYear;
                                        ?>
                                        <option value="<?php echo $schoolYearRange ?>"><?php echo $schoolYearRange ?>
                                        </option>
                                        <?php
                                        $schoolYearStart = date('Y-m-d', strtotime($schoolYearStart . ' +1 year'));
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sc_level" class="col-form-label">Level</label>
                                <select class="form-control" name="sc_level" id="sc_level" required>
                                    <option value="1">Nursery</option>
                                    <option value="2">Nursery-2</option>
                                    <option value="3">Kinder</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-6">
                            <label for="sc_tuition" class="col-form-label">Tuition</label>
                            <input type="text" class="form-control" name="sc_tuition" id="sc_tuition" maxlength="15"
                                required>
                        </div>
                    <div class="col-6">
                            <label for="sc_misc" class="col-form-label">Miscellaneous</label>
                            <input type="text" class="form-control" name="sc_misc" id="sc_misc" maxlength="15"
                                required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-6">
                            <label for="sc_schoolSupp" class="col-form-label">School Supplies</label>
                            <input type="text" class="form-control" name="sc_schoolSupp" id="sc_schoolSupp" maxlength="15"
                                required>
                        </div>
                    <div class="col-6">
                            <label for="sc_others" class="col-form-label">Others</label>
                            <input type="text" class="form-control" name="sc_others" id="sc_others" maxlength="15"
                                required>
                        </div>
                    </div>
                </form>
            </div> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#createTuition').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        var baseurl = "<?php echo base_url() ?>"

        console.log('baseurl');

        // modal.find('.modal-footer button[type="submit"]').click(function () {
        //     var form = modal.find('#studentForm');
        //     // Check if the form is valid
        //     if (form[0].checkValidity() === false) {
        //         event.preventDefault();
        //         event.stopPropagation();
        //         form.addClass('was-validated');
        //         console.log(form);
        //         return;
        //     }

        //     var formData = form.serialize();

        //     var formValues = form.serializeArray();


        //     $.ajax({
        //         url: baseurl + 'enroll',
        //         type: 'POST',
        //         data: formData,
        //         dataType: 'json',

        //         success: function (response) {
        //             if (response.errors) {
        //                 var jsonparse = JSON.parse(response);
        //                 console.log(formData);
        //                 console.log(response.errors)
        //                 console.log(response);
        //             } else {
        //                 Swal.fire({
        //                     title: response.title,
        //                     icon: response.icon,
        //                     showConfirmButton: true
        //                 }).then(function () {
        //                     window.location.reload();
        //                 });
        //             }
        //             console.log(response);

        //         },
        //         error: function (xhr, status, error) {
        //             console.error(xhr.responseText);
        //         }
        //     });

        // });
    });
</script>