<?php include 'views/home/v_page_header.php' ?>

<section id="ega-breadcrumb" class="ega-p-t--3 ega-p-b--3">
    <div class="ega-container">
        <ul class="ega-menu ega-ul ega-menu--breadcrumb ega-m--0">
            <li class="ega-menu__item"><a href="index.php">Trang chủ</a></li>
            <!-- <li class="ega-menu__item"><a href="/account">Tài khoản</a></li> -->
            <li class="ega-menu__item"><a href="?mod=users&act=register">Đăng ký</a></li>

        </ul>
    </div>
</section>

<div class="ega-register ega-p-b--4">
    <div class="ega-container">
        <div class="ega-row ega-flex--center">
            <div class="ega-col-md-5 ega-col-12">
                <h1 class="ega-h5"><svg class="ega-ic-user">
                        <use xlink:href="#ega-ic-user"></use>
                    </svg> Người dùng mới? Đăng ký tài khoản</h1>
                <div class="userbox ega-card ega-border--0">

                    <form method="post" action="index.php?mod=users&act=register" id="customer_register" accept-charset="UTF-8">
                        <!-- <input name="FormType" type="hidden" value="customer_register"> -->

                        <div class="mb-3">
                            <label for="username" class="form-label">Tên tài khoản:</label>
                            <input type="text" class="form-control" name="tentk" id="username" placeholder="Nhập tên tài khoản..." required>

                            <?php if (isset($thongbao1)) : ?>
                                <div class="alert alert-warning">
                                    <?= $thongbao1 ?>
                                </div>
                            <?php endif;
                            unset($thongbao1); ?>

                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email..." required>
                            <?php if (isset($thongbao2)) : ?>
                                <div class="alert alert-warning">
                                    <?= $thongbao2 ?>
                                </div>
                            <?php endif;
                            unset($thongbao2); ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nhập mật khẩu</label>
                            <input type="password" class="form-control" name="matkhau" id="exampleInputPassword1" placeholder="Tạo mật khẩu..." required>

                            <?php if (isset($thongbao3)) : ?>
                                <div class="alert alert-warning">
                                    <?= $thongbao3 ?>
                                </div>
                            <?php endif;
                            unset($thongbao3); ?>


                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại: </label>
                            <input type="text" class="form-control" name="sdt" id="phone" placeholder="Nhập số điện thoại..." required>

                        </div>



                        <!-- <div class="mb-3">
                            <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="repassword" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu...">
                        </div> -->

                        <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>

                        <div class="ega-f--right">
                            <a class="ega-text--no-underline ega-color--info ega-link" href="?mod=users&act=login">
                                Đăng nhập</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/home/v_page_footer.php' ?>