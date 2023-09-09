<?php
include_once '../config/config.php';



if (isset($_POST['add_to_cart'])) {
    $sach_id = $_POST['sach_id'];
    $sach_name = $_POST['sach_name'];
    $sach_price = $_POST['sach_price'];
    $product_image = $_POST['sach_image'];
    $cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE name ='$product_name' AND user_id ='$user_id'") or die('query failed');
    if (mysqli_num_rows($cart_number) > 0) {
        $message[] = 'Sản phẩm Alreary trong giỏ hàng';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`( `user_id`, `pid`, `name`, `price`, `quantity`,`image`) VALUES ('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
        $message[] = 'Sản phẩm được thêm thành công vào danh sách yêu thích của bạn';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/chitiet.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
     include_once "header.php";
     include_once "nav.php";
    ?>
     
    <div class="banner">
       <img src="./hinh/banner1.jpg" alt="" style="width: 100%; height: 500px; text-align: center;">
    </div>
<!-- chi tiet san pham -->

<div class="product">
   <?php
if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $select_sach = mysqli_query($conn, "SELECT * FROM `sach` WHERE id = '$id'") or die('query failed');
                $select_the_loai = mysqli_query($conn, "SELECT * FROM `the_loai`") or die('query failed');
                $select_NXB = mysqli_query($conn, "SELECT * FROM `nxb`") or die('query failed');
                if (mysqli_num_rows($select_sach) > 0) {
                    while ($fetch_sach = mysqli_fetch_assoc($select_sach)) {
?>
   <form  method="post">
    <div class="product-img">
      <img src="../hinh/<?php echo $fetch_sach['Hinh_anh'] ?>" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1><?php echo $fetch_sach['Ten_sach'] ?></h1>
        <h2>Tác giả: <input type="text" value="<?php echo $fetch_sach['Id_ten_tg'] ?>"></h2>
        <h2>Thể loại <input type="text" value="<?php echo $fetch_sach['Id_the_loai'] ?>"></h2>
        <p><?php echo $fetch_sach['Mo_ta'] ?></p>
      </div>
      <div class="product-price">
        <p><span><?php echo $fetch_sach['Gia_bia'] ?></span>đ</p>
      </div>
    </div>
    <input type="hidden" name="sach_id" value="<?php echo $fetch_sach['Id'] ?>">
    <input type="hidden" name="sach_name" value="<?php echo $fetch_sach['Ten_sach'] ?>">
    <input type="hidden" name="sach_price" value="<?php echo $fetch_sach['Gia_bia'] ?>">
    <input type="hidden" name="sach_image" value="<?php echo $fetch_sach['Hinh_anh']; ?>">
    <button type="button" name="add_to_cart">Mua Sách</button>
  </div>
  <div class="thong-tin">
    <h2> Thông tin chi Tiết </h2>
    <div class="content-table">
    <table> 
        <tr>
          <td>Hàng Chính hãng</td>
          <td>Có</td>
        </tr>
        <tr>
          <td>Năm Xuất bản</td>
          <td><?php echo $fetch_sach['Nam_xb'] ?></td>
        </tr>
        <tr>
          <td>Loại Bìa </td>
          <td><?php echo $fetch_sach['Nam_tb']?></td>
        </tr>
        <tr>
          <td>Nhà xuất bản</td>
          <td><?php echo $fetch_sach['Ten_NXB'] ?></td>
        </tr>
    </table>
    </div>  
   </form>
<?php
                    }
                }
            }
?>
</div>
   
</body>
</html>