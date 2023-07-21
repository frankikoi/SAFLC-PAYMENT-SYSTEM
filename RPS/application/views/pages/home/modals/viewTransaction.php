<div class="modal fade bd-example-modal-lg" id='viewModal' tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Transaction log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <table data-order='[[ 3, "desc" ]]' width="100%" cellspacing="0" id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>OR Number</th>
                            <th>Date of Payment</th>
                            <th>Remarks</th>
                            <th>Received By:</th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>


    <script>
$(document).ready(function () {
    $('.btn_view').on('click', function () {
        var getID = $(this).closest('tr').find('.id').text();
        var url = "<?php echo base_url('view?id=') ?>" + getID;

        $.ajax({
            url: url + getID,
            type: "GET",
            data: {id: getID},
            dataType: "json",
            success: function(response) {
                $('#example').DataTable().destroy();

                $('#example tbody').empty();

                for (var i = 0; i < response.length; i++) {
                    var row = response[i];
                    var tableRow = "<tr>" +
                        "<td>" + row.st_id + "</td>" +
                        "<td>" + row.or_number + "</td>" +
                        "<td>" + row.date_paid + "</td>" +
                        "<td>" + row.remarks + "</td>" +
                        "<td>" + row.received_by + "</td>" +
                        "<td>" + row.amount_paid + "</td>" +
                        "</tr>";
                    $('#example tbody').append(tableRow);
                }
                
                var table = $('#example').DataTable({
                    pageLength: 10 // Adjust this value according to your desired number of entries per page
                });

                table.rows().invalidate().draw(); // Update data count and redraw the table
                $('#viewModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});
</script>
