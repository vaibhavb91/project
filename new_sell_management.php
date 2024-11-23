<?php if (!isset($conn)) { include 'db_connect.php'; } ?>

<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="" id="manage-sale">
                <div class="row">
                    <!-- Date Picker -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" class="form-control form-control-sm" name="date" required>
                        </div>
                    </div>
                    
                    <!-- Client Dropdown -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Client</label>
                            <select class="form-control form-control-sm" name="client_id" id="client_id" required>
                                <option value="">Select Client</option>
                                <?php
                                $clients = $conn->query("SELECT id, name FROM clients ORDER BY name ASC");
                                while ($row = $clients->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Autofetch Address and Mobile Number -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control form-control-sm" name="address" id="address" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <input type="text" class="form-control form-control-sm" name="mobile_no" id="mobile" readonly>                            </div>
                    </div>
                </div>

                <!-- Service Details and Payment Type -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Service Details</label>
                            <textarea class="form-control form-control-sm" name="service_details" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Cash Type</label>
                            <select class="form-control form-control-sm" name="cash_type" required>
                                <option value="online">Online</option>
                                <option value="cash">Cash</option>
                                <option value="check">Check</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Amount, GST, and Total -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Amount</label>
                            <input type="number" class="form-control form-control-sm" name="amount" id="amount" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">GST Amount</label>
                            <input type="number" class="form-control form-control-sm" name="gst_amount" id="gst_amount" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Total</label>
                            <input type="number" class="form-control form-control-sm" name="total" id="total" readonly>
                        </div>
                    </div>
                </div>

                <div class="card-footer border-top border-info">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button class="btn btn-flat bg-gradient-primary mx-2" form="manage-sale">Save</button>
                        <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=sell_list'">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Autofill address and mobile number based on selected client
    $('#client_id').change(function () {
    var clientId = $(this).val();
    
    if (clientId != '') {
        $.ajax({
            url: 'get_client_details.php',  // Ensure this path is correct
            method: 'POST',
            data: { action: 'get_client_details', client_id: clientId },
            dataType: 'json',
            success: function (resp) {
                if (resp) {
                    $('#address').val(resp.address);
                    $('#mobile').val(resp.mobile_no);
                } else {
                    $('#address').val('');
                    $('#mobile').val('');
                    console.log('No data found for this client.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching client details:', error);
            }
        });
    } else {
        $('#address').val('');
        $('#mobile').val('');
    }
});


    // Calculate total based on amount and GST amount
    $('#amount, #gst_amount').on('input', function () {
        var amount = parseFloat($('#amount').val()) || 0;
        var gstAmount = parseFloat($('#gst_amount').val()) || 0;
        var total = amount + gstAmount;
        $('#total').val(total.toFixed(2));
    });

    // Submit form
    $('#manage-sale').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'ajax.php?action=save_sale',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function (resp) {
                if (resp == 1) {
                    alert('Data successfully saved');
                    setTimeout(function () {
                        location.href = 'index.php?page=sell_list';
                    }, 2000);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error saving data:', error);
            }
        });
    });
</script>
