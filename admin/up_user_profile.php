<?php include('up_header.php');
if ($_SESSION['user_role'] != 9) {
    echo "<script>window.location.href='$hostname/admin/'</script>";
} ?>
<div class="container">
    <!-- Home Page Section Start -->
    <section>
        <div class="row m-4">
            <!-- PHP CODE -
                <?php
                include("config.php");
                session_start();
                $user = $_SESSION['username'];
                if (isset($_GET['page_index'])) {
                    $page_index_by_addbar = $_GET['page_index'];
                } else {
                    $page_index_by_addbar = 1;
                }
                $record_limi = 1;
                $offset = ($page_index_by_addbar - 1) * $record_limi;
                $sql_show_category = "SELECT * FROM form_data where id = '{$user}' ORDER BY id DESC LIMIT {$offset},{$record_limi}";
                $result_sql_show_category = mysqli_query($conn, $sql_show_category) or die("Query Failed!! -> sql_show_category");
                if (mysqli_num_rows($result_sql_show_category) > 0) {
                    $serial_num = 1;
                    while ($row = mysqli_fetch_assoc($result_sql_show_category)) {
                        ?>
                        <-- Card start -->
                    <div class="col-md-3 mb-2">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <a href="<?php echo $hostname ?>" class="btn btn-primary"
                                    style="width:100%; background-color: red; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">
                                    <i class='fa-solid fa-arrow-left' style="color: #fff;"></i> BACK</a>
                            </div>
                        </div>
                        <div class="card" style="border: 1px solid #ff5733; border-radius: 12px;">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
                                style="display: flex; justify-content: center;">
                                <img src="upload/member/<?php echo $row['img']; ?>" alt="Unlink" class="img-fluid mt-3"
                                    style="border: 2px solid #ff5733; border-radius: 50%;  width:150px; height: 150px;" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <!-- <h5 class="card-title"></h5> -->
                                <p class="card-text m-0">
                                    <?php echo strtoupper($row['name']); ?>
                                </p>
                                <p class="card-text m-0">
                                    <?php echo $row['dob']; ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $row['edu']; ?>
                                </p>
                                <div class="form-group  mb-2">
                                    <p class="form-control" style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                        <?php echo 'user : ' . $_SESSION['username']; ?>
                                    </p>
                                </div>
                                <a href="up_update-member.php?category_index=<?php echo ($row['id']) ?>" class="btn btn-primary"
                                    style="background-color: #ff5733; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">
                                    <i class='fa fa-edit' style="color: #fff;"></i> EDIT</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card End -->
                    <div class="col-md-9">
                        <form action="">
                            <div class="card" style="border: 1px solid #ff5733; border-radius: 12px;">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Part 1 -->
                                        <div class="col-md-6">
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;"><?php echo 'नाम : ' . $row['name'] ?></p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'मोबा./व्हाट्सएप नंबर : ' . $row['phone'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'ई-मेल : ' . $row['email'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'लिंग : ' . $row['gender'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'शैक्षणिक योग्यता : ' . $row['edu'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.13); color: #1c2331;"><?php echo 'जन्म तिथि : ' . $row['dob'] ?></p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.13); color: #1c2331;"><?php echo 'जन्म समय : ' . $row['dot'] ?></p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'जन्म स्थान : ' . $row['dol'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'व्यवसाय : ' . $row['business'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'निवास स्थान : ' . $row['address'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'पिनकोड : ' . $row['pincode'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'जिला : ' . $row['jila'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'प्रदेश : ' . $row['pradesh'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Part 1 -->
                                        <!-- Part 2 -->
                                        <div class="col-md-6">
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.13); color: #1c2331;"><?php echo 'कद/उंचाई : ' . $row['height'] ?></p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.13); color: #1c2331;"><?php echo 'रंग : ' . $row['rang'] ?></p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'मांगलिक : ' . $row['manglik'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'अविवाहित/तलाकशुदा/विधुर : ' . $row['state'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'किस लोकेशन में रिश्ता चाहिए : ' . $row['location'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'परिवार मे सदस्यों की संख्या : ' . $row['family'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'पिता का नाम : ' . $row['fname'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'पिता का मोबा. नंबर : ' . $row['fphone'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'पिता का व्यवसाय : ' . $row['fbusiness'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'पिता का गोत्र : ' . $row['fgotra'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'माता का नाम : ' . $row['mname'] ?>
                                                </p>
                                            </div>
                                            <div class="form-group  mb-2">
                                                <p class="form-control"
                                                    style="background: rgba(128, 128, 128, 0.146); color: #1c2331;">
                                                    <?php echo 'माता का गोत्र : ' . $row['mgotra'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Part 2 -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </section>
    <!-- Home Page Section End -->
</div>
<?php include('up_footer.php'); ?>