<?php require_once 'inc/ust.php';


ob_start();

error_reporting(E_ALL);
?>

</head>

<body class="index-page">

    <?php require_once 'inc/slide.php'; ?>






    <main class="main">


        <?php require_once 'inc/navbar.php'; ?>



        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="fade-up">
                        <h1>Explore Knowledge. Sustain the Future.</h1>
                        <p>Welcome to the My Digital Ecological Library — a digital gateway to eco-conscious knowledge,
                            open access resources, and collaborative learning.</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Discover More</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Intro</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="lib/temp/img/hero-img.png" class="img-fluid animated"
                            alt="Digital Library Illustration">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->


        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-journal-richtext icon"></i></div>
                            <h4><a href="#" class="stretched-link">Open Access Resources</a></h4>
                            <p>Gain free and sustainable access to digital books, academic articles, and educational
                                materials anytime, anywhere.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-globe-europe-africa icon"></i></div>
                            <h4><a href="#" class="stretched-link">Ecological Awareness</a></h4>
                            <p>Promote digital literacy and environmental consciousness by sharing knowledge in an
                                eco-friendly way.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-people icon"></i></div>
                            <h4><a href="#" class="stretched-link">Community Engagement</a></h4>
                            <p>Connect with students, educators, and researchers to collaborate, share experiences, and
                                contribute to the platform.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>About Us<br></span>
                <h2>About</h2>
                <p>Empowering people through open access to sustainable knowledge and digital learning tools.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="lib/temp/img/about.png" class="img-fluid" alt="Digital Library Overview">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"
                            title="Watch Introduction Video"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Our Mission: Sustainable Access to Knowledge</h3>
                        <p class="fst-italic">
                            My Digital Ecological Library is an innovative platform designed to provide free and
                            eco-conscious access to educational and cultural resources across the globe.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Curated digital collections in multiple languages
                                    and disciplines.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Promotes environmental awareness through
                                    sustainable information sharing.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Encourages collaboration among students,
                                    educators, and researchers worldwide.</span></li>
                        </ul>
                        <p>
                            By combining technology with ecological responsibility, our library fosters global learning
                            while minimizing environmental impact. Join us in redefining education for a greener future.
                        </p>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->


        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Digital Resources</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="75" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Partner Institutions</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="4200" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Active Users</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="28" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Languages Available</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->


        <!-- News & Stories Section -->
        <section id="news" class="portfolio section">
            <div class="container section-title" data-aos="fade-up">
                <span>News</span>
                <h2>Latest Added News</h2>
                <p>The latest news, updates, and announcements are listed here.</p>
            </div>

            <div class="container">
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
                    <?php
                    $db->sql = "SELECT d.*, n.*
                    FROM dosya d
                    INNER JOIN news n ON d.alt_id = n.id
                    WHERE d.yer = 'news'
                    AND d.id IN (
                        SELECT MAX(id)
                        FROM dosya
                        WHERE yer = 'news'
                        GROUP BY alt_id
                    ) 
                        ";
                    $allNews = $db->select();

                    if (is_array($allNews) && count($allNews) > 0) {
                        $gosterilecekKayitSayisi = count($allNews) >= 6 ? 6 : min(3, count($allNews));
                        $news = array_slice($allNews, 0, $gosterilecekKayitSayisi);

                        foreach ($news as $typenews) {
                            $img = (!empty($typenews->dosya_adi) && file_exists('uploads/news/' . trim($typenews->dosya_adi)))
                                ? 'uploads/news/' . trim($typenews->dosya_adi)
                                : './lib/assets/img/noimage.jpg';
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                        <a href="javascript:;" class="d-block">
                                            <img src="<?php echo $img; ?>" class="img-fluid border-radius-lg"
                                                alt="<?php echo htmlspecialchars($typenews->title); ?>"
                                                style="max-height: 200px; object-fit: cover; width: 100%;">
                                        </a>
                                    </div>

                                    <div class="card-body pt-2">

                                        <a href="index.php?url=Home_News&id=<?php echo $typenews->id; ?>"
                                            class="card-title h5 d-block text-darker">

                                            <?php echo htmlspecialchars($typenews->title); ?>
                                        </a>
                                        <p class="card-description mb-4">

                                            <?php echo mb_strimwidth(htmlspecialchars($typenews->content_1), 0, 100, '...'); ?>

                                        </p>
                                        <div class="author align-items-center d-flex">
                                            <img src="./lib/assets/img/users.jpg" alt="Author" class="avatar shadow"
                                                width="50px" height="50px">
                                            <b>

                                                <div class="name ps-3">
                                                    <?php echo !empty($typenews->author) ? htmlspecialchars($typenews->author) : 'UNDEFINED'; ?>

                                            </b>
                                            <div class="stats">
                                                <small>
                                                    <?php echo date('d M Y', strtotime($typenews->created_at ?? 'now')); ?></small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    } else {
                        echo "<p class='text-center'>No glass records found.</p>";
                    }
                    ?>
            </div>
            </div>
        </section>







        <!-- Library Section -->
        <section id="library" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Digital Library</span>
                <h2>Educational Modules</h2>
                <p>Explore our structured learning paths designed to promote ecological awareness, digital literacy, and
                    global citizenship.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-1-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 1: Introduction to Sustainability</h3>
                            </a>
                            <p>Learn the fundamentals of ecological sustainability, climate change, and the UN
                                Sustainable Development Goals.</p>
                        </div>
                    </div><!-- End Module 1 -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-2-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 2: Digital Citizenship</h3>
                            </a>
                            <p>Explore the rights and responsibilities of digital users and the role of technology in
                                shaping society.</p>
                        </div>
                    </div><!-- End Module 2 -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-3-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 3: Eco-Education Practices</h3>
                            </a>
                            <p>Discover how to integrate sustainability themes into classrooms, curricula, and community
                                learning.</p>
                        </div>
                    </div><!-- End Module 3 -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-4-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 4: Media & Information Literacy</h3>
                            </a>
                            <p>Develop critical thinking and analysis skills in evaluating information sources, media
                                content, and digital platforms.</p>
                        </div>
                    </div><!-- End Module 4 -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-5-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 5: Green Innovation & Tech</h3>
                            </a>
                            <p>Explore how innovation, clean technology, and circular economy principles drive
                                sustainable transformation.</p>
                        </div>
                    </div><!-- End Module 5 -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-6-circle"></i>
                            </div>
                            <a href="#library" class="stretched-link">
                                <h3>Module 6: Community & Action</h3>
                            </a>
                            <p>Learn how to apply your knowledge through community-based projects, civic engagement, and
                                global collaboration.</p>
                        </div>
                    </div><!-- End Module 6 -->

                </div>

            </div>

        </section><!-- /Library Section -->


        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Testimonials</span>
                <h2>What Our Community Says</h2>
                <p>Hear from educators, students, and partners who have benefited from the Digital Ecological Library
                    experience.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
{
  "loop": true,
  "loopedSlides": 9,
  "speed": 600,
  "autoplay": {
    "delay": 6000,
    "disableOnInteraction": false
  },
  "pagination": {
    "el": ".swiper-pagination",
    "clickable": true
  },
  "breakpoints": {
    "320": {
      "slidesPerView": 1,
      "slidesPerGroup": 1,
      "spaceBetween": 20
    },
    "768": {
      "slidesPerView": 2,
      "slidesPerGroup": 2,
      "spaceBetween": 30
    },
    "1200": {
      "slidesPerView": 3,
      "slidesPerGroup": 3,
      "spaceBetween": 40
    }
  }
}
</script>




                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>This platform has completely transformed how I access and teach sustainability
                                        topics. It's intuitive, rich in resources, and inspiring!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="lib/temp/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                <h3>Amira Soltan</h3>
                                <h4>High School Teacher</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>I never thought learning about ecology could be this fun and digital! The
                                        modules are interactive and the team is super helpful.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="lib/temp/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                <h3>Luca Ferreira</h3>
                                <h4>University Student</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Joining the DEL community was the best decision. I’ve met like-minded
                                        educators and even collaborated on a digital eco-course.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="lib/temp/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                <h3>Martina Reuter</h3>
                                <h4>Community Organizer</h4>
                            </div>
                        </div><!-- End testimonial item -->



                    </div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->


        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section accent-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Join Our Vibrant Community</h3>
                            <p>
                                At the heart of our digital library lies a diverse and supportive community where
                                learning meets collaboration.
                                Here, students and educators don’t just access knowledge—they exchange ideas, build
                                friendships, and grow together.
                                Whether you're looking to expand your perspective, start a new project, or simply
                                connect with like-minded changemakers,
                                our community is the place to be.
                            </p>
                            <a class="cta-btn" href="index.php?url=login">Join Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->


        <!-- Team Section -->
        <section id="team" class="team section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Our Team</span>
                <h2>Meet the People Behind the Project</h2>
                <p>Our diverse and passionate team brings together educators, designers, and innovators to build a more
                    inclusive and sustainable digital learning space.</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
{
  "loop": true,
  "loopedSlides": 6,
  "speed": 600,
  "autoplay": {
    "delay": 6000,
    "disableOnInteraction": false
  },
  "pagination": {
    "el": ".swiper-pagination",
    "clickable": true
  },
  "breakpoints": {
    "320": {
      "slidesPerView": 1,
      "slidesPerGroup": 1,
      "spaceBetween": 20
    },
    "768": {
      "slidesPerView": 2,
      "slidesPerGroup": 2,
      "spaceBetween": 30
    },
    "1200": {
      "slidesPerView": 3,
      "slidesPerGroup": 3,
      "spaceBetween": 40
    }
  }
}
</script>




                    <div class="swiper-wrapper">

                        <!-- Member 1 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-1.jpg" class="img-fluid"
                                        alt="Walter White"></div>
                                <div class="member-info">
                                    <h4>Walter White</h4>
                                    <span>Project Coordinator</span>
                                    <p>Leads the vision and direction of the platform with a focus on impact and
                                        innovation.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 2 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-3.jpg" class="img-fluid"
                                        alt="William Anderson"></div>
                                <div class="member-info">
                                    <h4>William Anderson</h4>
                                    <span>Technical Lead</span>
                                    <p>Builds the systems that keep our platform secure, stable, and accessible to all.
                                    </p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 3 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-3.jpg" class="img-fluid"
                                        alt="William Anderson"></div>
                                <div class="member-info">
                                    <h4>William Anderson</h4>
                                    <span>Technical Lead</span>
                                    <p>Builds the systems that keep our platform secure, stable, and accessible to all.
                                    </p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 4 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-1.jpg" class="img-fluid"
                                        alt="Maria Tan"></div>
                                <div class="member-info">
                                    <h4>Maria Tan</h4>
                                    <span>Community Manager</span>
                                    <p>Empowers our users and fosters a friendly, interactive learning environment.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 5 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-2.jpg" class="img-fluid"
                                        alt="Daniel Ruiz"></div>
                                <div class="member-info">
                                    <h4>Daniel Ruiz</h4>
                                    <span>UX Designer</span>
                                    <p>Ensures an intuitive and enjoyable experience for all users across devices.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 6 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-3.jpg" class="img-fluid"
                                        alt="Fatima Zahra"></div>
                                <div class="member-info">
                                    <h4>Fatima Zahra</h4>
                                    <span>Research & Impact Analyst</span>
                                    <p>Tracks progress and evaluates outcomes to continuously improve our reach and
                                        value.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 7 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-1.jpg" class="img-fluid"
                                        alt="Yusuf Demir"></div>
                                <div class="member-info">
                                    <h4>Yusuf Demir</h4>
                                    <span>Translation Coordinator</span>
                                    <p>Manages multilingual content to ensure global accessibility and cultural
                                        sensitivity.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 8 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-1.jpg" class="img-fluid"
                                        alt="Yusuf Demir"></div>
                                <div class="member-info">
                                    <h4>Yusuf Demir</h4>
                                    <span>Translation Coordinator</span>
                                    <p>Manages multilingual content to ensure global accessibility and cultural
                                        sensitivity.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member 9 -->
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><img src="lib/temp/img/team/team-1.jpg" class="img-fluid"
                                        alt="Walter White"></div>
                                <div class="member-info">
                                    <h4>Walter White</h4>
                                    <span>Project Coordinator</span>
                                    <p>Leads the vision and direction of the platform with a focus on impact and
                                        innovation.</p>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End swiper-wrapper -->

                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>

        </section><!-- /Team Section -->


        <!--   Results Section -->
        <section id="result" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>My Digital Ecological Library</span>
                <h2>Results: A Guide for Teachers</h2>
                <p>Successfully progress in ecological education by accessing common curricula and lesson plans in our
                    Digital Ecological Library. Follow the steps below to get started.</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">

                    <!-- Step 1 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-1-circle"></i></div>
                            <h3>Step 1: Review the Common Curriculum</h3>
                            <p>Click on the “Common Curriculum” tab in the Results section. Explore the outline and
                                course units focused on ecological topics.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-2-circle"></i></div>
                            <h3>Step 2: Select & Download Lesson Plans</h3>
                            <p>Use the “Lesson Plans” tab and the search bar to filter by subject, grade, or course.
                                Click a title to preview content and download it using the top-right button.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-3-circle"></i></div>
                            <h3>Step 3: Use the Lesson Plans</h3>
                            <p>Start implementing plans in your classroom. Materials, activities, and assessments are
                                included—and available in the library tab. You may adapt them as needed.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-4-circle"></i></div>
                            <h3>Step 4: Customize as You Teach</h3>
                            <p>Adapt the downloaded lesson plans to your unique classroom needs and teaching style. All
                                content is editable and flexible for real-world use.</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-5-circle"></i></div>
                            <h3>Step 5: Give Feedback & Share</h3>
                            <p>Click the “Feedback” button to tell us what worked. Want to contribute your own plan? Use
                                “Share Plan” to submit it to our library for review.</p>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-6-circle"></i></div>
                            <h3>Need Support?</h3>
                            <p>If you have any questions, issues, or suggestions, don’t hesitate to reach out to our
                                support team. We're here to help you thrive!</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- /  Results Section -->


        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Section Title</span>
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <div class="col-lg-7">
                        <form onsubmit="mailtoSend(event)" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field"
                                        required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading" style="display: none;">Loading</div>
                                    <div class="sent-message" style="display: none;">Your message has been sent. Thank
                                        you!</div>

                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script>
                        function mailtoSend(event) {
                            event.preventDefault();

                            const name = document.getElementById("name-field").value;
                            const email = document.getElementById("email-field").value;
                            const subject = document.getElementById("subject-field").value;
                            const message = document.getElementById("message-field").value;

                            const body = `Name: ${name}%0AEmail: ${email}%0A%0AMessage:%0A${message}`;
                            const mailto = `mailto:contact@example.com?subject=${encodeURIComponent(subject)}&body=${body}`;

                            Swal.fire({
                                title: "Do you want to open your email application?",
                                text: "Your form content will be transferred to your default mail client.",
                                icon: "info",
                                showCancelButton: true,
                                confirmButtonText: "Open Mail App",
                                cancelButtonText: "Cancel",
                                footer: `If your mail app doesn’t open, you can send your message manually to: <br><strong>contact@example.com</strong>`
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open(mailto);
                                }
                            });
                        }
                    </script>




                </div>

            </div>

        </section><!-- /Contact Section -->





        <?php require_once 'inc/footer.php'; ?>


    </main>




    <?php require_once 'inc/alt.php'; ?>
    <script>
        $(document).ready(function () {
            $('#loading').hide();
            $('#example').load('index.php?url=Anasayfa');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





</body>


</html>