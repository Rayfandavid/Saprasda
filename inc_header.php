<?php 
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo url_dasar()?>/css/style.css?v=<?=time()?>">
</head>
<body>
    <style>
    /* Professional Navbar Styles */
    :root {
        --primary-color: #1a365d;
        --secondary-color: #2b6cb0;
        --accent-color: #4299e1;
        --text-light: #ffffff;
        --background-light: #ffffff;
        --text-dark: #2d3748;
        --shadow-light: 0 2px 15px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition-speed: 0.3s;
    }
    
    nav {
        background-color: var(--primary-color);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: var(--shadow-light);
        transition: all var(--transition-speed) ease;
        height: 60px;
    }
    
    nav.scrolled {
        background-color: var(--background-light);
        box-shadow: var(--shadow-medium);
        height: 60px;
    }
    
    nav.scrolled .logo a,
    nav.scrolled .menu li a {
        color: var(--text-dark);
    }
    
    nav.scrolled .menu li a:hover {
        color: var(--secondary-color);
        background-color: rgba(43, 108, 176, 0.05);
    }
    
    nav.scrolled .menu-toggle span {
        background-color: var(--text-dark);
    }
    
    .wrapper {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100%;
    }
    
    nav .logo {
        display: flex;
        align-items: center;
    }
    
    nav .logo a {
        display: flex;
        align-items: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: all var(--transition-speed) ease;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    nav.scrolled .logo a:hover {
        color: var(--secondary-color);
    }
    
    nav .logo-img {
        width: 40px;
        height: 40px;
        object-fit: contain;
        margin-right: 12px;
        transition: all var(--transition-speed) ease;
    }
    
    nav.scrolled .logo-img {
        width: 36px;
        height: 36px;
    }
    
    .menu-toggle {
        display: none;
        cursor: pointer;
        padding: 8px;
        flex-direction: column;
        justify-content: center;
    }
    
    .menu-toggle span {
        display: block;
        width: 25px;
        height: 2px;
        background-color: var(--text-light);
        margin: 3px 0;
        transition: all 0.3s ease;
        transform-origin: center;
    }
    
    .menu-toggle.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }
    
    .menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }
    
    .menu-toggle.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
    
    .menu {
        display: flex;
    }
    
    .menu ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
        gap: 5px;
    }
    
    .menu li a {
        color: white;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all var(--transition-speed) ease;
    }
    
    .menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .tbl-biru {
        background: var(--secondary-color);
        border-radius: 4px;
        padding: 10px 18px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all var(--transition-speed) ease;
        color: white;
        border: none;
        cursor: pointer;
        margin-left: 10px;
    }
    
    .tbl-biru:hover {
        background: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    nav.scrolled .tbl-biru {
        background: var(--secondary-color);
        color: white;
    }
    
    nav.scrolled .tbl-biru:hover {
        background: var(--accent-color);
    }
    
    /* Mobile Styles */
    @media (max-width: 992px) {
        .wrapper {
            padding: 0 15px;
        }
        
        .menu-toggle {
            display: flex;
        }
        
        .menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--primary-color);
            flex-direction: column;
            align-items: stretch;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        nav.scrolled .menu {
            background: var(--background-light);
        }
        
        .menu.active {
            max-height: 500px;
        }
        
        .menu ul {
            flex-direction: column;
            gap: 0;
            padding: 10px 20px;
        }
        
        .menu li {
            width: 100%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        nav.scrolled .menu li {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .menu li:last-child {
            border-bottom: none;
        }
        
        .menu li a {
            display: block;
            padding: 12px 15px;
        }
        
        nav.scrolled .menu li a {
            color: var(--text-dark);
        }
        
        .tbl-biru {
            width: 100%;
            text-align: center;
            margin: 10px 0 5px 0;
        }
    }

    @media (max-width: 480px) {
        nav .logo a {
            font-size: 0.95rem;
        }
        
        nav .logo-img {
            width: 32px;
            height: 32px;
            margin-right: 8px;
        }
        
        nav.scrolled .logo-img {
            width: 30px;
            height: 30px;
        }
        
        .menu-toggle span {
            width: 22px;
        }
    }
</style>

<nav id="navbar">
    <div class="wrapper">
        <div class="logo">
            <img src="<?php echo url_dasar()?>/gambar/dissih.png" alt="Logo" class="logo-img">
            <a href="<?php echo url_dasar()?>">Sissarpras</a>
        </div>
        
        <div class="menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
        <div class="menu" id="mainMenu">
            <ul>
                <li><a href="<?php echo url_dasar()?>#home">Home</a></li>
                <li><a href="<?php echo url_dasar()?>#courses">Courses</a></li>
                <li><a href="<?php echo url_dasar()?>#tutors">Tutors</a></li>
                <li><a href="<?php echo url_dasar()?>#partners">Partners</a></li>
                <li><a href="<?php echo url_dasar()?>#contact">Contact</a></li>
                <li>
                    <?php if(isset($_SESSION['email'])): ?>
                        <a href="dashboard.php" class="tbl-biru">Dashboard</a>
                    <?php else: ?>
                        <a href="form_input_npsn.php" class="tbl-biru">Sign Up</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Toggle mobile menu
    function toggleMenu() {
        const menu = document.getElementById('mainMenu');
        const menuToggle = document.getElementById('menuToggle');
        menu.classList.toggle('active');
        menuToggle.classList.toggle('active');
    }
    
    document.getElementById('menuToggle').addEventListener('click', toggleMenu);
    
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Close menu when clicking on a link (mobile)
    const menuLinks = document.querySelectorAll('.menu a');
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            const menu = document.getElementById('mainMenu');
            const menuToggle = document.getElementById('menuToggle');
            if (menu.classList.contains('active')) {
                menu.classList.remove('active');
                menuToggle.classList.remove('active');
            }
        });
    });
</script>