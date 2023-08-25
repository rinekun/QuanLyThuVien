<div class="container text-center" style="margin-top:30px;">
    <div class="title-cart col">
        <a href="#"><button class="click active" onclick="changecart('cart',this)">Giỏ hàng</button></a>
        <a href="#"><button class="click" onclick="changecart('order-list',this)">Quản lý đơn hàng</button></a>
    </div>


    <!-- Đơn hàng -->
    <div id="cart" class="row">
        <div class="col-9" style="text-align:left; margin-top:20px;">
            <span class="text-title-cart">Giỏ sách của bạn</span>
            <hr style="width:90%">
            <table>
                <tr style="text-align: center; font-size:24px;">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng </th>
                    <th>Thành tiền</th>
                </tr>
                <?php foreach ($list_item as $item) : extract($item);
                    $image = sach_select_images_by_id($Id_the_loai);
                    extract($image);
                ?>
                <tr>
                    <td><img style="width:100px; padding:15px;" src="assets/images/product/<?= $hinh_anh ?>" alt="<?= $hinh_anh ?>"></td>
                    <td class="text-start"><?= $Ten_sach ?>đ</td>
                    <td><?= number_format($Gia_bia) ?></td>
                    <td><?= $so_luong ?></td>
                    <td><?= number_format($thanh_tien) ?>đ</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<!-- Có thể bạn sẽ thích -->
