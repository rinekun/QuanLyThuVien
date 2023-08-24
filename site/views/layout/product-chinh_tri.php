<div class="product">
  <div class="tieu_de">
    <span>Sách chính trị</span><a href="<?= $URL ?>/?mod=product&act=product-list&ma_loai=5">Xem thêm</a>
  </div>

  <div class="product-list d-flex flex-wrap">
    <?php
    $items = sach_chinh_tri();
    for ($i = 0; $i < 1; $i++) :
      $item = $items[$i];
      $loai_sp  = loai_select_by_id($item['Id_the_loai']);
    ?>
      <div class="item col-3">
        <a class="item-image" href="<?= $URL ?>/?mod=product&act=product-details&Id_the_loai=<?= $item['Id_the_loai']?>"><img src="<?= $imagesURL ?>/product/<?= $item['hinh_anh'] ?>"></a>
        <div class="item-info">
          <a class="item-name loai" href="<?= $URL ?>/?mod=product&act=product-list&Id_the_loai=<?= $item['Id_the_loai'] ?>"><?= $loai_sp['the_loai'] ?></a>
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
    <?php endfor; ?>
  </div>
</div>