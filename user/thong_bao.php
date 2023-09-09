<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thông báo</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.1.1-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .frames_books-good {
        margin-top: 5vw;
        padding: 0px 3%;
        width: 100%;


    }
    .frames_books-good>h3 {
        color: #000;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
    }

    .frames_product-books {
        margin-top: 3%;
        display: inline-flex;

    }
</style>

<body>

    <?php
    include './header.php';
    include './nav.php';
    ?>
    <!-- big_Image -->
    <div class="bigImage">
        <img id="slide_show" src="./image/Rectangle 62.png" alt="">
    </div>

    <main>
        <!-- <div class="frames_bander">
            <img src="./images/bander.png" alt="">
        </div> -->

        <div class="frames_new-notification">
            <h4>
                <b>Thông báo mới nhất</b>
            </h4>

            <div class="frames_images-notification">
                <ul>
                    <li><a href=""><img src="../hinh/tin1.png" alt="">
                            <div class="text_name-notification">
                                <p>Bách khoa toàn thư về dịch hại</p>
                            </div>
                        </a>
                    </li>
                    <li><a href=""><img src="../hinh/tin1.png" alt="">
                            <div class="text_name-notification">
                                <p>Bách khoa toàn thư về dịch hại</p>
                            </div>
                        </a>
                    </li>
                    <li><a href=""><img src="../hinh/tin1.png" alt="">
                            <div class="text_name-notification">
                                <p>Bách khoa toàn thư về dịch hại</p>
                            </div>
                        </a>
                    </li>
                    <li><a href=""><img src="../hinh/tin1.png" alt="">
                            <div class="text_name-notification">
                                <p>Bách khoa toàn thư về dịch hại</p>
                            </div>
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="frames_books-good row">
            <h3>
                Recomendation Các đầu sách hay
            </h3>

            <div class="frames_product-books col-lg-4">
                <div class="img_prodct">
                    <img src="../hinh/Rectangle 86.png" alt="">
                </div>
                <div class="text_name-product">
                    <h5>vùng đất quỷ ma ta bắt</h5>
                    <p>Một câu chuyện hay về chuyến phiêu lưu đầy màu sắc</p>
                </div>

            </div>

            <div class="frames_product-books col-lg-4">
                <div class="img_prodct">
                    <img src="../hinh/Rectangle 86.png" alt="">
                </div>
                <div class="text_name-product">
                    <h5>vùng đất quỷ ma ta bắt</h5>
                    <p>Một câu chuyện hay về chuyến phiêu lưu đầy màu sắc</p>
                </div>

            </div>
            <div class="frames_product-books col-lg-4">
                <div class="img_prodct">
                    <img src="../hinh/Rectangle 86.png" alt="">
                </div>
                <div class="text_name-product">
                    <h5>vùng đất quỷ ma ta bắt</h5>
                    <p>Một câu chuyện hay về phiêu 33lưu đầy màu sắc
                    </p>
                </div>

            </div>

            <div class="frames_product-books col-lg-4">
                <div class="img_prodct">
                    <img src="../hinh/Rectangle 86.png" alt="">
                </div>
                <div class="text_name-product">
                    <h5>vùng đất quỷ ma ta bắt</h5>
                    <p>Một câu chuyện hay về phiêu 33lưu đầy màu sắc
                    </p>
                </div>

            </div>
        </div>
    </main>

    <script src="../Js/main.js"></script>

</body>

</html>