<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="#" class="logo d-flex align-items-center me-auto">
      <img src="lib/temp/img/logo.png" alt="Site Logo" style="height: 60px; width: auto;" class="me-2">
      <h1 class="sitename fs-4 fw-bold font-weight-light mb-0">Eco Library</h1>
    </a>


    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php?url=Anasayfa" class="active">Home</a></li>
        <li><a href="index.php?url=Anasayfa#about">About</a></li>
        <li><a href="index.php?url=Home_News">News</a></li>
        <li class="dropdown"><a href="index.php?url=Library"><span>Library</span> <i
              class="bi bi-chevron-down toggle-dropdown"></i></a>

          <ul>
            <?php
            $db->sql = "SELECT DISTINCT level_info FROM library";
            $library_navbar = $db->select();

            if ($library_navbar) {
              foreach ($library_navbar as $key => $value) { ?>
                <li>
                  <a href="index.php?url=Library&id=<?php echo urlencode($value->level_info); ?>">
                    Lesson Plans Level <?php echo htmlspecialchars($value->level_info); ?>
                  </a>
                </li>
              <?php }
            }
            ?>

          </ul>


        </li>
        <li><a href="index.php?url=Anasayfa#team">Who Are We ?</a></li>

        <li class="dropdown"><a href="index.php?url=Anasayfa#result"><span>Result</span> <i
              class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Co-Curriculum</a></li>

            <li><a href="#">My Digital <br>Ecological Library Manuel</a></li>
          </ul>
        </li>
        <li><a href="index.php?url=Anasayfa#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="index.php?url=login">Join the Community</a>



  </div>

</header>