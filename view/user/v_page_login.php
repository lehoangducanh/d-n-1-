<?php include 'views/home/v_page_header.php' ?>



<section id="ega-breadcrumb" class="ega-p-t--3 ega-p-b--3">
    <div class="ega-container">
        <ul class="ega-menu ega-ul ega-menu--breadcrumb ega-m--0">
            <li class="ega-menu__item"><a href="index.php">Trang chủ</a></li>
            <!-- <li class="ega-menu__item"><a href="/account">Tài khoản</a></li> -->
            <li class="ega-menu__item"><a href="?mod=users&act=login">Đăng nhập</a></li>

        </ul>
    </div>
</section>

<!-- login form -->
<div class="ega-login ega-p-b--4">
    <div class="ega-container">
        <div class="ega-row ega-flex--center">
            <div class="ega-col-md-6 ega-col-12">
                <div id="ega-login" class="ega-card ega-border--0">
                    <h4 class="ega-h5"><svg class="ega-ic-lock">
                            <use xlink:href="#ega-ic-lock"></use>
                        </svg> Đăng nhập</h4>
                    <form action="index.php?mod=users&act=login" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên tài khoản: </label>
                            <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Nhập tên tài khoản...">
                        </div>
                        

                        <div class="mb-3">
                            <label for="password" class="form-label">Nhập mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Tạo mật khẩu...">
                        </div>
                        <input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập">
                        <div class="ega-f--right">
                            <a class="ega-text--no-underline ega-color--info ega-link" href="?mod=users&act=register">
                                Tạo tài khoản
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- login form -->
<?php include 'views/home/v_page_footer.php' ?>