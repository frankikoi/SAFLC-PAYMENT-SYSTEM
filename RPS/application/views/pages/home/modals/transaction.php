<div class="modal fade" id="transModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form id="paymentForm1" >
                    <div class="row">
                        <div class="col-6">
                            <label for="st_fullName" class="col-form-label">Full Name</label>
                            <input type="text" class="form-control text-center" name="st_FN" id="st_FN" readonly>
                        </div>
                        <div class="col-6">
                            <label for="st_level1" class="col-form-label">Level</label>
                            <input type="text" class="form-control text-center" name="st_level1" id="st_level1" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="st_remarks" class="col-form-label">Remarks</label>
                            <select class="form-control text-center" name="st_remarks" id="st_remarks">
                                <option disabled>--Select Option--</option>
                                <option>Full Payment</option>
                                <option>DownPayment</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="st_SY1" class="col-form-label">School Year</label>
                            <input type="text" class="form-control text-center" name="st_SY1" id="st_SY1" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="st_OR" class="col-form-label">Official Receipt</label>
                            <input type="text" class="form-control text-center" name="st_OR" id="st_OR" readonly>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <label for="st_amount" class="col-form-label">Amount Paid</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-currency-peso">₱</i></span>
                                <input type="number" class="form-control" name="st_amount" id="st_amount" required>
                            </div>
                        </div>

                        <div class="col-6">
                        <label for="st_receiver" class="col-form-label">Received By:</label>
                            <select class="form-control text-center" name="st_receiver" id="st_receiver">
                                <option>Jem</option>
                                <option>Franco</option>
                                <option>Agathei</option>
                                <option>Emyh</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control text-center" name="st_ID" id="st_ID" hidden >
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control text-center" name="st_remaining" id="st_remaining" hidden >
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        
            </form>
        </div>
    </div>
</div>

<script>
    $('.btn_trans').on('click', function() {
    
        const or = generateRandomString();
        var transact = $(this).closest('tr').find('.id').text();
        $tr = $(this).closest("tr");
        var data = $tr.children('td').map(function() {
            return $.trim(this.textContent);
        }).get();

        
        console.log(data);
        console.log(transact);

        function generateRandomString() {
            var characters = '0123456789';
            var currentDate = new Date();
            var year = currentDate.getFullYear().toString().substr(-2);
            var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
            let result = year + month + '-';
            
            for (let i = 0; i < 5; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                result += characters.charAt(randomIndex);
            }
            
            return result;
            }

            console.log(0);
            console.log(data[1]);
        $('#st_ID').val(data[0]);
        $('#st_FN').val(data[1]);
        $('#st_level1').val(data[2]);
        $('#st_SY1').val(data[3]);
        $('#st_total').val(data[4]);
        if (data[5] == "No Balance") {
            $('#st_remaining').val(0)
        }else{
            $('#st_remaining').val(data[5]);
        }
        $('#st_OR').val(or);
    });
    $(document).ready(function(){
        var url = "<?php echo base_url("payment")?>";
        $('#paymentForm1').submit(function(e){
            e.preventDefault(); // prevent the default form submission
            console.log(url);
            console.log($('#paymentForm1').serialize());
            

            $.ajax({
                url: url,
                type: 'post',
                data: $('#paymentForm1').serialize(),
                success: function(response){
                    jsonResponse = JSON.parse(response);
                    Swal.fire({
                    title: jsonResponse.title,
                    icon : jsonResponse.icon,
                    showConfirmButton: true
                }).then(function(){
                    window.location.reload();
                })
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        });
    });
        
</script>