<?php include "up_header.php";
if ($_SESSION['user_role'] != 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.min_.css" />
<!-- Custom stlylesheet -->
<link rel="stylesheet" href="../css/adminstyle_.css">

<?php
if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 0 || $_SESSION['user_role'] == 5) {
    header("Location:{$hostname}/admin/up_user_profile.php");
}
include("config.php");
$category_index_by_addbar = $_GET['category_index'];
if (isset($_POST['sumbit'])) {
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name = $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg", "jpeg", "png", "webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name = date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/member/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
                print_r($file_error);
                die();
            }
        }
    }

    $for_who = mysqli_real_escape_string($conn, $_POST['for_who']);
    $member_name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $dot = mysqli_real_escape_string($conn, $_POST['dot']);
    $dol = mysqli_real_escape_string($conn, $_POST['dol']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $rang = mysqli_real_escape_string($conn, $_POST['rang']);
    $manglik = mysqli_real_escape_string($conn, $_POST['manglik']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $business = mysqli_real_escape_string($conn, $_POST['business']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pradesh = mysqli_real_escape_string($conn, $_POST['pradesh']);
    $jila = mysqli_real_escape_string($conn, $_POST['jila']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $fphone = mysqli_real_escape_string($conn, $_POST['fphone']);
    $fbusiness = mysqli_real_escape_string($conn, $_POST['fbusiness']);
    $fgotra = mysqli_real_escape_string($conn, $_POST['fgotra']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mgotra = mysqli_real_escape_string($conn, $_POST['mgotra']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $family = mysqli_real_escape_string($conn, $_POST['family']);
    $post_date = date("d M, Y");
    $sql_update_category = "UPDATE form_data SET 
        for_who =  '{$for_who}',
        name =  '{$member_name}',
        dob =  '{$dob}',
        dot =  '{$dot}',
        dol =  '{$dol}',
        height =  '{$height}',
        rang =  '{$rang}',
        manglik =  '{$manglik}',
        edu =  '{$education}',
        business =  '{$business}',
        state =  '{$state}',
        phone =  '{$phone}',
        email =  '{$email}',
        gender =  '{$gender}',
        address =  '{$address}',
        pradesh =  '{$pradesh}',
        jila =  '{$jila}',
        pincode =  '{$pincode}',
        fname =  '{$fname}',
        fphone =  '{$fphone}',
        fbusiness =  '{$fbusiness}',
        fgotra =  '{$fgotra}',
        mname =  '{$mname}',
        mgotra =  '{$mgotra}',
        location =  '{$location}',
        family =  '{$family}',
        img = '{$save_img_name}'
        WHERE id =  '{$category_index_by_addbar}'";
    if (mysqli_query($conn, $sql_update_category)) {
        ?>
        <script>alert('Details Updated successfully !!')</script>
        <?php
        echo "<script>window.location.href='$hostname/admin/up_user_profile.php'</script>";
    }
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="adin-heading">Update Member</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#E1412E; border-radius:16px;" href="member.php"><i
                        class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                $sql_show_category = "SELECT * FROM form_data WHERE id = '{$category_index_by_addbar}'";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Die!! --> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        // 
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label>फोटो</label>
                                <input type="file" name="new-image">
                                <img src="upload/member/<?php echo $row['img']; ?>"
                                    style="border-radius: 50%; margin-top:12px; width:150px; height:150px;" required>
                                <input type="hidden" name="old-image" value="<?php echo $row['img']; ?>">
                            </div>
                            <div class="form-group">
                                <label>किन्ह के लिए रिश्ता चाहिए :</label>
                                <select required class="form-control" name="for_who">
                                    <option value="<?php echo $row['for_who'] ?>" selected>
                                        <?php echo $row['for_who'] ?>
                                    </option>
                                    <option value="स्वयं" style="text-align:left;">1. स्वयं</option>
                                    <option value="भाई" style="text-align:left;">2. भाई</option>
                                    <option value="बहन" style="text-align:left;">3. बहन</option>
                                    <option value="पुत्र" style="text-align:left;">4. पुत्र</option>
                                    <option value="पुत्री" style="text-align:left;">5. पुत्री</option>
                                    <option value="अन्य" style="text-align:left;">5. अन्य</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>नाम : </label>
                                <input type="text" class="form-control" placeholder="नाम :" name="name" autocomplete="off"
                                    value="<?php echo $row['name'] ?>" required />
                            </div>
                            <div class="form-group">
                                <label>जन्म तिथि :</label>
                                <input type="text" class="form-control" value="<?php echo $row['dob'] ?>"
                                    placeholder="जन्म तिथि :" name="dob" autocomplete="off" onfocus="(this.type='date')" />
                            </div>
                            <div class="form-group">
                                <label>जन्म समय :</label>
                                <input type="text" class="form-control" placeholder="जन्म समय :"
                                    value="<?php echo $row['dot'] ?>" name="dot" autocomplete="off"
                                    onfocus="(this.type='time')" />
                            </div>
                            <div class="form-group">
                                <label>जन्म स्थान :</label>
                                <input type="text" class="form-control" placeholder="जन्म स्थान :" name="dol"
                                    value="<?php echo $row['dol'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>कद/उंचाई :</label>
                                <select class="form-control" name="height">
                                    <option>
                                        <?php echo $row['height'] ?>
                                    </option>
                                    <option value="3.5-4.0 feet">1. 3.5-4.0 feet</option>
                                    <option value="4.0-4.5 feet">2. 4.0-4.5 feet</option>
                                    <option value="4.5-5.0 feet">3. 4.5-5.0 feet</option>
                                    <option value="5.0-5.5 feet">4. 5.0-5.5 feet</option>
                                    <option value="5.5-6.0 feet">5. 5.5-6.0 feet</option>
                                    <option value="6.0-6.5 feet">6. 6.0-6.5 feet</option>
                                    <option value="6.5-7.0 feet">7. 6.5-7.0 feet</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>रंग :</label>
                                <select class="form-control" name="rang">
                                    <option selected>
                                        <?php echo $row['rang'] ?>
                                    </option>
                                    <option value="Gora">1. गोरा</option>
                                    <option value="Gerua">2. गेरूआ</option>
                                    <option value="Gerua">3. साॅवला</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>मांगलिक :</label>
                                <select class="form-control" name="manglik">
                                    <option selected>
                                        <?php echo $row['manglik'] ?>
                                    </option>
                                    <option value="हां">1. हां</option>
                                    <option value="नहीं">2. नहीं</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>शैक्षणिक योग्यता :</label>
                                <input type="text" class="form-control" placeholder="शैक्षणिक योग्यता :" name="education"
                                    autocomplete="off" value="<?php echo $row['edu'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>व्यवसाय :</label>
                                <input type="text" class="form-control" placeholder="व्यवसाय :" name="business"
                                    value="<?php echo $row['business'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>अविवाहित/तलाकशुदा/विधुर :</label>
                                <select class="form-control" name="state">
                                    <option selected>
                                        <?php echo $row['state'] ?>
                                    </option>
                                    <option value="अविवाहित">1. अविवाहित</option>
                                    <option value="तलाकशुदा">2. तलाकशुदा</option>
                                    <option value="विधुर">3. विधुर</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>मोबा./व्हाट्सएप नंबर :</label>
                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                                    value="<?php echo $row['phone'] ?>" placeholder="मोबा./व्हाट्सएप नंबर :" autocomplete="off"
                                    required />
                            </div>
                            <div class="form-group">
                                <label>ई-मेल :</label>
                                <input type="email" class="form-control" placeholder="ई-मेल :" name="email" autocomplete="off"
                                    value="<?php echo $row['email'] ?>" />
                            </div>
                            <div class="form-group">
                                <div class="maxl" name="gender" autocomplete="off">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="पुरूष" checked>
                                        <span> पुरूष </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="महिला">
                                        <span>महिला </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>निवास स्थान का पूर्ण पता :</label>
                                <input type="text" class="form-control" placeholder="निवास स्थान का पूर्ण पता :" name="address"
                                    value="<?php echo $row['address'] ?>" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>प्रदेश :</label>
                                <select class="form-control" name="pradesh">
                                    <option selected>
                                        <?php echo $row['pradesh'] ?>
                                    </option>
                                    <option value="मध्यप्रदेश">1. मध्यप्रदेश</option>
                                    <option value="उत्तरप्रदेश">2. उत्तरप्रदेश</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>जिला :</label>
                                <input type="text" class="form-control" placeholder="जिला :" name="jila" autocomplete="off"
                                    value="<?php echo $row['jila'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>पिनकोड :</label>
                                <input type="text" minlength="6" maxlength="10" class="form-control" placeholder="पिनकोड :"
                                    value="<?php echo $row['pincode'] ?>" name="pincode" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>पिता का नाम :</label>
                                <input type="text" class="form-control" placeholder="पिता का नाम :" name="fname"
                                    value="<?php echo $row['fname'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>पिता का मोबा. नंबर :</label>
                                <input type="text" minlength="10" maxlength="10" name="fphone" class="form-control"
                                    value="<?php echo $row['fphone'] ?>" placeholder="पिता का मोबा. नंबर :"
                                    autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>पिता का व्यवसाय :</label>
                                <input type="text" class="form-control" placeholder="पिता का व्यवसाय :" name="fbusiness"
                                    value="<?php echo $row['fbusiness'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>पिता का गोत्र :</label>
                                <input type="text" class="form-control" placeholder="पिता का गोत्र :" name="fgotra"
                                    value="<?php echo $row['fgotra'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>माता का नाम :</label>
                                <input type="text" class="form-control" placeholder="माता का नाम :" name="mname"
                                    value="<?php echo $row['mname'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>माता का गोत्र :</label>
                                <input type="text" class="form-control" placeholder="माता का गोत्र :" name="mgotra"
                                    value="<?php echo $row['mgotra'] ?>" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>किस लोकेशन में रिश्ता चाहिए :</label>
                                <input type="text" class="form-control" placeholder="किस लोकेशन में रिश्ता चाहिए :"
                                    value="<?php echo $row['location'] ?>" name="location" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>परिवार मे सदस्यों की संख्या :</label>
                                <input type="number" class="form-control" placeholder="परिवार मे सदस्यों की संख्या :"
                                    value="<?php echo $row['family'] ?>" name="family" autocomplete="off" />
                            </div>
                            <input type="submit" name="sumbit" style="border-radius:16px;" class="btn btn-primary"
                                value="Update" required />
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "up_footer.php"; ?>