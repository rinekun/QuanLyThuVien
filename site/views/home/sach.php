<div class="product">
  <h4 class="title" style="text-align: center; text-transform: uppercase;">Danh sách các sách</h4>
  <div class="product-list d-flex">
    <div class="col-4 ">
      <h2>Mục tìm kiếm</h2>
      <div class="dropdown dropend">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Theo thể loại
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <?php
          require_once './models/loai_hang.php';
          $loai_hang = the_loai_select_all();
          foreach ($loai_hang as $loai) :
            $ma_loai = $loai['id'];
            $ten_loai = $loai['the_loai'];
          ?>
            <li>
              <a class="dropdown-item" href="<?= $URL ?>/?mod=product&act=product-search&ma_loai=<?= $ma_loai ?>"><?= $ten_loai ?></a>

            </li>

          <?php
          endforeach;
          ?>
        </ul>
      </div>
     <!-- theo tác giả -->
     <div class="dropdown dropend">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Theo tên tác giả
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <?php
          require_once './models/tac_gia.php';
          $tac_gia = tac_gia_select_all();
          foreach ($tac_gia as $tac_gia_tt) :
            $ma_tg = $tac_gia_tt['id'];
            $ten_tg = $tac_gia_tt['Ten_tg'];
          ?>
            <li>
              <a class="dropdown-item" href="<?= $URL ?>/?mod=product&act=product-search&Id_ten_tg=<?= $ma_tg ?>"><?= $ten_tg ?></a>

            </li>

          <?php
          endforeach;
          ?>
        </ul>
      </div>

    </div>
    <div class="col-8 product-list d-flex flex-wrap">
      <?php
      $items = sach_select_all();
      for ($i = 0; $i < 8; $i++) :
        $item = $items[$i];
        $loai_sp  = loai_select_by_id($item['Id_the_loai']);
      ?>
        <div class="item col-3">
          <a class="item-image" href="<?= $URL ?>/?mod=product&act=product-details&Id_the_loai=<?= $item['Id_the_loai'] ?>"><img src="<?= $imagesURL ?>/product/<?= $item['hinh_anh'] ?>"></a>
          <div class="item-info">
            <a class="item-name loai" href="<?= $URL ?>/?mod=product&act=product-list&Id_the_loai=<?= $item['Id_the_loai'] ?>"><?= $loai_sp['the_loai'] ?></a>
            <a class="item-name" href="<?= $URL ?>/?mod=product&act=product-details&Id_the_loai=<?= $item['Id_the_loai'] ?>"><?= $item['Ten_sach'] ?></a>
            <div class="price d-flex justify-content-between align-items-center">
              <div>
                <span class="item-price">Số lượng còn: <?= $item['so_luong'] ?></span>
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
</div>