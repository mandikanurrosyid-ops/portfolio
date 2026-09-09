<?php
    if (isset($_GET['status']) &&  $_GET['status'] == "sukses"){
        echo "<script>alert('Pesan berhasil dikirim!');</script>";
    } elseif (isset($_GET['status']) && $_GET['status'] == "gagal") {
        echo "<script>alert('Pesan gagal dikirim!');</script>";
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Andika | portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    <link rel="stylesheet" href="../portofolio/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
           <a href="../portofolio/index.php"><h1 class="logo">Andika</h2></a>

            <ul class="nav-links">
                <li><a href="../portofolio/index.php">Home</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero" id="home">

        <div class="hero-text">
            <p class="greeting">Halo, saya</p>

            <h1>Muhammad <span>Andika</span><br> Nur Rosyid</h1>

            <h2>Frontend Developer</h2>

            <p class="deskripsi">
             Saya adalah siswa SMK jurusan Rekayasa Perangkat Lunak yang memiliki ketertarikan pada pengembangan website modern.
             Saya senang mempelajari teknologi baru dan membangun project untuk meningkatkan kemampuan di bidang frontend development.
            </p>

            <div class="button">
                <a href="../portofolio/projects.php" class="btn-primary">Lihat project</a>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-image">
            <img src="../assets/images/profile.png" alt="profile">
        </div>

        <div class="about-content">
            <h2 class="about-title">About Me</h2>

            <p class="about-description">
            Halo! Saya Muhammad Andika Nur Rosyid, siswa SMK jurusan
            Rekayasa Perangkat Lunak (RPL). Saya memiliki minat dalam
            pengembangan website modern menggunakan HTML, CSS,
            JavaScript, Bootstrap, dan Git.
            </p>

            <p class="about-description">
            Saat ini saya aktif mengembangkan berbagai project frontend sebagai sarana belajar dan membangun portfolio.
            Saya percaya bahwa belajar secara konsisten adalah langkah terbaik untuk menjadi Frontend Developer yang profesional.
            </p>
        </div>
    </section>

    <section class="skills" id="skills">
        <p class="section-subtitle">MY SKILLS</p>

        <h2 class="section-title">
            What I Can Do
        </h2>

        <div class="skills-container">
            <div class="skill-card">
                <i class="fa-brands fa-html5"></i>

                <h3>HTML5</h3>

                <p>Intermediate</p>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-css3-alt"></i>

                <h3>CSS3</h3>

                <p>Intermediate</p>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-js"></i>

                <h3>JavaScript</h3>

                <p>Beginner</p>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-bootstrap"></i>
                <h3>Bootstrap</h3>

                <p>Beginner</p>
            </div>

             <div class="skill-card">

                <i class="fa-brands fa-php"></i>

                <h3>PHP</h3>

                <p>Beginner</p>

            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Me</h2>

        <p>Have a question or want to work together? Feel free to send me a message.</p>

        <form action="../action/kirim.php" method="POST" class="contact-person">
            <input 
            type="text"
            name="nama"
            placeholder="your Name"
            required
            >
            <input 
            type="email"
            name="email"
            placeholder="your Email"
            required
            >

            <textarea 
            name="pesan"
            rows="6"
            placeholder="Write your message..."
            required
            ></textarea>

            <button type="submit">
                Send Message
            </button>
        </form>
    </section>

    <script src="../portofolio/js/script.js"></script>

    <footer class="footer">

    <div class="footer-container">
        <div class="footer-about">
            <h2>Andika</h2>

            <p>
                Frontend Developer yang harus belajar dan 
                berkembang dalam dunia web development.
            </p>

            <div class="social-icons">
                <a href="#" aria-label="GitHub">
                    <i class="fa-brands fa-github"></i>
                </a>

                <a href="#" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" aria-label="WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <div class="footer-links">
            <h3>Quick Links</h3>

            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="./projects.php">Projects</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
    </footer>
</body>
</html>