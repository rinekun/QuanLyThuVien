<div class="container text-center" style="margin-top:30px;">
  <div class="title-cart col">
    <a href="#"><button class="click active" onclick="changecart('cart',this)">Giỏ sách</button></a>
    <a href="#"><button id="ql_giohang" class="click" onclick="changecart('order-list',this)">Quản lý đơn sách</button></a>
  </div>


  <!-- Đơn hàng -->
  <div id="cart" class="row">
    <div class="col-9" style="text-align:left; margin-top:20px;">
      <span class="text-title-cart">Giỏ sách của bạn</span>
      <hr style="width:90%">
      <table>
        <tr>
          <th>Sản phẩm</th>
          <th></th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Tạm tính</th>
        </tr>

        <?php
        // id=0, anh=1, ten=2, sl=3, gia= 4;
        $tong_sl = 0; // tổng các số lượng
        $total2 = 0; // tổng tiền của các sản phẩm

        if (isset($_SESSION['cart']) > 0 && (is_array($_SESSION['cart']))) :
          for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $tong_sl += $_SESSION['cart'][$i][3];
            $total = $_SESSION['cart'][$i][4] * $_SESSION['cart'][$i][3];
            $total2 += $total;
        ?>
            <tr>
              <td><img style="width:100px;" src="assets/images/product/<?= $_SESSION['cart'][$i][1] ?>" alt=""></td>
              <td>
                <div class="name-cart row"><?= $_SESSION['cart'][$i][2] ?></div>
                <div class="cart-remove row"><a href="<?= $URL ?>/?mod=product&act=product_delete&ma_san_pham=<?= $_SESSION['cart'][$i][0] ?>">Xóa</a></div>
              </td>
              <td><?= number_format($_SESSION['cart'][$i][3]) ?></td>
              <td><?= number_format($_SESSION['cart'][$i][4]) ?>đ</td>
              <td><?= number_format($total) ?>đ</td>
            </tr>
        <?php }
          $_SESSION['total2'] = $total2;
        else : echo "Không có sản phẩm nào";
        endif;
        ?>

      </table>
    </div>
    <div class="col-3 p-4" style="text-align: left; margin-top:20px; background-color:#F6F6F6;">
      <span class="text-title-cart">Thanh toán</span>
      <hr style="width:100%">
      <div class="row" style="margin-top:10px;">
        <div class="name-cart col-6">Sản phẩm: <?php echo $tong_sl; ?></div>
        <div class="name-cart col-6" style="text-align:right;"><?= number_format($total2) ?>đ</div>
      </div>
      <div class="row " style="margin-top:20px;">
        <span class="name-cart">Thông tin vận chuyển</span>
      </div>


      <!--Show status form -->
      <?php

      if (strlen($MESSAGE_SUCCESS)) {
        echo "<p style='color:#25d366' class='alert alert-error'>$MESSAGE_SUCCESS</p>";
      } else if ($MESSAGE_ERROR) {
        echo "<p class='alert alert-error'>$MESSAGE_ERROR</p>";
      }
      isset($so_dien_thoai) ? $so_dien_thoai : $so_dien_thoai = '';
      ?>
      <!-- sử lí data thông tin đơn hàng -->
      <form class="form-cart row g-3" method="post" action="<?= $URL ?>/?mod=category&act=cart">
        <div class="col-12">
          <input class="field-input w-100" name="ho_ten" value="<?php if (isset($_SESSION['user']))  echo $_SESSION['user']['Ho_ten']; ?>" placeholder="Họ và tên" disabled>
        </div>
        <div class="col-md-6">
          <input class="field-input w-100" name="email" type="email" value="<?php if (isset($_SESSION['user']))  echo $_SESSION['user']['email']; ?>" placeholder="Email" disabled>
        </div>
        <div class="col-md-6">
          <input class="field-input w-100" name="so_dien_thoai" type="number" value="<?php if (isset($_SESSION['user']))  echo $_SESSION['user']['dien_thoai']; ?>" placeholder="Số điện thoại" disabled>
        </div>
        <div class="col-12">
          <input class="field-input w-100" name="dia_chi" type="text" value="<?php if (isset($_SESSION['user']))  echo $_SESSION['user']['dia_chi']; ?>" placeholder="Địa chỉ" disabled>
        </div>
        <?php
        if (isset($_SESSION['user'])) :
        ?>
          <div class="mt-1">
            <a style="font-size: 10px;" href="<?= $URL ?>/?mod=user&act=update-info">Thay đổi thông tin</a>
          </div>
        <?php endif ?>

      
        <input type="hidden" name="tong_tien" value="<?= $total2 ?>">
        <input type="hidden" name="tong_sl" value="<?= $tong_sl ?>">
        <input type="hidden" name="ma_nguoi_dung" value="<?php if (isset($_SESSION['user']))  echo $_SESSION['user']['id']; ?>">
        <input type="hidden" name="trang_thai_cart" value="0">

        <div class="cart-button form-group text-center">
          <button name="btn_buy" class="btn-form">Đặt hàng</button>
        </div>

      </form>


    </div>
  </div>




  <!-- Quản lý đơn hàng -->
  <div id="order-list" class="row">
    <div class="col-12" style="text-align:center; margin-top:20px;">
      <span class="text-title-cart">Quản lý đơn hàng</span>
      <hr style="width:100%">
      <table id="order">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Hình thức thanh toán</th>
            <th>Ngày đặt đơn hàng</th>
            <th>Trạng thái đơn hàng</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <?php
        $tong_tien_dh = 0;
        if (isset($list_don_hang)) :
          foreach ($list_don_hang as $dhang) : extract($dhang);
            $tong_tien_dh += $tong_tien;
        ?>
            <tbody>
              <tr>
                <td><?= $ma_don_hang ?></td>
                <td><?= $so_luong ?></td>
                <td><?= number_format($tong_tien) ?>đ</td>
                <td>
                  <?php
                  if ($trang_thai == 2) {
                    echo "Đã thanh toán";
                  } else {
                    echo "COD";
                  }
                  ?>
                </td>
                <td><?= $ngay_dat_hang ?></td>
                <td><?php
                    if ($trang_thai == 0) {
                      echo "Chờ xác nhận";
                    } elseif ($trang_thai == 1) {
                      echo "Đang vận chuyển";
                    } elseif ($trang_thai == 2) {
                      echo "Giao thành công";
                    } else {
                      echo "<span style='color: red;'>Đã hủy</span>";
                    }
                    ?></td>
                <td>
                  <div class="d-flex justify-content-around">
                    <a href="<?= $URL ?>/?mod=category&act=order-detail&ma_don_hang=<?= $ma_don_hang ?>">Chi tiết</a>
                    <!-- nút hủy chỉ hiện khi đơn hàng ở trạng thái đang xác nhận -->
                    <?php if ($trang_thai == 0) : ?>
                      <a href='<?= $URL ?>?mod=category&act=cart&btn_huy&ma_don_hang=<?= $ma_don_hang ?>#ql_giohang'>Hủy</a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            </tbody>
        <?php endforeach;
        else : echo "<span>Không có đơn hàng nào</span>";
        endif;
        ?>

      </table>
      <hr>
      <div class="col" style="text-align:right;margin:30px;">
        <span style="font-size: 20px;font-weight: 500;margin-right:20px">Tổng cộng:</span>
        <span style="font-size: 20px;font-style: normal;font-weight: 700;"><?= number_format($tong_tien_dh) ?>đ</span>
      </div>
    </div>

  </div>



  <!-- Có thể bạn sẽ thích -->
  <div class="product">
    <div class="tieu_de">
      <span>Có thể bạn sẽ thích</span>
    </div>

  <div class="product-list d-flex flex-wrap">
  <?php
    $items = sach_top_4();
    foreach ($items as $item) :
      $loai_sach  = loai_select_by_id($item['Id_the_loai']);
    ?>
      <div class="item">
        <a class="item-image" href="<?= $URL ?>/?mod=product&act=product-details&Id_the_loai=<?= $item['Id_the_loai'] ?>"><img src="<?= $imagesURL ?>/product/<?= $item['hinh_anh'] ?>"></a>
        <div class="item-info">
          <a class="item-name loai" href="<?= $URL ?>/?mod=product&act=product-list&Id_the_loai=<?= $item['Id_the_loai'] ?>"><?= $loai_sach['the_loai'] ?></a>
          <a class="item-name" href="<?= $URL ?>/?mod=product&act=product-details&Id_the_loai=<?= $item['Id_the_loai'] ?>"><?= $item['Ten_sach'] ?></a>
          <div class="price d-flex justify-content-between align-items-center">
            <div>
            <span class="item-price">Số lượng còn: <?=$item['so_luong']?></span>
            </div>
            <form action="<?= $URL ?>/?mod=category&act=cart" method="post">
              <input type="hidden" name="ma_san_pham" value="<?= $item['Id_the_loai'] ?>">
              <input type="hidden" name="anh_san_pham" value="<?= $item['hinh_anh'] ?>">
              <input type="hidden" name="ten_san_pham" value="<?= $item['Ten_sach'] ?>">
              <input type="hidden" name="so_luong" value="1">
              <input type="hidden" name="don_gia" value="<?= $Gia_bia ?>">
              <button name="btn_addCart" class="btn-right">Mượn Ngay</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


    </div>