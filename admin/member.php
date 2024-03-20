<?php include "header.php";
include("config.php");
if ($_SESSION['user_role'] == 9) {
    echo "<script>window.location.href='$hostname/admin/up_user_profile.php'</script>";
}
if ($_SESSION['user_role'] == 5) {
    echo "<script>window.location.href='$hostname/admin/astro_admin.php'</script>";
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="admin-heading">All Member</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" style="background:#1d6f42; border-radius:16px;" href="exportToExcel.php">Export</a>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="../membership_form.php" style="border-radius:16px;">ADD MEMBER</a>
            </div>
            <div class="col-md-12" style="overflow:scroll">
                <table class="content-table">
                    <thead>
                        <th>क्रं.</th>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                            <th>Edit</th>
                            <?php
                        }
                        ?>

                        <th>Assign</th>
                        <th>Username</th>
                        <th>फोटो</th>
                        <th>दिनांक</th>
                        <th>किन्ह के लिए</th>
                        <th>नाम</th>
                        <th>जन्म तिथि</th>
                        <th>जन्म समय</th>
                        <th>जन्म स्थान</th>
                        <th>कद/उंचाई</th>
                        <th>रंग</th>
                        <th>मांगलिक</th>
                        <th>शैक्षणिक योग्यता</th>
                        <th>व्यवसाय</th>
                        <th>अविवाहित/तलाकशुदा</th>
                        <th>मोबा. नं.</th>
                        <th>ई-मेल</th>
                        <th>लिंग</th>
                        <th>पूर्ण पता</th>
                        <th>प्रदेश</th>
                        <th>जिला</th>
                        <th>पिनकोड</th>
                        <th>पिता का नाम</th>
                        <th>पिता का मोबा.</th>
                        <th>पिता का व्यवसाय</th>
                        <th>पिता का गोत्र</th>
                        <th>माता का नाम</th>
                        <th>माता का गोत्र</th>
                        <th>किस लोकेशन में रिश्ता चाहिए</th>
                        <th>परिवार मे सदस्यों की संख्या</th>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                            ?>
                            <th>Delete</th>
                            <?php
                        }
                        ?>

                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        if (isset($_GET['category_page_index'])) {
                            $page_index_by_addbar = $_GET['category_page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limit = 5;
                        $offset = ($page_index_by_addbar - 1) * $record_limit;
                        $sql_show_category = "SELECT * FROM form_data ORDER BY form_id DESC LIMIT {$offset},{$record_limit}";
                        $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! --> sql_show_category");
                        if (mysqli_num_rows($result_sql_show_category) > 0) {
                            $serial_num = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($serial_num); ?>
                                    </td>
                                    <?php
                                    if ($_SESSION['user_role'] == 1) {
                                        ?>
                                        <td class='edit'><a href='update-member.php?category_index=<?php echo ($row['id']) ?>'><i
                                                    class='fa fa-edit'></i></a></td>
                                    
                                    <?php } ?>

                                    <td style="text-align:center;"><a
                                            href='rishta_page.php?member_id=<?php echo ($row['id']) ?>'><i
                                                class="fa-solid fa-circle-plus" style="font-size:20px;"></i></a></td>

                                    <td class='id'>
                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td>
                                        <img src="upload/member/<?php echo ($row['img']) ?>" alt="User Img"
                                            style="width:100px; border-radius:50%;">
                                    </td>
                                    <td>
                                        <?php echo ($row['date']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['for_who']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dob']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dot']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['dol']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['height']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['rang']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['manglik']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['edu']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['business']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['state']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['phone']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['email']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['gender']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['address']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['pradesh']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jila']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['pincode']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['fname']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['fphone']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['fbusiness']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['fgotra']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['mname']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['mgotra']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['location']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['family']) ?>
                                    </td>

                                    <?php
                                    if ($_SESSION['user_role'] == 1) {
                                        ?>
                                        <td class='delete'><a href='delete-member.php?category_index=<?php echo ($row['id']) ?>'><i
                                                    class='fa fa-trash'></i></a></td>
                                    <?php } ?>

                                    
                                </tr>
                                <?php $serial_num++;
                            }
                        } ?>
                    </tbody>
                </table>
                <?php
                $sql_show_category_by_page = "SELECT * FROM form_data";
                $result_sql_show_category_by_page = mysqli_query($conn, $sql_show_category_by_page) or die("Query Failed!! --> sql_show_category_by_page");
                if (mysqli_num_rows($result_sql_show_category_by_page) > 0) {
                    $total_category_record = mysqli_num_rows($result_sql_show_category_by_page);
                    $total_page = ceil($total_category_record / $record_limit);
                    echo ("<ul class='pagination admin-pagination'>");
                    if ($page_index_by_addbar > 1) {
                        echo ("<li><a href='member.php?category_page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page_index_by_addbar == $i) {
                            $active_page = "active";
                        } else {
                            $active_page = "";
                        }
                        echo ("<li class=$active_page><a href='member.php?category_page_index=$i'>$i</a></li>");
                    }
                    if ($page_index_by_addbar < $total_page) {
                        echo ("<li><a href='member.php?category_page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                    }
                    echo ("</ul>");
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>