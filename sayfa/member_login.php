<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./lib/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="lib/temp/img/logo.png">
  <title>Eco Library - Community Registration</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./lib/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./lib/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="./lib/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      overflow: hidden;
    }
  </style>
</head>

<body>
  <main class="main-content mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('./lib/assets/img/curved-images/curved14.jpg'); overflow: hidden;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center mx-auto">
              <h1 class="text-white mb-2 mt-2">Join Our Community!</h1>
              <p class="text-lead text-white">Fill in the form below to create your membership.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-body">
                <?php
                $id = 0;
                $first_name = "";
                $last_name = "";
                $username = "";
                $email = "";
                $password = "";
                $role = "";
                $created_at = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $first_name = $_POST["first_name"];
                  $last_name = $_POST["last_name"];
                  $username = $_POST["username"];
                  $email = $_POST["email"];
                  $password = $_POST["password"];
                  $role = $_POST["role"];
                  $created_at = $_POST["created_at"];


                  $db->sql = "INSERT INTO users (first_name, last_name,username,email,password,role,created_at) VALUES ('$first_name', '$last_name', '$username','$email', '$password', '$role', '$created_at')";
                  $insert_result = $db->insert();

                  if ($insert_result) {
                    echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: 'Your account has been created. Admin approval is required before you can log in.',
                        confirmButtonText: 'OK'
                      }).then(() => {
                        window.location.href = 'index.php?url=login';
                      });
                    </script>";
                    exit;
                  } else {
                    echo '<span style="color: gray;">Registration failed. Please try again...</span><br>';
                  }
                }
                ?>

                <form role="form" method="POST" class="text-left">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                      required>
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                      required>
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                      required>
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                      required>
                  </div>

                  <!-- GİZLİ ALANLAR -->
                  <input type="hidden" name="role" value="0">
                  <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">

                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree to the <a href="#" class="text-dark font-weight-bolder">terms and conditions</a>.
                    </label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Join the Community</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account?
                    <a href="index.php?url=login" class="text-success font-weight-bold">Sign In</a>
                  </p>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Core JS Files -->
  <script src="./lib/assets/js/core/popper.min.js"></script>
  <script src="./lib/assets/js/core/bootstrap.min.js"></script>
  <script src="./lib/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./lib/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="./lib/assets/js/soft-ui-dashboard.min.js"></script>
</body>

</html>