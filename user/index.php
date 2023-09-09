<?php
include_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <!-- header -->
<?php 
include './header.php';
include './nav.php';

?>
    <!-- big_Image -->
    <div class="bigImage">
        <img id="slide_show" src="../hinh/Rectangle 62.png" alt="">
    </div>
    <!-- action -->
    <div class="action">
        <div class="action_light">
            <p>Điểm sáng</p>
        </div>
        <div class="action_content">
            <div class="list">
                <img src="../hinh/img11 1.png" alt="">
                <p>Mùa hè tại thư viện: sự kiện & hoạt động Miễn phí cho lứa tuổi</p>
            </div>
            <div class="list">
                <img src="../hinh/img12 1.png" alt="">
                <p>Thư viện sách nâng tầm tri thức Việt</p>
            </div>
            <div class="list">
                <img src="../hinh/img13 1.png" alt="">
                <p>Sách thiếu nhi chào hè </p>
            </div>
            <div class="list">
                <img src="../hinh/img14 1.png" alt="">
                <p>Poscast chữa lành và self-hepl</p>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="content">
        <div class="content_slogan">
            <p>Lựa chọn của nhân viên</p>
        </div>
        <div class="content_content">
            <div class="content_book">
                <p>“ Quyển sách Đắc nhắn tâm là cuốn sách “đầu tiên và hay nhất mọi thời đại về nghệ thuật giao tiếp và
                    ứng xử”, quyển sách đã từng mang đến thành công và hạnh phúc cho hàng triệu người trên khắp thế
                    giới. “</p>
                <img src="../hinh/Vector.png" alt="">
            </div>
            <div class="content_book">
                <p>““ Khi nhận được quyển sách này, tôi say mê, đọc kỹ, và tâm đắc với những trải nghiệm, những khám phá
                    thấu đáo qua từng vấn đề, khía cạnh phong phú của tâm hồn con người. Cuốn sách sẽ giúp người đọc
                    hiểu được cảm xúc của tâm hồn, hiểu
                    được tiếng nói trái tim của chính mình và của người khác - và tận cùng - là để loại bỏ nỗi buồn, tổn
                    thương và tìm được niềm vui, hạnh phúc trong cuộc sống ".</p>
                <img class="imageTwo" src="../hinh/Vector (1).png" alt="">
            </div>
        </div>
        <div class="content_Readmore">
            <button>Xem Thêm...</button>
        </div>
    </div>
    <div class="book_show">
        <div class="book_show_navi">
            <p>mới & đáng chú ý</p>
            <div class="icon_navi">
                <i class="fa-solid fa-backward"></i>
                <i class="fa-solid fa-forward"></i>
            </div>
        </div>
        <div class="book_show_lists">

             <?php
            $select_sach = mysqli_query($conn, "SELECT * FROM `sach`") or die('query failed');
            if (mysqli_num_rows($select_sach) > 0) {
                while ($fetch_sach = mysqli_fetch_assoc($select_sach)) { ?>
                    <form method="post" >
                        <div class="book_show_tag">
                        <img src="../hinh/<?php echo $fetch_sach['Hinh_anh'] ?>" alt="">
                        <div class="name"><a href="user_view_page.php?id=<?php echo $fetch_sach['Id']; ?>"><?php echo $fetch_sach['Ten_sach'] ?></a></div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="book_blog">
        <div class="book_blog_slogan">
            <p>Từ blog của chúng tôi</p>
        </div>
        <div class="book_blog_genre">
            <div class="book_blog_genre_tag book_blue">
                <div class="book_blog_genre_book ">
                    <img src="../hinh/Rectangle 92.png" alt="">
                    <img src="../hinh/Rectangle 93.png" alt="">
                    <img src="../hinh/Rectangle 94.png" alt="">
                </div>
                <p>Sách kinh tế</p>
            </div>
            <div class="book_blog_genre_tag book_green">
                <div class="book_blog_genre_book ">
                    <img src="../hinh/Rectangle 96.png" alt="">
                    <img src="../hinh/Rectangle 97.png" alt="">
                    <img src="../hinh/Rectangle 98.png" alt="">
                </div>
                <p>Sách kinh tế</p>
            </div>
        </div>
        <div class="book_blog_next">
            <button>Xem Them...</button>
        </div>
    </div>
   <?php
   require_once "footer.php";
   ?>
    <script src="../Js/main.js"></script>
</body>

</html>
<script type="text/javascript">
        $('.book_show_lists').slick({
            lazyLoad: 'ondemand',
            slidesToShow: 4,
            slidesToScroll: 1,
            nextArrow: $('.left'),
            prevArrow: $('.right'),
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                
            ]
        });
    </script>