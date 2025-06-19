<style>
    .wrapper {
        padding: 100px;
    }

    .image--cover {
        width: 150px;
        height: 150px;
        border-radius: 50%;

        object-fit: cover;
        object-position: center right;
    }
</style>

<?php

$id = $_REQUEST['id'];
if ($id > 0) {
    $db->sql = "SELECT * FROM users WHERE id=" . $id;
    $user = $db->select(1);

    $id = $user->id;
    $first_name = $user->first_name;
    $last_name = $user->last_name;
    $username = $user->username;
    $email = $user->email;
    $phone_number = $user->phone_number;
    $password = $user->password;
    $role = $user->role;

} else {

    $id = "";
    $first_name = "";
    $last_name = "";
    $username = "";
    $email = "";
    $phone_number = "";
    $password = "";
    $role = 0;
}

?>





<form id="form1" class="row">





    <div class="col-12">
        <div class="form-group">
            <span>Fist Name :</span>
            <input type="text" class="form-control" id="first_name" name="first_name"
                placeholder="Enter Your First Name" value="<?php echo $first_name; ?>">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <span>Last Name :</span>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Your Last Name"
                value="<?php echo $last_name; ?>">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <span>User Name :</span>
            <input type="password" class="form-control" id="username" name="username" placeholder="Enter Your User Name"
                value="<?php echo $username; ?>">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <span>E-Mail :</span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your E-Mail"
                value="<?php echo $email; ?>">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <span>Password :</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password"
                value="<?php echo $password; ?>">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <span>Phone Number :</span>
            <input type="phone" class="form-control" id="phone_number" name="phone_number"
                placeholder="Enter Your Phone Number" value="<?php echo $phone_number; ?>">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="role">User Role:</label>
            <select class="form-control" id="role" name="role">
                <option value="0" <?php echo ($role == 0) ? 'selected' : ''; ?>>Not a Member</option>
                <option value="1" <?php echo ($role == 1) ? 'selected' : ''; ?>>Member</option>
                <option value="2" <?php echo ($role == 2) ? 'selected' : ''; ?>>Administrator</option>
            </select>
        </div>
    </div>


    <!-- GÖRSEL YÜKLEME -->
    <?php
    $file_count = 0;
    if ($id > 0) {
        ?>
        <div class="col-12 mt-2 mb-2">
            <div class="row">
                <!-- Dosya Yükleme Tetikleyici -->
                <div class="col-12 col-sm-12 col-md-12 text-center p-2 " onclick="$('#dosya').click();">
                    <div class="bg-secondary text-light rounded zoom-hover">
                        <i class="fas fa-folder-plus "></i> <br>
                        Profile Picture
                    </div>
                </div>

                <!-- Gizli dosya inputu -->
                <input type="file" id="dosya" style="display: none;"
                    onchange="dosyaGonder('user', <?php echo $id; ?>,0, 'kaydet', 'user');">

                <?php
                $db->sql = "SELECT * FROM dosya WHERE yer='user' AND alt_id=$id AND ust_id=0";
                $imgs = $db->select();
                if ($imgs && $id > 0) {
                    $file_count = 1;
                    foreach ($imgs as $value) { ?>
                        <div class="col-6 col-sm-4 col-md-4 text-right " id="dos_id_<?php echo $value->id; ?>">
                            <div class="bg-dark rounded cursor-pointer text-center" style="overflow: hidden;"
                                onclick="$('#dosil_<?php echo $value->id; ?>').toggle('fast');">
                                <br>
                                <img src="uploads/user/<?php echo $value->dosya_adi; ?>" alt="" style="width: 120px; height: 120px;">
                            </div>
                            <div id="dosil_<?php echo $value->id; ?>" style="display: none;">
                                <a href="<?php echo 'uploads/' . $value->yer . '/' . $value->dosya_adi; ?>" download>
                                    <i class="fa fa-download text-primary zoom-hover"></i>
                                </a>
                                <i class="fa fa-trash text-danger zoom-hover"
                                    onclick="$('#dos_id_<?php echo $value->id; ?>').hide('fast'); var b = 'id=<?php echo ($value->id * -1); ?>&tablo_adi=dosya'; kaydet(b,0);"></i>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    <?php } ?>

    <input type="hidden" id="file_count" value="<?php echo $file_count; ?>">
    <input type="hidden" name="id" id="users_id" value="<?php echo $_REQUEST['id']; ?>">
    <input type="hidden" name="tablo_adi" value="users">
</form>


<div class="row">

    <div class="col-12 border mb-1"></div>

    <div class="col-12 d-flex justify-content-end">

        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

        <button type="button" class="btn bg-gradient-primary" onclick=" 
                        kaydet($('#form1').serialize());  
                        $('#exampleModal').modal('hide');
                    
                        $('#example').load('index.php?url=ajax/settings_list');
                        location.reload();
                        ">Save</button>
    </div>


</div>






<script>


    $("#exampleModal .modal-css").removeClass("modal-lg");
</script>