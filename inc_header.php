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
    /* Compact Navbar Styles */
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --text-light: #ffffff;
        --transition-speed: 0.2s;
    }
    
    nav {
        background-color: var(--primary-color);
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 60px; /* Reduced height */
    }
    
    .wrapper {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
    }
    
    nav .logo {
        display: flex;
        align-items: center;
    }
    
    nav .logo a {
        align-items: center;
        font-size: 0.9rem;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: opacity var(--transition-speed) ease;
        font-family: 'Arial', sans-serif;
        transition-property: all;
    }
    
    nav .logo-img {
        width: 40px;
        height: 40px;
        object-fit: contain;
        margin-right: 10px;
    }
    
    .menu-toggle {
        display: none;
        cursor: pointer;
        padding: 8px;
    }
    
    .menu-toggle span {
        display: block;
        width: 22px;
        height: 2px;
        background-color: var(--text-light);
        margin: 4px 0;
        transition: all 0.3s ease;
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
        gap: 12px;
    }
    
    .menu li a {
        color: white;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        padding: 8px 12px;
        border-radius: 3px;
        transition: all var(--transition-speed) ease;
    }
    
    .menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .tbl-biru {
        background: var(--secondary-color);
        border-radius: 3px;
        padding: 8px 16px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all var(--transition-speed) ease;
    }
    
    .tbl-biru:hover {
        background: #2980b9;
        transform: none;
        box-shadow: none;
    }
    
    /* Mobile Styles */
    @media (max-width: 1200px) {
        .wrapper {
            padding: 0 10px;
        }
        
        .menu-toggle {
            display: block;
        }
        
        .menu {
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background: var(--primary-color);
            flex-direction: column;
            align-items: stretch;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .menu.active {
            max-height: 400px;
            padding: 10px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .menu ul {
            flex-direction: column;
            gap: 5px;
            padding: 0 15px;
        }
        
        .menu li {
            width: 100%;
        }
        
        .menu li a {
            display: block;
            padding: 10px 15px;
        }
        
        .tbl-biru {
            width: 100%;
            text-align: center;
            margin-top: 5px;
        }
    }

    @media (max-width: 362px) {
        .menu-toggle span {
            width: 18px;
            height: 2px;
        }
        
        .menu li a {
            font-size: 0.8rem;
            padding: 6px 10px;
        }
        
        .tbl-biru {
            font-size: 0.8rem;
            padding: 6px 12px;
        }

        nav .logo a {
            font-size: 0.85rem;
            padding: 0 5px;
            display: relative;
        }
    }
</style>

<nav>
    <div class="wrapper">
        <div class="logo">
            <img src="<?php echo url_dasar()?>/gambar/dissih.png" alt="Logo" class="logo-img">
            <a href="<?php echo url_dasar()?>">Sistem Sarana Prasana (Sissarpras)</a> <!-- Shortened name -->
        </div>
        
        <div class="menu-toggle" onclick="toggleMenu()">
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
    function toggleMenu() {
        const menu = document.getElementById('mainMenu');
        menu.classList.toggle('active');
        
        // Toggle hamburger animation
        const spans = document.querySelectorAll('.menu-toggle span');
        spans.forEach(span => {
            span.classList.toggle('active');
        });
    }
</script>