<header>
    <div class="heading">
        <div class="logo">
            <a href="<?= $URL ?>/index.php"><img src="./assets/images/logo/logo.png" alt="logo"></a>
        </div>
        <div class="tools">
            <div class="search">
                <?php if(!isset($keywords)) $keywords=""; ?>
                <form action="<?= $URL ?>/?mod=product&act=product-list" method="post">
                    <input type="text" placeholder="Tìm kiếm tên sách..." name="keywords" value="<?= $keywords ?>">
                    <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="cart-user">
                <div class="cart">
                    <div class="flex-left">
                        <p>Giỏ sách</p>
                    </div>
                    <a href="<?= $URL ?>/?mod=category&act=cart"><i class="fa-light fa-bag-shopping btn-icon"></i></a>
                </div>
                <div class="user dropdown">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <!-- khi đã login -->
                        <div class="flex-left">
                            <p>Xin chào</p>
                            <p class="value"><?= $_SESSION['user']['Ho_ten'] ?></p>
                        </div>
                        <a class="btn p-0 border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-light fa-user btn-icon"></i>
                        </a>
                        <ul class="dropdown-menu dropdow-user p-0 mt-1" aria-labelledby="dropdownMenuLink">
                            <?php if ($_SESSION['user']['vai_tro'] == 1) : ?>
                                <li><a class="dropdown-item user-item" href="./admin/loai-hang/index.php">Trang quản trị</a></li>
                            <?php endif ?>
                            <li><a class="dropdown-item user-item" href="<?= $URL ?>/?mod=user&act=update-info">Cập nhập thông tin</a></li>
                            <li><a class="dropdown-item user-item" href="<?= $URL ?>/?mod=user&act=change-pass">Đổi mật khẩu</a></li>
                            <li><a class="dropdown-item user-item" href="<?= $URL ?>/?mod=user&act=logout">Đăng xuất</a></li>
                        </ul>
                        <!-- end -->
                    <?php else : ?>
                        <!-- chưa login -->
                        <div class="flex-left">
                            <p>Đăng nhập</p>
                        </div>
                        <a href="<?= $URL ?>/?mod=user&act=login"><i class="fa-light fa-user btn-icon"></i></a>
                        <!-- end -->
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="dropdown">
            <button><i class="fa-light fa-list"></i> Danh mục sản phẩm</button>
            <div class="dropdown-content">
                <?php
                require_once './models/loai_hang.php';
                $loai_hang = the_loai_select_all();
                foreach ($loai_hang as $loai) :
                    $ma_loai = $loai['id'];
                    $ten_loai = $loai['the_loai'];
                ?>
                    <a href="<?= $URL ?>/?mod=product&act=product-list&ma_loai=<?= $ma_loai ?>"><?= $ten_loai ?></a>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="nav-bar">
            <button><i class="fa-solid fa-bars btn-icon"></i></button>
            <ul>
                <li><a href="<?= $URL ?>/index.php">Trang chủ</a></li>
                <li><a href="<?= $URL ?>/?mod=home&act=sach">Danh sách </a></li>
                <li><a href="<?= $URL ?>/?mod=home&act=guarantee">Tra cứu phiếu mượn</a></li>
                <li><a href="<?= $URL ?>/?mod=home&act=news">Thông báo</a></li>
                <li><a href="<?= $URL ?>/?mod=home&act=about">Giới thiệu</a></li> 
            </ul>
        </div>
        <a href="tel:19008989" class="nav-contact">
            <div>
                <p>Hotline</p>
                <p>1900.89.89</p>
            </div>
            <i class="fa-light fa-phone-rotary btn-icon"></i>
        </a>
    </div>
</header>