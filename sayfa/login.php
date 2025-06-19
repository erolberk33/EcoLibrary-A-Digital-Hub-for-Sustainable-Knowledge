<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./lib/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="lib/temp/img/logo.png">
    <title>
        The Place to Share Experiences | Eco Library Discussions
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./lib/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./lib/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./lib/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./lib/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .form-control:focus {
            border-color: aquamarine;
            box-shadow: 0 0 0 2px rgb(88, 211, 125);
        }
    </style>
</head>

<body class="">

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-success">
                                        <img class="w-75" src="lib/temp/img/logo.png" alt="">
                                    </h3>
                                    <p class="mb-0">
                                    <h3>Welcome back!</h3><br>
                                    Please enter your email and password to access the community.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST">
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                                required>
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                                        </div>

                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
                                            $username = trim($_POST['username']);
                                            $password = trim($_POST['password']);

                                            // SQL injection korumalı sorgu hazırlanıyor
                                            $stmt = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password AND role IN (1, 2)");
                                            $stmt->execute([
                                                ':username' => $username,
                                                ':password' => $password
                                            ]);
                                            $users_login = $stmt->fetch(PDO::FETCH_OBJ);

                                            if ($users_login) {
                                                $_SESSION['login'] = [
                                                    'id' => $users_login->id,
                                                    'first_name' => $users_login->first_name,
                                                    'last_name' => $users_login->last_name,
                                                    'username' => $users_login->username,
                                                    'email' => $users_login->email,
                                                    'role' => $users_login->role
                                                ];
                                                header("Location: index.php?url=Forum");
                                                exit;
                                            } else {
                                                echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Email or password might be incorrect',
                html: '<small style=\"color: gray;\">Note: Accounts not approved by the administrator cannot access the system.<br>If you create a new account, it will be activated within 1–2 business days.</small>',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
        </script>";
                                            }
                                        }
                                        ?>


                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Join
                                                the Community</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        New here? Create an account and join us today.<br>
                                        <a href="index.php?url=member_login"
                                            class="text-success text-gradient font-weight-bold">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('./lib/assets/img/curved-images/curved14.jpg')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mx-auto text-center">
                    <a href="index.php?url=Anasayfa" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Home
                    </a>
                    <a href="index.php?url=Anasayfa#about" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        About
                    </a>
                    <a href="index.php?url=Anasayfa#news" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        News
                    </a>
                    <a href="index.php?url=Anasayfa#library" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Library
                    </a>
                    <a href="index.php?url=Anasayfa#team" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Who Are We?
                    </a>
                    <a href="index.php?url=Anasayfa#result" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Result
                    </a>
                    <a href="index.php?url=Anasayfa#contact" target="_blank"
                        class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Contact
                    </a>
                </div>
                <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                    <!-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a> -->
                </div>
            </div>
            <div class="row mt-0">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <img src="lib/temp/img/logo.png" alt="Site Logo" style="height: 20px; width: auto;"
                            class="me-0"> Eco Library
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="./lib/assets/js/core/popper.min.js"></script>
    <script src="./lib/assets/js/core/bootstrap.min.js"></script>
    <script src="./lib/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./lib/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./lib/assets/js/soft-ui-dashboard.js"></script>
</body>

</html>