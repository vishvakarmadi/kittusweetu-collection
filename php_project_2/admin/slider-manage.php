<?php
session_start();
include "check_login.php";

include "code/connection.php";
$sql = "SELECT * FROM `slider` ORDER BY `id` DESC ";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mange catagry</title>
    <?php
    include "hedder_link.php";
    ?>
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php include "spineer.php" ?>
        <!-- Spinner End -->
        <!-- Sidebar Start -->

        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content bg-white">
            <!-- Navbar Start -->
            <?php include "navbar.php" ?>
            <!-- Navbar End -->
            <!-- new conttent add satrt  -->
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h3 style="color: black;" class="mb-4"><u>Mange Slider</u></h3>
                    <h5 style="color:green;">
                        <?php
                        if (isset($_GET["msg"])) {
                            echo $_GET["msg"];
                        }
                        ?>
                    </h5>
                    <div class="table-responsive">
                        <table class="table text-dark" id="category" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sr</th>
                                    <th scope="col">Image</th>      
                                    <th scope="col">Created Time</th>
                                    <th scope="col">Updated Time</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $i=0;
                                 while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                   

                                ?>
                                    <tr class="text-center" style="color: black;">
                                        <th scope="row"><?php echo ++$i ?></th>
                                        
                                        <td><img src="<?php echo "uplode/slider/" . $data["image_name"] ?>" alt="" height="70px" width="150px"></th>
                                                   <td><?php echo $data["created_time"] ?></th>
                                        <td><?php echo $data["updated_time"] ?></th>
                                        <td><button class="btn bg-info text-white" onclick="chategoriEdit(<?php echo $data['id'] ?>)">Edit</button></td>
                                        <td><button class="btn bg-danger text-white" onclick="chategoriDelete(<?php echo $data['id'] ?>)">Delete</button></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- new conttent add  end -->

            <!-- Footer Start -->
            <?php //include "footer.php" 
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php" ?>
</body>
<script>
    function chategoriDelete(id) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="code/slider-delete.php?id="+id;
            }
        });

    }
    function chategoriEdit(id) {

        Swal.fire({
            title: "Are you sure?",
            text: "You Edit be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Edit it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="edit_slider.php?id="+id;
            }
        });

    }
</script>
<?php include "js/datatable.php"?>


</html>