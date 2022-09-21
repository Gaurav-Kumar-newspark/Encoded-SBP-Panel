<?php 
if(isset($admindetails) && !empty($admindetails))
{
    $adminID = (isset($admindetails->id) && !empty($admindetails->id))?$admindetails->id:"";
    $firstname = (isset($admindetails->firstname) && !empty($admindetails->firstname))?$admindetails->firstname:"";
    $lastname = (isset($admindetails->lastname) && !empty($admindetails->lastname))?$admindetails->lastname:"";
    $email = (isset($admindetails->email) && !empty($admindetails->email))?$admindetails->email:"";
    $phonenumber = (isset($admindetails->phonenumber) && !empty($admindetails->phonenumber))?$admindetails->phonenumber:"";
    ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <h3>Update User </h3>
                <h4># <?php echo $adminID; ?> - <?php echo $email; ?></h4>
                <ol class="breadcrumb m-b-10"><li class="breadcrumb-item active"><a href="<?php echo base_url('/dashboard'); ?>">Dashboard</a></li><li class="breadcrumb-item active">My Account</li></ol>

                <?php 
                  if(isset($formresponse) && !empty($formresponse))
                    {
                        echo $formresponse;
                    }
                  if(isset($errors) && !empty($errors))
                    {
                        ?>
                                <span class="alert alert-danger">
                                <?php 
                                foreach ($errors as $erroris) 
                                {
                                    echo $erroris."<br>";
                                }
                                ?>
                                </span>
                        <?php
                    }
                echo form_open('updateuser'); ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Email<sup class="require">*</sup></span>
                          </div>
                          <?php 
                          $data = [
                                'type'  => 'email',
                                'id'    => 'email',
                                'value' => $email,
                                'class' => 'form-control',
                                'placeholder' => 'Email',
                                'readonly' => '',
                            ];

                            echo form_input($data);
                          ?>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">First Name<sup class="require">*</sup></span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["firstname"]) && !empty($errors["firstname"]))?"addredborder":"";
                          $data = [
                                'type'  => 'text',
                                'name'    => 'firstname',
                                'id'    => 'firstname',
                                'value' => (!empty(set_value('firstname')))?set_value('firstname'):$firstname,
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'First Name'
                            ];

                            echo form_input($data);
                          ?>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Last Name<sup class="require">*</sup></span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["lastname"]) && !empty($errors["lastname"]))?"addredborder":"";
                          $data = [
                                'type'  => 'text',
                                'name'    => 'lastname',
                                'id'    => 'lastname',
                                'value' => (!empty(set_value('lastname')))?set_value('lastname'):$lastname,
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'Last Name'
                            ];

                            echo form_input($data);
                          ?><!-- 
                          <input type="text" name="lastname" value="User" id="lastname" class="form-control" placeholder="Last Name" required=""> -->
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Phone Number<sup class="require">*</sup></span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["phonenumber"]) && !empty($errors["phonenumber"]))?"addredborder":"";
                          $data = [
                                'type'  => 'text',
                                'name'    => 'phonenumber',
                                'id'    => 'phonenumber',
                                'value' => (!empty(set_value('phonenumber')))?set_value('phonenumber'):$phonenumber,
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'Phone Number'
                            ];

                            echo form_input($data);
                          ?><!-- 
                          <input type="text" name="lastname" value="User" id="lastname" class="form-control" placeholder="Last Name" required=""> -->
                       </div>
                    </div>
                    <div class="col-md-12 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="text-small">If you wish to change password; enter the new password in the below fields and click on 'Update'</span>
                          </div>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group password">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Password</span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["password"]) && !empty($errors["password"]))?"addredborder":"";
                          $data = [
                                'type'  => 'password',
                                'name'    => 'password',
                                'id'    => 'password-field',
                                'value' => (!empty(set_value('password')))?set_value('password'):"",
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'Password'
                            ];

                            echo form_input($data);
                          ?>
                          <!-- <input type="password" name="password" value="" id="password-field" class="form-control" placeholder="Password"> -->
                          <span toggle="#password-field" class="toggle-password"><img width="20px;" height="20px;" style="margin: 4px;" src="<?php echo base_url('/images/icons/visibility.png');?>"></span>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group password">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Confirm Password</span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["confirmpassword"]) && !empty($errors["confirmpassword"]))?"addredborder":"";
                          $data = [
                                'type'  => 'password',
                                'name'    => 'confirmpassword',
                                'id'    => 'passwordhash',
                                'value' => (!empty(set_value('confirmpassword')))?set_value('confirmpassword'):"",
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'Confirm Password'
                            ];

                            echo form_input($data);
                          ?>
                          <!-- <input type="password" name="confirmpassword" value="" id="passwordhash" class="form-control" placeholder="Confirm Password"> -->
                          <span toggle="#passwordhash" class="toggle-password"><img width="20px;" height="20px;" style="margin: 4px;" src="<?php echo base_url('/images/icons/visibility.png');?>"></span>
                       </div>
                    </div>
                    <div class="col-md-12 mb-3">
                       <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="text-small">Please confirm your admin password to add or make changes to administrator account details</span>
                          </div>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <div class="input-group password">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend">Current Password</span>
                          </div>
                          <?php 
                          $errorboderclass = (isset($errors["currentpassword"]) && !empty($errors["currentpassword"]))?"addredborder":"";
                          $data = [
                                'type'  => 'password',
                                'name'    => 'currentpassword',
                                'id'    => 'currentpasssec',
                                'value' => (!empty(set_value('currentpassword')))?set_value('currentpassword'):"",
                                'class' => 'form-control '.$errorboderclass,
                                'placeholder' => 'Current Password'
                            ];

                            echo form_input($data);
                          ?>
                          <!-- <input type="password" name="currentpassword" value="" id="currentpasssec" class="form-control" placeholder="Current Password"> -->
                          <span toggle="#currentpasssec" class="toggle-password"><img width="20px;" height="20px;" style="margin: 4px;" src="<?php echo base_url('/images/icons/visibility.png');?>"></span>
                       </div>
                    </div>
                    <p class="text-center col-md-12">
                       <button name="updatedetails" value="update" type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update <i class="fa fa-angle-right"></i></button>
                       <a href="<?php echo base_url('/updateuser'); ?>" class="btn waves-effect waves-light btn-rounded btn-outline-secondary" onclick="history.go(-1); return false;">Cancel <i class="ti-close"></i></a>
                    </p>
                </div>
                <?php echo form_close(); ?>   
            </div>
        </div>
    </section>
    <?php
}
else
{
    echo "<center>wrong request..</center>";
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".addredborder").click(function(){
            $(this).removeClass("addredborder");
        });
        $(".toggle-password").click(function(){
            tab = $(this).attr("toggle");
            currentv = $(this).data("currentv");
            if(currentv != "on")
            {
                $(tab).attr("type","text");
                $(this).data("currentv","on");
                $(this).find("img").attr("src","<?php echo base_url('/images/icons/visibility-hide.png');?>");
            }
            else
            {
                $(tab).attr("type","password");
                $(this).data("currentv","off");
                $(this).find("img").attr("src","<?php echo base_url('/images/icons/visibility.png');?>");
            }

        });
    });
</script>