<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sarana Prasana</title>
    <!-- Add this to your head section -->


</head>
<body>
    
<?php include_once("inc_header.php") ?>
<style>
    /* ===== Global Styles ===== */
    :root {
        --primary: #2c3e50;
        --secondary: #3498db;
        --accent: #e74c3c;
        --light: #ecf0f1;
        --dark: #2c3e50;
        --success: #2ecc71;
        --warning: #f39c12;
        --text: #34495e;
        --text-light: #7f8c8d;
        --white: #ffffff;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text);
        line-height: 1.6;
        background-color: var(--light);
    }
    
    a {
        text-decoration: none;
        color: inherit;
    }
    
    img {
        max-width: 100%;
        height: auto;
    }
    
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .btn {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 4px;
        font-weight: 500;
        text-align: center;
        transition: var(--transition);
        cursor: pointer;
    }
    
    .btn-primary {
        background-color: var(--secondary);
        color: var(--white);
    }
    
    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .btn-accent {
        background-color: var(--accent);
        color: var(--white);
    }
    
    .btn-accent:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }
    
    .section-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--dark);
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50%;
        height: 4px;
        background: var(--secondary);
        border-radius: 2px;
    }
    
    .section-description {
        color: var(--text-light);
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }
    
    /* ===== Section Styles ===== */
    section {
        padding: 80px 0;
    }
    
    #home {
        display: relative;
        align-items: center;
        min-height: 100vh;
        text-align: left;
    }

    .cover {
        display: relative;
        align-items: center;
        min-height: 100vh;
        background: url("gambar/her.jpg") no-repeat center center/cover;
        color: var(--white);
        text-align: left;
    }

    .cover h1{
        margin-left: 120px;
        margin-top: 125px;
    }
   
    .cover p {
         margin-left: 120px;
        margin-top: 125px;
    }
    
    #home .kolom {
        flex: 1;
        padding: 0 40px;
    }
    
    #home h2 {
        font-size: 3rem;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    #home .deskripsi, #courses .deskripsi {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: var(--primary);
    }
    
    #home p {
        margin-bottom: 12px;
        font-size: 1.1rem;
        max-width: 600px;
    }
    
    #courses, #pengajuan, #home{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    #courses .kolom, #home .kolom {
        flex: 1;
    }
    
    #courses img, #pengajuan img, #home img {
        flex: 1;
        border-radius: 8px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        margin-left: 12px;
    }
    
    #courses img:hover, #pengajuan img:hover, #home img:hover {
        transform: scale(1.02);
    }
    
    /* Alternate layout for alternating sections */
    #pengajuan {
        flex-direction: row-reverse;
        background-color: var(--secondary);
        margin: 0;
    }

    #pengajuan .deskripsi{
        color: white;
    }

    #pengajuan .kolom, #pengajuan h2 {
        flex: 1;
        color: white;
    }
    
    /* ===== Tutor Cards Styling ===== */
.tutor-list {
    display: ;
    grid-template-columns: repeat(auto-fill, minmax(280px, 240px));
    gap: 30px;
    margin-top: 40px;
}

.kartu-tutor {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
}

.kartu-tutor:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
}

.tutor-image-container {
    position: relative;
    height: 280px;
    overflow: hidden;
}

.kartu-tutor img {
    width: 100%;
    height: 100%;
    object-fit: ;
    transition: transform 0.6s ease;
    border-bottom: 4px solid #3498db;
    border-radius: 12px 12px 0 0;
}

.kartu-tutor:hover img {
    transform: scale(1.08);
}

.tutor-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
    padding: 20px;
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.kartu-tutor:hover .tutor-overlay {
    opacity: 1;
}

.view-profile-btn {
    display: inline-block;
    background: rgba(255, 255, 255, 0.9);
    color: #2c3e50;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.view-profile-btn:hover {
    background: white;
    transform: translateY(-2px);
}

.tutor-info {
    padding: 22px;
    text-align: center;
    position: relative;
}

.tutor-info h3 {
    margin: 0 0 6px 0;
    color: #2c3e50;
    font-size: 1.25rem;
    font-weight: 600;
}

.tutor-specialization {
    color: #3498db;
    font-size: 0.9rem;
    margin-bottom: 12px;
    font-weight: 500;
    display: block;
}

.tutor-expertise {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 15px;
}

.expertise-tag {
    background: #f1f5f9;
    color: #4b5563;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
}

.tutor-rating {
    color: #f59e0b;
    font-size: 1rem;
    margin-top: 10px;
}

/* ===== Responsive Adjustments ===== */
@media (max-width: 768px) {
    .tutor-list {
        grid-template-columns: repeat(auto-fill, minmax(240px, 240px));
        gap: 20px;
    }
    
    .tutor-image-container {
        height: 240px;
    }
}

@media (max-width: 480px) {
    .tutor-list {
        grid-template-columns: 1fr;
    }
    
    .tutor-image-container {
        height: 220px;
    }
}
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .tutor-list {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        
        #tutors h2 {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 480px) {
        .tutor-list {
            grid-template-columns: 1fr;
        }
        
        .tutor-image-container {
            height: 200px;
        }
    }
    
    /* ===== Responsive Styles ===== */
    @media (max-width: 992px) {
        #home, #courses, #pengajuan {
            flex-direction: column;
            text-align: center;
        }
        
        #home .kolom {
            padding: 40px 20px;
        }
        
        #home p {
            max-width: 100%;
        }
        
        .tutor-list, .partner-list {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        section {
            padding: 60px 0;
        }
        
        #home h2 {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
    }
    /* ===== Partners Section Styling ===== */
