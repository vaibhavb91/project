<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="" id="manage-client">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
             
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($name) ? $name : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Birth Date</label>
                            <input type="date" class="form-control form-control-sm" name="birth_date" value="<?php echo isset($birth_date) ? $birth_date : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Age</label>
                            <input type="number" class="form-control form-control-sm" name="age" value="<?php echo isset($age) ? $age : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <select class="form-control form-control-sm" name="gender">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Mobile No.</label>
                            <input type="text" class="form-control form-control-sm" name="mobile_no" value="<?php echo isset($mobile_no) ? $mobile_no : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Alternative No.</label>
                            <input type="text" class="form-control form-control-sm" name="alternative_no" value="<?php echo isset($alternative_no) ? $alternative_no : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                                    
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" class="form-control form-control-sm" name="address" value="<?php echo isset($address) ? $address : '' ?>">
                            </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">State</label>
                            <select class="form-control form-control-sm" name="state">
                            <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            </select>
                        </div>
                    </div>                </div>
                <div class="row">
                  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Pincode</label>
                            <input type="text" class="form-control form-control-sm" name="pincode" value="<?php echo isset($pincode) ? $pincode : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Email-ID</label>
                            <input type="email" class="form-control form-control-sm" name="email" value="<?php echo isset($email) ? $email : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Referred By</label>
                            <input type="text" class="form-control form-control-sm" name="referred_by" value="<?php echo isset($referred_by) ? $referred_by : '' ?>">
                        </div>
                    </div>
                </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <button class="btn btn-flat bg-gradient-primary mx-2" form="manage-client">Save</button>
                <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=client_list'">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#manage-client').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_client',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast('Data successfully saved',"success");
                    setTimeout(function(){
                        location.href = 'index.php?page=clients_list'
                    },2000)
                }
            }
        })
    })
</script>
