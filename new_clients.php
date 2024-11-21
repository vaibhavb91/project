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
            <option value="Male" <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?php echo isset($gender) && $gender == 'Other' ? 'selected' : '' ?>>Other</option>
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
            <option value="Andaman and Nicobar Islands" <?php echo isset($state) && $state == 'Andaman and Nicobar Islands' ? 'selected' : '' ?>>Andaman and Nicobar Islands</option>
            <option value="Andhra Pradesh" <?php echo isset($state) && $state == 'Andhra Pradesh' ? 'selected' : '' ?>>Andhra Pradesh</option>
            <option value="Arunachal Pradesh" <?php echo isset($state) && $state == 'Arunachal Pradesh' ? 'selected' : '' ?>>Arunachal Pradesh</option>
            <option value="Assam" <?php echo isset($state) && $state == 'Assam' ? 'selected' : '' ?>>Assam</option>
            <option value="Bihar" <?php echo isset($state) && $state == 'Bihar' ? 'selected' : '' ?>>Bihar</option>
            <option value="Chandigarh" <?php echo isset($state) && $state == 'Chandigarh' ? 'selected' : '' ?>>Chandigarh</option>
            <option value="Chhattisgarh" <?php echo isset($state) && $state == 'Chhattisgarh' ? 'selected' : '' ?>>Chhattisgarh</option>
            <option value="Dadra and Nagpur Haveli" <?php echo isset($state) && $state == 'Dadra and Nagpur Haveli' ? 'selected' : '' ?>>Dadra and Nagpur Haveli</option>
            <option value="Daman and Diu" <?php echo isset($state) && $state == 'Daman and Diu' ? 'selected' : '' ?>>Daman and Diu</option>
            <option value="Delhi" <?php echo isset($state) && $state == 'Delhi' ? 'selected' : '' ?>>Delhi</option>
            <option value="Goa" <?php echo isset($state) && $state == 'Goa' ? 'selected' : '' ?>>Goa</option>
            <option value="Gujarat" <?php echo isset($state) && $state == 'Gujarat' ? 'selected' : '' ?>>Gujarat</option>
            <option value="Haryana" <?php echo isset($state) && $state == 'Haryana' ? 'selected' : '' ?>>Haryana</option>
            <option value="Himachal Pradesh" <?php echo isset($state) && $state == 'Himachal Pradesh' ? 'selected' : '' ?>>Himachal Pradesh</option>
            <option value="Jammu and Kashmir" <?php echo isset($state) && $state == 'Jammu and Kashmir' ? 'selected' : '' ?>>Jammu and Kashmir</option>
            <option value="Jharkhand" <?php echo isset($state) && $state == 'Jharkhand' ? 'selected' : '' ?>>Jharkhand</option>
            <option value="Karnataka" <?php echo isset($state) && $state == 'Karnataka' ? 'selected' : '' ?>>Karnataka</option>
            <option value="Kerala" <?php echo isset($state) && $state == 'Kerala' ? 'selected' : '' ?>>Kerala</option>
            <option value="Lakshadweep" <?php echo isset($state) && $state == 'Lakshadweep' ? 'selected' : '' ?>>Lakshadweep</option>
            <option value="Madhya Pradesh" <?php echo isset($state) && $state == 'Madhya Pradesh' ? 'selected' : '' ?>>Madhya Pradesh</option>
            <option value="Maharashtra" <?php echo isset($state) && $state == 'Maharashtra' ? 'selected' : '' ?>>Maharashtra</option>
            <option value="Manipur" <?php echo isset($state) && $state == 'Manipur' ? 'selected' : '' ?>>Manipur</option>
            <option value="Meghalaya" <?php echo isset($state) && $state == 'Meghalaya' ? 'selected' : '' ?>>Meghalaya</option>
            <option value="Mizoram" <?php echo isset($state) && $state == 'Mizoram' ? 'selected' : '' ?>>Mizoram</option>
            <option value="Nagaland" <?php echo isset($state) && $state == 'Nagaland' ? 'selected' : '' ?>>Nagaland</option>
            <option value="Narora" <?php echo isset($state) && $state == 'Narora' ? 'selected' : '' ?>>Narora</option>
            <option value="Natwar" <?php echo isset($state) && $state == 'Natwar' ? 'selected' : '' ?>>Natwar</option>
            <option value="Odisha" <?php echo isset($state) && $state == 'Odisha' ? 'selected' : '' ?>>Odisha</option>
            <option value="Paschim Medinipur" <?php echo isset($state) && $state == 'Paschim Medinipur' ? 'selected' : '' ?>>Paschim Medinipur</option>
            <option value="Pondicherry" <?php echo isset($state) && $state == 'Pondicherry' ? 'selected' : '' ?>>Pondicherry</option>
            <option value="Rajasthan" <?php echo isset($state) && $state == 'Rajasthan' ? 'selected' : '' ?>>Rajasthan</option>
            <option value="Sikkim" <?php echo isset($state) && $state == 'Sikkim' ? 'selected' : '' ?>>Sikkim</option>
            <option value="Tamil Nadu" <?php echo isset($state) && $state == 'Tamil Nadu' ? 'selected' : '' ?>>Tamil Nadu</option>
            <option value="Telangana" <?php echo isset($state) && $state == 'Telangana' ? 'selected' : '' ?>>Telangana</option>
            <option value="Tripura" <?php echo isset($state) && $state == 'Tripura' ? 'selected' : '' ?>>Tripura</option>
            <option value="Uttar Pradesh" <?php echo isset($state) && $state == 'Uttar Pradesh' ? 'selected' : '' ?>>Uttar Pradesh</option>
            <option value="Uttarakhand" <?php echo isset($state) && $state == 'Uttarakhand' ? 'selected' : '' ?>>Uttarakhand</option>
            <option value="Vaishali" <?php echo isset($state) && $state == 'Vaishali' ? 'selected' : '' ?>>Vaishali</option>
            <option value="West Bengal" <?php echo isset($state) && $state == 'West Bengal' ? 'selected' : '' ?>>West Bengal</option>
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
                <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=clients_list'">Cancel</button>
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
