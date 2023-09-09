<?php
include_once '../config/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.1.1-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <?php
    include './header.php';
    include './nav.php';
    ?>
    <!-- big_Image -->
    <div class="bigImage">
        <img id="slide_show" src="./image/Rectangle 62.png" alt="">
    </div>


    <div class="sp">

        <h2>Danh Sách Các Trang</h2>

        <input type="text" placeholder="Tìm Kiếm ...">

        <div class="sanpham">
            <div class="menu-sp">
                <button>Mục Tìm KIếm</button>

                <?php

              $timtg = isset($_GET['tacgia']) ? $_GET['tacgia'] : '';
              
              $tacgia = mysqli_query($conn, "SELECT * FROM `tac_gia`");
              $theloai = mysqli_query($conn, "SELECT * FROM `the_loai`");
              $nhasanxuat = mysqli_query($conn, "SELECT * FROM `nxb`");
              
              // Kiểm tra nếu có yêu cầu tìm kiếm theo tác giả
              if($timtg){
                  $sach = mysqli_query($conn, "SELECT * FROM `sach` WHERE Id_ten_tg ='$timtg.id'");
              }else{
                  $sach = mysqli_query($conn, "SELECT * FROM `sach`");
              }
              ?>
              
              <ul>
                  <li><a href="#">Theo tên</a>
                      <div class="list_books-child">
                          <form action="" method="get">
                              <ul>
                                  <?php while ($fetch_tacgia = mysqli_fetch_assoc($tacgia)) { ?>
                                      <li><input type="submit" name="tacgia" value="<?= $fetch_tacgia['Ten_tg'] ?>"></li>
                                  <?php } ?>
                              </ul>
                          </form>
                      </div>
                  </li>
              
                  <li><a href="#">Theo Thể Loại</a>
                      <div class="list_books-child">
                          <form action="" method="get">
                              <ul>
                                  <?php while ($fetch_theloai = mysqli_fetch_assoc($theloai)) { ?>
                                      <li><input type="submit" name="theloai" value="<?= $fetch_theloai['the_loai'] ?>"></li>
                                  <?php } ?>
                              </ul>
                          </form>
                      </div>
                  </li>
              
                  <li><a href="#">Theo Nhà Xuất Bản</a></li>
                  <li><a href="#">Theo Tác Giả</a></li>
              </ul>
                </form>
            </div>


            <section class="wrapper">
                <div class="products">
                    <ul>
                        <?php

                        while ($fetch_products = mysqli_fetch_assoc($sach)) {
                        ?>
                            <li class="main-product">

                                <div class="img-product">
                                    <img class="img-prd" src="<?= $fetch_products['Hinh_anh'] ?>" alt="">
                                </div>
                                <div class="content-product">
                                    <h3><?= $fetch_products['Ten_sach'] ?></h3>
                                    <div class="content-product-deltals">
                                        <div class="price">
                                            <span class="money"><?= $fetch_products['Gia_bia'] ?></span>
                                        </div>
                                        <button type="button" class="btn btn-cart">Thêm Vào Giỏ</button>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>

</html>