#partners {
    background-color: #f8f9fa;
    padding: 80px 0;
    text-align: center;
}

#partners .tengah {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

#partners .kolom {
    margin-bottom: 50px;
}

#partners .deskripsi {
    color: #3498db;
    font-size: 1.2rem;
    font-weight: 500;
    margin-bottom: 15px;
}

#partners h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 20px;
}

#partners p {
    color: #7f8c8d;
    max-width: 700px;
    margin: 0 auto;
}

.partner-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 30px;
    align-items: center;
    justify-items: center;
}

.kartu-partner {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    height: 180px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.kartu-partner:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
}

.kartu-partner::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3498db, #2ecc71);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.kartu-partner:hover::before {
    transform: scaleX(1);
}

.kartu-partner img {
    max-height: 100px;
    width: auto;
    filter: grayscale(100%) contrast(80%);
    transition: all 0.4s ease;
    object-fit: contain;
}

.kartu-partner:hover img {
    filter: grayscale(0%) contrast(100%);
    transform: scale(1.1);
}

.partner-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(52, 152, 219, 0.9);
    color: white;
    padding: 12px;
    text-align: center;
    transform: translateY(100%);
    transition: transform 0.3s ease;
    font-weight: 500;
    font-size: 0.9rem;
}

.kartu-partner:hover .partner-overlay {
    transform: translateY(0);
}

/* ===== Responsive Adjustments ===== */
@media (max-width: 992px) {
    .partner-list {
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 25px;
    }
    
    .kartu-partner {
        height: 160px;
        padding: 20px;
    }
    
    .kartu-partner img {
        max-height: 90px;
    }
}

@media (max-width: 768px) {
    #partners {
        padding: 60px 0;
    }
    
    #partners h2 {
        font-size: 2rem;
    }
    
    .partner-list {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
    }
    
    .kartu-partner {
        height: 140px;
        padding: 15px;
    }
    
    .kartu-partner img {
        max-height: 80px;
    }
}

@media (max-width: 480px) {
    .partner-list {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .kartu-partner {
        height: 120px;
        padding: 12px;
    }
    
    .kartu-partner img {
        max-height: 70px;
    }
}
</style>

<div class="cover">
    <img>
    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!
</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!
</p>
</div>
<!-- untuk home -->
<section id="home">
    <img src="<?php echo ambil_gambar('8') ?>" />
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('8') ?></p>
        <h2><?php echo ambil_judul('8') ?></h2>
        <?php echo maximum_kata(ambil_isi('8'), 30) ?>
        <p><a href="<?php echo buat_link_halaman('8') ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
    </div>
</section>

<!-- untuk courses -->
<section id="courses">
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('9') ?></p>
        <h2><?php echo ambil_judul('9') ?></h2>
        <?php echo maximum_kata(ambil_isi('9'), 30) ?>
        <p><a href="<?php echo buat_link_halaman('9') ?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
    </div>
    <img src="<?php echo ambil_gambar('9') ?>" />
</section>

<section id="pengajuan">
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('11') ?></p>
        <h2><?php echo ambil_judul('11') ?></h2>
        <?php echo maximum_kata(ambil_isi('11'), 30) ?>
        <p><a href="form_input_npsn.php" class="tbl-biru">Pengajuan Proposal </a></p>
    </div>
    <img src="<?php echo ambil_gambar('11') ?>" />
</section>



<!-- untuk tutors -->
<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Meet Our Expert Educators</p>
            <h2>Professional Tutors</h2>
            <p>Our certified tutors bring years of experience and specialized knowledge to help you achieve your learning goals.</p>
        </div>

        <div class="tutor-list">
            <?php
            $sql1 = "SELECT * FROM tutors ORDER BY id ASC";
            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <div class="kartu-tutor">
                    <a href="<?php echo buat_link_tutors($r1['id']) ?>">
                        <div class="tutor-image-container">
                            <img src="<?php echo url_dasar() . "/gambar/" . tutors_foto($r1['id']) ?>" alt="<?php echo $r1['nama'] ?>" />
                            <div class="tutor-overlay">
                                <span>View Profile</span>
                            </div>
                        </div>
                        <div class="tutor-info">
                            <h3><?php echo $r1['nama'] ?></h3>
                            <p class="tutor-specialization"><?php echo $r1['bidang'] ?? 'Education Specialist' ?></p>
                            <div class="tutor-rating">
                                <?php
                                $rating = $r1['rating'] ?? 5;
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '★' : '☆';
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- untuk partners -->
<section id="partners">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Partners</p>
            <h2>Partners</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
        </div>

        <div class="partner-list">
            <?php
            $sql1   = "select * from partners order by id asc";
            $q1     = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_assoc($q1)) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo buat_link_partners($r1['id'])?>">
                    <img src="<?php echo url_dasar()."/gambar/".partners_foto($r1['id'])?>"/>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>
<?php include_once("inc_footer.php") ?>
</body>
</html>
