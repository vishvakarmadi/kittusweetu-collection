<?php
session_start();
include "check_login.php";
include "code/connection.php";
$sql = "SELECT product.*,sub_category.sub_name,category.category_name,brand.name as brand_name FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN sub_category ON product.sub_category_id = sub_category.id INNER JOIN brand ON product.brand_id = brand.id ORDER BY `id` DESC";
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 style="color: black;">Manage Product</h3>
                        <a href="add_product.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add Product
                        </a>
                    </div>
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
                                    <th scope="col">Product Name</th>      
                                    <th scope="col">Category </th>
                                    <th scope="col">Sub-category </th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Discription</th>
                                    <th scope="col">Mrp Price</th>
                                    <th scope="col">Selling Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col"> Quantity</th>
                                    <th scope="col">Status</th>
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
                                    <tr class="text-dark" >
                                        <th scope="row"><?php echo ++$i ?></th>
                                        <th scope="row"><?php echo $data['product_name'] ?></th>
                                        <th scope="row"><?php echo $data['category_name'] ?></th>
                                        <th scope="row"><?php echo $data['sub_name'] ?></th>
                                        <th scope="row"><?php echo $data['brand_name'] ?></th>
                                        <th scope="row"> <img src="uplode/product/<?php echo $data["product_img"]?>" alt="" height="75px" width="120px"></th>
                                        <th scope="row"><?php echo $data['description'] ?></th>
                                        <th scope="row"><?php echo $data['mrp'] ?></th>
                                        <th scope="row"><?php echo $data['selling_price'] ?></th>
                                        <th scope="row"><?php echo $data['discount']."%" ?></th>
                                        <th scope="row"><?php echo $data['quantity'] ?></th>
                                        <th scope="row"><?php
                                        if($data['status']==1){
                                            echo "Active";
                                        }
                                        else{
                                            echo 'Inactive';
                                        }
                                        ?></th>
                                        <th scope="row"><?php echo $data['created_at'] ?></th>
                                        <th scope="row"><?php echo $data['updated_at'] ?></th>
                                        <td><button class="btn btn-info" onclick="chategoriEdit(<?php echo $data['id'] ?>)">Edit</button></td>
                                        <td><button class="btn btn-danger" onclick="chategoriDelete(<?php echo $data['id'] ?>)">Delete</button></td>
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
            <?php //include "footer.php"  ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
                window.location.href="code/product-delete.php?id="+id;
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
                window.location.href="update_product.php?id="+id;
            }
        });

    }
</script>
<?php include "js/datatable.php"?>

</html>