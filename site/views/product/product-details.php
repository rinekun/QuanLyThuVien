<div class="product_details container">
    <div class="box_main">
        <div class="box_left">
            <div id="main-image" class="box_show">
                <img id="main-img" src="<?= $imagesURL ?>/product/<?= $hinh_anh ?>" alt="">
            </div>
            <div class="box_scroll">
                <?php
                if (count($_SESSION['image_product']) > 1) :
                    foreach ($_SESSION['image_product'] as $picture) :
                ?>
                        <div class="img_item" onclick="changeImage('<?= $picture ?>')"><img src="<?= $imagesURL ?>/product/<?= $picture ?>"></div>
                <?php
                    endforeach;
                endif;
                ?>
                <script>
                    function changeImage(img) {
                        document.getElementById('main-img').src = "<?= $imagesURL ?>/product/" + img;
                    }
                </script>
            </div>
        </div>



        <div class="box_right">
            <span class="product_id">Mã: <?= $Id_the_loai ?></span>
            <span class="product_name"><?= $Ten_sach ?></span>
            <span class="product_content"><?= $Mo_ta ?></span>
            <span class="price">Giá: <span class="number"><?= number_format($Gia_bia) ?>&#8363;</span></span>
            <div class="product_quality">
                <form action="<?= $URL ?>/?mod=category&act=cart" method="post">
                    <div>
                        <input type="button" value="&minus;" onclick="minus()">
                        <input type="number" id="cs_input_cart" class="cs_input_cart" min="1" max="<?= $so_luong ?>" value="1" name="so_luong">
                        <input type="button" value="&plus;" onclick="plus()">
                    </div>
                    <script>
                        if (true) {
                            document.getElementById('btn_addCart').disabled = true;
                        } else {
                            document.getElementById('btn_addCart').disabled = false;
                        }

                        function minus() {
                            var value = document.getElementById('cs_input_cart').value;
                            if (value > 1) {
                                value--;
                            }
                            document.getElementById('cs_input_cart').value = value;
                        }

                        function plus() {
                            var value = document.getElementById('cs_input_cart').value;
                            if (value < <?= $so_luong ?>) {
                                value++;
                            }
                            document.getElementById('cs_input_cart').value = value;
                        }
                    </script>
                    <p>Còn <strong style="color:#025959"><?= $so_luong ?></strong> sản phẩm có sẵn</p>
                    <input type="hidden" name="ma_sach" value="<?= $Id_the_loai ?>">
                    <input type="hidden" name="anh_sach" value="<?= $hinh_anh ?>">
                    <input type="hidden" name="ten_sach" value="<?= $Ten_sach ?>">
                    <input type="hidden" name="don_gia" value="<?= $Gia_bia ?>">
                    <button type="submit" name="btn_addCart" id="btn_addCart" class="btn_cart">Thêm vào giỏ sách</button>
                </form>
            </div>


        </div>

    </div>
   
    </div>
    <!-- End Box Comment -->
</div>