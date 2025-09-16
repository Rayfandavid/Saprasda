<?php

include_once("inc/inc_koneksi.php");


$sql = "SELECT * FROM tutors ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sarana Prasana</title>
    <link rel="stylesheet" href="infinite-scroll.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js"></script>
<link rel="stylesheet" href="ProfileCard.css">
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.2/dist/vanilla-tilt.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --- IGNORE ---
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<body>
    
<?php include_once("inc_header.php") ?>

<style>

    :root {
  --pointer-x: 50%;
  --pointer-y: 50%;
  --pointer-from-center: 0;
  --pointer-from-top: 0.5;
  --pointer-from-left: 0.5;
  --card-opacity: 0;
  --rotate-x: 0deg;
  --rotate-y: 0deg;
  --background-x: 50%;
  --background-y: 50%;
  --grain: none;
  --icon: none;
  --behind-gradient: none;
  --inner-gradient: none;
  --sunpillar-1: hsl(2, 100%, 73%);
  --sunpillar-2: hsl(53, 100%, 69%);
  --sunpillar-3: hsl(93, 100%, 69%);
  --sunpillar-4: hsl(176, 100%, 76%);
  --sunpillar-5: hsl(228, 100%, 74%);
  --sunpillar-6: hsl(283, 100%, 73%);
  --sunpillar-clr-1: var(--sunpillar-1);
  --sunpillar-clr-2: var(--sunpillar-2);
  --sunpillar-clr-3: var(--sunpillar-3);
  --sunpillar-clr-4: var(--sunpillar-4);
  --sunpillar-clr-5: var(--sunpillar-5);
  --sunpillar-clr-6: var(--sunpillar-6);
  --card-radius: 30px;
}

/* ===== VARIABEL WARNA BARU ===== */
        :root {
            --biru-tua: #1a4b8c;
            --biru-cerah: #3498db;
            --hijau: #2ecc71;
            --merah: #e74c3c;
            --ungu: #9b59b6;
            --kuning: #f1c40f;
            --abu-abu: #7f8c8d;
            --putih: #ffffff;
            --hitam: #2c3e50;
            --abu-muda: #ecf0f1;
        }


.pc-card-wrapper {
  perspective: 500px;
  transform: translate3d(0, 0, 0.1px);
  position: relative;
  touch-action: none;
}

.pc-card-wrapper::before {
   content: '';
  position: absolute;
  inset: -10px;
  background: inherit;
  background-position: inherit;
  border-radius: inherit;
  transition: all 0.5s ease;
  filter: contrast(100) saturate(200) blur(36px);
  transform: scale(0.8) translate3d(0, 0, 0.1px);
  background-size: 100% 100%;
  background-image: var(--behind-gradient);
}

.pc-card-wrapper:hover,
.pc-card-wrapper.active {
  --card-opacity: 1;
   transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    border-radius: 20px;
  --pointer-from-center: 1;
  --pointer-from-top: 0.5;
  --pointer-from-left: 0.5;
  --rotate-x: 10deg;
  --rotate-y: 10deg;
  --background-x: 50%;
  --background-y: 50%;
  --grain: url('https://raw.githubusercontent.com/akshitagupta15june/Grainy-Backgrounds/master/grain.png');
  --icon: url('https://raw.githubusercontent.com/akshitagupta15june/Grainy-Backgrounds/master/icon.svg');
  --inner-gradient: linear-gradient(135deg, var(--sunpillar-clr-8), var(--sunpillar-clr-2), var(--sunpillar-clr-3), var(--sunpillar-clr-4), var(--sunpillar-clr-5), var(--sunpillar-clr-6));
  --background-position: calc(var(--background-x) * 0.5) calc(var(--background-y) * 0.5), calc(var(--background-x) * 0.4) calc(var(--background-y) * 0.5), center;
  --pointer-x: calc(var(--pointer-from-left) * 100%);
  --pointer-y: calc(var(--pointer-from-top) * 100%);
  --pointer-from-left: calc(var(--pointer-from-left) * 100%);
  --pointer-from-top: calc(var(--pointer-from-top) * 100%);
  --card-radius: 20px;
  --sunpillar-1: hsl(2, 100%, 73%);
  --sunpillar-2: hsl(53, 100%, 69%);
  --sunpillar-3: hsl(93, 100%, 69%);
  --sunpillar-4: hsl(176, 100%, 76%);
  --sunpillar-5: hsl(228, 100%, 74%);
}

.pc-card-wrapper:hover::before,
.pc-card-wrapper.active::before {
  filter: contrast(100) saturate(100) blur(40px) opacity(9);
  transform: scale(0.9) translate3d(0, 0, 0.1px);
}

.pc-card {
  height: 60svh;
  max-height: 400px;
  display: row;
  aspect-ratio: 2/3;
  border-radius: 20px;;
  position: relative;
  animation: glow-bg 12s linear infinite;
  box-shadow: rgba(0, 0, 0, 0.8) calc((var(--pointer-from-left) * 10px) - 3px);
  transition: transform 1ms ease;
  transform: translate3d(0, 0, 0.100px) rotateX(0deg) rotateY(0deg);
  background-size: 100% 100%;
  background-position: 0 0, 0 0, 50% 50%, 0 0;
  overflow: hidden;
  
}

.pc-card:hover,
.pc-card.active {
  transform: rotateX(var(--rotate-x)) rotateY(var(--rotate-y));
  filter: none;
  
}


.pc-card * {
  display: grid;
  grid-area: 1/-1;
  border-radius: var(--card-radius);
  transform: translate3d(0, 0, 0.1px);
  pointer-events: none;
}

.profile-card-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 20px;
  padding: 20px;
  justify-items: center;
}

.pc-inside {
  inset: 1px;
  position: absolute;
  background-image: var(--inner-gradient);
  background-color: rgba(0, 0, 0, 0.9);
  transform: translate3d(0, 0, 0.01px);
}

.pc-shine {
  mask-image: var(--icon);
  mask-mode: luminance;
  mask-repeat: repeat;
  mask-size: 150%;
  transition: filter 0.6s ease;
  animation: holo-bg 18s linear infinite;
  
}

.pc-shine,
.pc-shine::after {
  --space: 5%;
  --angle: -45deg;
  transform: translate3d(0, 0, 1px);
  overflow: hidden;
  z-index: 3;
  background: transparent;
  background-size: cover;
  background-position: center;
  
  background-size: 500% 500%, 300% 300%, 200% 200%;
  background-repeat: repeat;
}

.pc-shine::before,
.pc-shine::after {
  content: '';
  background-position: center;
  background-size: cover;
  grid-area: 1/1;
  opacity: 0;
}

.pc-card:hover .pc-shine,
.pc-card.active .pc-shine {
  filter: brightness(0.85) contrast(1) saturate(10);
  animation: none;
}

.pc-card:hover .pc-shine::before,
.pc-card.active .pc-shine::before,
.pc-card:hover .pc-shine::after,
.pc-card.active .pc-shine::after {
  opacity: 1;
}

.pc-shine::before {
  filter: brightness(0.8) contrast(1.5) saturation(1.2);
}

.pc-shine::after {
  background-position: 0 var(--background-y), calc(var(--background-x) * 0.4) calc(var(--background-y) * 0.5), center;
  background-size: 200% 300%, 700% 700%, 100% 100%;
  mix-blend-mode: difference;
  filter: brightness(0.8) contrast(1.5);
}

.pc-glare {
  transform: translate3d(0, 0, 1.1px);
  overflow: hidden;
  background-image: radial-gradient(farthest-corner circle at var(--pointer-x) var(--pointer-y), hsl(248, 25%, 80%) 12%, hsla(207, 40%, 30%, 0.8) 90%);
  mix-blend-mode: overlay;
  z-index: 4;
}

.pc-avatar-content {
  mix-blend-mode: none;
  overflow: hidden;
  filter: none;
}

.pc-avatar-content .avatar {
  width: 100%;
  max-height: 100%;
  object-fit: cover;
  object-position: bottom center;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%) scale(1);
  transition: transform 0.3s ease;
  backdrop-filter: blur(30px);
  mix-blend-mode: overlay;
}
.pc-avatar-content img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  border-radius: var(--card-radius);
  position: absolute;
}

.pc-avatar-content::before {
  content: "";
  position: absolute;
  inset: 0;
  z-index: 1;
  border-radius: var(--card-radius);
  pointer-events: none;
  filter: contrast(100) saturate(200) blur(36px);
}

.pc-avatar-content .avatar::before {
  content: "";
  position: absolute;
  inset: 0;
  z-index: 1;
  border-radius: var(--card-radius);
  pointer-events: none;
  filter: contrast(100) saturate(200) blur(36px);
}

.pc-user-info {
  position: absolute;
  bottom: 20px;
  left: 20px;
  right: 20px;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(30px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  padding: 12px 14px;
  pointer-events: auto;
}

.pc-user-details {
  display: flex;
  align-items: center;
  gap: 12px;
}

.pc-mini-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.1);
  flex-shrink: 0;
}

.pc-mini-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 1%;
}

.pc-user-text {
  display: flex;
  align-items: flex-start;
  flex-direction: column;
  gap: 6px;
}

.pc-handle {
  font-size: 14px;
  font-weight: 500;
  color: rgba(255, 255, 255, 0.9);
  line-height: 1;
}

.pc-status {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
  line-height: 1;
}

.pc-content {
  max-height: 100%;
  overflow: hidden;
  text-align: center;
  position: relative;
  transform: translate3d(calc(var(--pointer-from-left) * -6px + 3px), calc(var(--pointer-from-top) * -6px + 3px), 0.1px) !important;
  z-index: 5;
  
}

.pc-details {
  width: 100%;
  position: absolute; /* Ubah dari relative */
  top: 20px; /* Letakkan di atas */
  left: 0;
  right: 0;
  z-index: 10; /* Pastikan di atas gambar */
  display: flex;
  flex-direction: column;
  align-items: center;
  pointer-events: none; /* Agar tidak mengganggu interaksi */
}

.pc-details h3,
.pc-details p {
  background: white; /* Tambahkan latar agar teks jelas */
  padding: 6px 12px;
  border-radius: 8px;
  color: white;
  font-weight: bold;
  text-align: center;
  -webkit-text-fill-color: unset; /* Kembalikan ke warna biasa */
  background-clip: unset;
  -webkit-background-clip: unset;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
}


.pc-details h3,
.pc-details p {
  background: rgba(0, 0, 0, 0.6); /* Tambahkan latar agar teks jelas */
  padding: 6px 12px;
  border-radius: 8px;
  color: white;
  font-weight: bold;
  text-align: center;
  -webkit-text-fill-color: unset; /* Kembalikan ke warna biasa */
  background-clip: unset;
  -webkit-background-clip: unset;
}


.pc-details h3 {
  font-weight: 600;
  margin: 0;
  font-size: 23px;
  margin: 0;
  background-image: linear-gradient(to bottom, white);
  background-size: 1em 1.5em;
  background-clip: text;
  -webkit-background-clip: text;
  font-family: 'Arial', sans-serif;
}

.pc-details p {
  font-weight: 600;
  position: relative;
  top: -8px;
  white-space: nowrap;
  font-size: 13px;
  margin: 0 auto;
  width: min-content;
  background-image: linear-gradient(to bottom, #fff, #4a4ac0);
  background-size: 1em 1.5em;
  background-clip: text;
  -webkit-background-clip: text;
}

@keyframes glow-bg {
  0% {
    --bgrotate: 0deg;
  }

  100% {
    --bgrotate: 360deg;
  }
}

@keyframes holo-bg {
  0% {
    background-position: 0 var(--background-y), 0 0, center;
  }

  100% {
    background-position: 0 var(--background-y), 90% 90%, center;
  }
}

@media (max-width: 768px) {
  .pc-card {
    height: 70svh;
    max-height: 450px;
  }

  .pc-details {
    top: 2em;
  }

  .pc-details h3 {
    font-size: min(4svh, 2.5em);
  }

  .pc-details p {
    font-size: 14px;
  }

  .pc-user-info {
    bottom: 15px;
    left: 15px;
    right: 15px;
    padding: 10px 12px;
  }

  .pc-mini-avatar {
    width: 28px;
    height: 28px;
  }

  .pc-user-details {
    gap: 10px;
  }

  .pc-handle {
    font-size: 13px;
  }

  .pc-status {
    font-size: 10px;
  }

  .pc-contact-btn {
    padding: 6px 12px;
    font-size: 11px;
  }
}

@media (max-width: 480px) {
  .pc-card {
    height: 60svh;
    max-height: 380px;
  }

  .pc-details {
    top: 1.5em;
  }

  .pc-details h3 {
    font-size: min(3.5svh, 2em);
  }

  .pc-details p {
    font-size: 12px;
    top: -8px;
  }

  .pc-user-info {
    bottom: 12px;
    left: 12px;
    right: 12px;
    padding: 8px 10px;
    border-radius: 50px;
  }

  .pc-mini-avatar {
    width: 24px;
    height: 24px;
  }

  .pc-user-details {
    gap: 8px;
  }

  .pc-handle {
    font-size: 12px;
  }

  .pc-status {
    font-size: 9px;
  }

  .pc-contact-btn {
    padding: 5px 10px;
    font-size: 10px;
    border-radius: 50px;
  }
}

@media (max-width: 320px) {
  .pc-card {
    height: 55svh;
    max-height: 320px;
  }

  .pc-details h3 {
    font-size: min(3svh, 1.5em);
  }

  .pc-details p {
    font-size: 11px;
  }

  .pc-user-info {
    padding: 6px 8px;
    border-radius: 50px;
  }

  .pc-mini-avatar {
    width: 20px;
    height: 20px;
  }

  .pc-user-details {
    gap: 6px;
  }

  .pc-handle {
    font-size: 11px;
  }

  .pc-status {
    font-size: 8px;
  }

  .pc-contact-btn {
    padding: 4px 8px;
    font-size: 9px;
    border-radius: 50px;
  }
}
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: white;
            color: var(--hitam);
            line-height: 1.6;
        }

          header {
            background: var(--biru-tua);
            color: var(--putih);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
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

    #cover {
        display: relative;
        align-items: center;
        min-height: 100vh;
        text-align: left;
    }

/* Section Cover */
        .cover {
    display: flex;
    align-items: center;
    justify-content: left;
    min-height: 100vh;
    padding: 40px 20px;
    position: relative;
    overflow: hidden;
    margin: 0;
}
        
        .cover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        
        .cover-content{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            width: 100%;
            gap: 50px;
            position: relative;
            z-index: 2;
            margin: 0;
        }
        
        /* Teks Kiri */
        .cover-text {
            flex: 1;
            text-align: left;
            min-width: 100px;
            padding: 10px;
            margin-top: -300px;
            align-items: left;
        }
        
        .cover-text h1 {
            font-size: 21px;
            font-weight: 750;
            font-family: 'Poppins', sans-serif;
            color: black;
            margin-bottom: 15px;
            line-height: 2.0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            background-color:  #FFC107;
            padding: 5px;
            border-radius: 40px 40px 40px 10px;
            text-align: center; /* sejajarkan secara horizontal */
            display: inline-block; /* supaya tetap mengikuti ukuran teks */
            backdrop-filter: blur(100px);
            margin-bottom: 26px;
        }
        
        .cover-text h2 {
            font-size: 36px ;
            font-weight: 200px;
            margin-bottom: 17px;
            color: black;
            line-height: 0.7;
            font-family: 'Poppins', sans-serif;
        }
        
        .cover-text p {
            font-size: 1.4rem;
            line-height: -1.8rem;
            max-width: 100%;
            margin-bottom: -27px;
            color: black;
        }
        
        .cover-image img {
        max-width: 400px;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(to right, #f59e0b, #facc15);
            color: #1e293b;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
        }
        
       
        
        /* Dekorasi */
        .decoration {
            position: absolute;
            z-index: 0;
        }
        
        .dec-1 {
            top: 10%;
            left: 5%;
            width: 40px;
            height: 40px;
            border: 3px solid #38bdf8;
            border-radius: 50%;
            opacity: 0.4;
        }
        
        .dec-2 {
            bottom: 20%;
            right: 10%;
            width: 80px;
            height: 80px;
            border: 3px solid #facc15;
            border-radius: 50%;
            opacity: 0.2;
        }
        
        .dec-3 {
            top: 15%;
            right: 25%;
            width: 30px;
            height: 30px;
            background: #f87171;
            border-radius: 50%;
            opacity: 0.3;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .cover-content {
                gap: 30px;
            }
            
            .cover-text {
                padding: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .cover-content {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }
            
            .cover-text {
                text-align: center;
                padding: 0;
            }
            
            .cover-text p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            
            .cover-image {
                width: 85%;
                max-height: 60vh;
            }
        }
        
        @media (max-width: 480px) {
            .cover {
                padding: 20px 15px;
            }
            
            .cover-content {
                gap: 30px;
            }
            
            .cover-image {
                width: 95%;
                max-height: 50vh;
            }
          }
    
    #home .kolom {
        flex: 1;
        padding: 0 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
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
        color: black;
    }

    #pengajuan .kolom, #pengajuan h2 {
        flex: 1;
        color: black;
    }
    
    /* ===== Tutor Cards Styling ===== */
.tutor-list {
    display: ;
    grid-template-columns: repeat(auto-fill, minmax(280px, 240px));
    gap: 30px;
    margin-top: 40px;
}

.cover-text {
  
}

#tutors .deskripsi {
  color: #ffffff;
} 

#tutors {
  background-color: #555879; /* Warna gelap */
  color: #ffffff; /* Agar teks tetap terlihat */
  padding: 0 0;
  margin: 0;
}  

#tutors h1,
#tutors h2,
#tutors h3,
#tutors h4,
#tutors h5,
#tutors h6,
#tutors p,
#tutors span,
#tutors .deskripsi {
  color: #ffffff;
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
    object-fit: cover;
    transition: transform 0.6s ease;
    border-bottom: 4px white solid;
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
    background: linear-gradient(transparent, black);
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

    .container {
                max-width: 1400px;
                margin: 0 auto;
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                padding: 25px;
                margin-top: 120px;
            }
            h1 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 2px solid #ecf0f1;
            }

            .data-selector {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
                gap: 10px;
            }
            .data-btn {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-weight: 500;
                transition: all 0.3s;
            }
            .data-btn.active {
                background-color: #3498db;
                color: white;
            }
            .data-btn:not(.active) {
                background-color: #ecf0f1;
                color: #7f8c8d;
            }
            .filter-container {
                background-color: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                align-items: center;
            }
            .filter-container select, .filter-container input {
                padding: 8px 12px;
                border: 1px solid #ddd;
                border-radius: 4px;
                background-color: white;
            }
            .filter-container button {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .filter-container button:hover {
                background-color: #2980b9;
            }
            .chart-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }
            .chart-box {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
                position: relative;
            }
            .chart-controls {
                position: absolute;
                top: 15px;
                right: 15px;
                display: flex;
                gap: 5px;
                margin-top: 40px;
            }
            .chart-btn {
                background-color: #f1f2f6;
                border: 1px solid #dcdde1;
                border-radius: 4px;
                padding: 5px 10px;
                cursor: pointer;
                font-size: 14px;
                transition: all 0.2s;
                margin-top: 2px;
            }
            .chart-btn:hover {
                background-color: #dfe4ea;
            }
            .chart-btn.active {
                background-color: #3498db;
                color: white;
                border-color: #2980b9;
            }
            canvas {
                width: 100%  !important;
                height: auto !important;
            }
            .summary {
                background-color: #e8f4fc;
                padding: 15px;
                border-radius: 8px;
                margin-top: 20px;
            }
            .loading {
                text-align: center;
                padding: 20px;
                color: #7f8c8d;
            }

            .chart-box h3{
            font-family: 'Segoe UI', serif;
            font-weight: 100px;
            margin-top: 12px;
            }

            h3{
            font-family: 'Segoe UI', serif;
            }

            .chart-box h1 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 30px;
                padding-bottom: 1px;
                border-bottom: 2px solid #ecf0f1;
                font-size: 20px;
            }

            .data-source-badge {
                position: absolute;
                top: 15px;
                left: 15px;
                background-color: #3498db;
                color: white;
                padding: 3px 8px;
                border-radius: 4px;
                font-size: 12px;
            }
            @media (max-width: 768px) {
                .filter-container {
                    grid-template-columns: 1fr;
                }
                .chart-container {
                    grid-template-columns: 1fr;
                }
                .chart-controls {
                    position: relative;
                    top: 0;
                    right: 0;
                    margin-bottom: 10px;
                    justify-content: center;
                }
            }

        .container {
            max-width: 1200px;
            width: 100%;
            text-align: center;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        h4 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 1.5rem;
            text-align: center;
            font-family: 'sans-serif';
        }
        
        /* Gaya untuk card swap container */
        .card-swap-container {
            position: relative;
            margin-right: -200px;
            margin-top: 300px;
            perspective: 1000px;
            width: 500px;
            height: 400px;
        }
        
        .card {
            position: absolute;
            width: 900px;
            height: 600px;
            border-radius: 0;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
            text-align: center;
            backface-visibility: hidden;
            border-radius: 12px ;
        }

       .card-img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
  top: 0;
  left: 0;
  z-index: 1;
}
        
        .card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            transform: translateZ(20px) scale(1.05);
        }
        
        .card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            position: relative;
        }
        
        .card p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        /* Warna berbeda untuk setiap card */
        .card:nth-child(1) {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
        }
        
        .card:nth-child(2) {
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        }
        
        .card:nth-child(3) {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: #333;
        }
        
        .card:nth-child(4) {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        }
        
        /* Responsivitas */
        @media (max-width: 768px) {
            .card-swap-container {
                width: 90%;
                height: 350px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .card h3 {
                font-size: 1.5rem;
            }
            
            .card p {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .card-swap-container {
                height: 300px;
            }
        }
</style>

<section id="cover" class="cover">
  <div class="cover-content"> 
    <div class="cover-text">
      <h1>Selamat Datang di Sisarpras Website</h1>
      <h2>Dinas Pendidikan Sumedang</h2>
      <p>"Sekolah yang nyaman, siswa yang berprestasi."</p>
    </div>
    <div class="card-swap-container" id="cardSwapContainer">
    <div class="card" data-index="0">
        <img src="gambar/sekolah_buruk.jpg" alt="Card 1 Image" class="card-img" />
    </div>
    <div class="card" data-index="1">
        <img src="gambar/sekolah_rusak2.jpg" alt="Card 2 Image" class="card-img" />
    </div>
    <div class="card" data-index="2">
        <img src="gambar/sekolah_bagus1.jpeg" alt="Card 3 Image" class="card-img" />
    </div>
    <div class="card" data-index="3">
        <img src="gambar/sekolah_baik2.png" alt="Card 4 Image" class="card-img" />
    </div>
</div>

    </section>

    <h1>Data Sarana dan Prasarana</h1>
    <h4>Tahun 2025-2030</h4>

<div class="container">
        <h1>Dashboard Sarana dan Prasarana Sekolah</h1>
        
        <div class="data-selector">
            <button class="data-btn" data-type="sarana">Sarana</button>
            <button class="data-btn active" data-type="prasarana">Prasarana</button>
        </div>
        
        <div class="filter-container">
            <div class="filter-group">
                <label for="sekolah">Pilih Sekolah:</label>
                <select id="sekolah">
                    <option value="">Semua Sekolah</option>
                </select>
            </div>
            
            <div class="filter-group" id="jenisPrasaranaGroup">
                <label for="jenisPrasarana">Jenis Prasarana:</label>
                <select id="jenisPrasarana">
                    <option value="">Semua Jenis</option>
                    <option value="ruang_kelas">Ruang Kelas</option>
                    <option value="perpustakaan">Perpustakaan</option>
                    <option value="lab_ipa">Lab IPA</option>
                    <option value="lab_komputer">Lab Komputer</option>
                    <option value="ruang_admin">Ruang Admin</option>
                    <option value="ruang_uks">Ruang UKS</option>
                    <option value="toilet">Toilet</option>
                    <option value="ruang_ibadah">Ruang Ibadah</option>
                    <option value="ruang_dinas">Ruang Dinas</option>
                    <option value="lapangan_upacara">Lapangan Upacara</option>
                </select>
            </div>
            
            <div class="filter-group" id="jenisSaranaGroup" style="display: none;">
                <label for="jenisSarana">Jenis Sarana:</label>
                <select id="jenisSarana">
                    <option value="">Semua Jenis</option>
                    <option value="meubel">Meubel</option>
                    <option value="tik">TIK</option>
                    <option value="penunjang">Penunjang</option>
                    <option value="lab_ipa">Lab IPA</option>
                    <option value="pjok">PJOK</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="tahun">Tahun:</label>
                <input type="number" id="tahun" min="2020" max="2030" value="2025">
            </div>
            
            <button id="updateBtn">Perbarui Data</button>
        </div>
        
        <div class="chart-container">
            <div class="chart-box">
                
                <h1 id="chart1Title">Kondisi Prasarana</h1>
                <div class="chart-controls">
                    <button class="chart-btn active" data-chart="mainChart" data-type="bar">Bar</button>
                    <button class="chart-btn" data-chart="mainChart" data-type="line">Line</button>
                    <button class="chart-btn" data-chart="mainChart" data-type="pie">Pie</button>
                    <button class="chart-btn" data-chart="mainChart" data-type="doughnut">Doughnut</button>
                </div>
                <canvas id="mainChart"></canvas>
            </div>
            
            <div class="chart-box">
                
                <h1 id="chart2Title">Data per Kategori</h1>
                <div class="chart-controls">
                    <button class="chart-btn active" data-chart="secondaryChart" data-type="bar">Bar</button>
                    <button class="chart-btn" data-chart="secondaryChart" data-type="line">Line</button>
                    <button class="chart-btn" data-chart="secondaryChart" data-type="radar">Radar</button>
                    <button class="chart-btn" data-chart="secondaryChart" data-type="polarArea">Polar</button>
                </div>
                <canvas id="secondaryChart"></canvas>
            </div>
        </div>
        
        <div class="summary" id="dataSummary">
            <div class="loading">Memuat data...</div>
        </div>
    </div>

<!-- untuk home -->
<section id="home"> <!-- PUDEL -->
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan('8') ?></p>
        <h2><?php echo ambil_judul('8') ?></h2>
        <?php echo maximum_kata(ambil_isi('8'), 30) ?>
        <p><a href="<?php echo buat_link_halaman('8') ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
    </div>
    <img src="gambar\111.png" alt="" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
</section>




<!-- Visi Misi Section -->
<section id="visi-misi" style="background-color: #f8f9fa; padding: 80px 0;">
    <div class="tengah" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="kolom" style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-family: 'Poppins', sans-serif; font-size: 2.5rem; color: #2c3e50; margin-bottom: 20px; position: relative; display: inline-block;">
                Visi dan Misi
                <span style="position: absolute; bottom: -10px; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, #3498db, #2ecc71); border-radius: 2px;"></span>
            </h2>
            <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Visi dan misi Dinas Pendidikan Sumedang dalam pengelolaan sarana prasarana pendidikan</p>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
            <!-- Visi Card -->
            <div style="flex: 1; min-width: 300px; max-width: 500px; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                <div style="background: linear-gradient(135deg, #1a4b8c, #3498db); padding: 25px 30px; text-align: center;">
                    <h3 style="font-family: 'Poppins', sans-serif; color: white; margin: 0; font-size: 1.8rem; position: relative; display: inline-block;">
                        VISI
                        <span style="position: absolute; bottom: -5px; left: 0; width: 100%; height: 3px; background: #facc15; border-radius: 2px;"></span>
                    </h3>
                </div>
                <div style="padding: 30px;">
                    <p style="font-size: 1.1rem; line-height: 1.6; color: #2c3e50; text-align: center; margin: 0;">
                        "Terwujudnya masyarakat yang sehat, cerdas dan berkarakter."
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div style="flex: 1; min-width: 300px; max-width: 500px; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                <div style="background: linear-gradient(135deg, #2ecc71, #3498db); padding: 25px 30px; text-align: center;">
                    <h3 style="font-family: 'Poppins', sans-serif; color: white; margin: 0; font-size: 1.8rem; position: relative; display: inline-block;">
                        MISI
                        <span style="position: absolute; bottom: -5px; left: 0; width: 100%; height: 3px; background: #facc15; border-radius: 2px;"></span>
                    </h3>
                </div>
                <div style="padding: 30px;">
                    <ul style="padding-left: 20px; margin: 0;">
                        <li style="text-align: left;margin-bottom: 15px; font-size: 1.1rem; line-height: 1.6; color: #2c3e50;">
                            <span style="text-align: left; font-weight: bold; color: #2ecc71;"></span> Mengoptimalkan pemanfaatan sarana prasarana pendidikan secara efektif dan efisien
                        </li>
                        <li style="text-align: left;margin-bottom: 15px; font-size: 1.1rem; line-height: 1.6; color: #2c3e50;">
                            <span style="ext-align: left;font-weight: bold; color: #2ecc71;"></span> Meningkatkan kualitas dan kuantitas fasilitas pendidikan di seluruh wilayah
                        </li>
                        <li style="text-align: left;margin-bottom: 15px; font-size: 1.1rem; line-height: 1.6; color: #2c3e50;">
                            <span style="font-weight: bold; color: #2ecc71;"></span> Mengembangkan sistem pengelolaan sarana prasarana berbasis teknologi
                        </li>
                        <li style="text-align: left;margin-bottom: 15px; font-size: 1.1rem; line-height: 1.6; color: #2c3e50;">
                            <span style="font-weight: bold; color: #2ecc71;"></span> Menjamin kesetaraan akses terhadap sarana prasarana pendidikan
                        </li>
                        <li style="text-align: left;font-size: 1.1rem; line-height: 1.6; color: #2c3e50;">
                            <span style="font-weight: bold; color: #2ecc71;"></span> Membangun kemitraan dengan berbagai pihak untuk pengembangan infrastruktur pendidikan
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="kolom" style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-family: 'Poppins', sans-serif; font-size: 2.5rem; color: #2c3e50; margin-bottom: 20px; position: relative; display: inline-block;">
                Program Kegiatan
                <span style="position: absolute; bottom: -10px; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, #3498db, #2ecc71); border-radius: 2px;"></span>
            </h2>
            <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto;">Visi dan misi Dinas Pendidikan Sumedang dalam pengelolaan sarana prasarana pendidikan</p>
        </div>

        <!-- Tabel Detail -->
        <div style="margin-top: 50px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border-radius: 15px; overflow: hidden;">
                <thead>
                    <tr style="background: linear-gradient(135deg, #9b59b6, #1a4b8c); color: white;">
                        <th style="padding: 18px 20px; text-align: center; font-size: 1.1rem; font-weight: 600;">Tujuan RPD</th>
                        <th style="padding: 18px 20px; text-align: center; font-size: 1.1rem; font-weight: 600;">Sasaran RPD/ Tujuan Restra PD</th>
                        <th style="padding: 18px 20px; text-align: center; font-size: 1.1rem; font-weight: 600;">Sasaran Restra PD</th>
                        <th style="padding: 18px 20px; text-align: center; font-size: 1.1rem; font-weight: 600;">Program</th>
                        <th style="padding: 18px 20px; text-align: center; font-size: 1.1rem; font-weight: 600;">Indikator Kinerja</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: rgba(154, 89, 182, 0.05);">
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: 500; color: #2c3e50;">Terwujudnya masyarakat yang sehat, cerdas dan berkarakter.</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Meningkatnya pelayanan
penyelenggaraan pendidikan yang berkualitas dan berdayasaing yang didukung teknologi informasi dan
komunikasi</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Meningkatnya Mutu dan Aksesbilitas Pelayanan Pendidikan<</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">PROGRAM PENGELOLAAN PENDIDIKAN
</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Tingkat partisipasi warga negara usia 7-12 tahun dalam Pendidikan SD</td>
                    </tr>
                    <tr style="background-color: rgba(26, 75, 140, 0.05);">
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: 500; color: #2c3e50;"></td>
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee;"></td>
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee;">Meningkatnya kapasitas dan kapabilitas internal perangkat daerah
</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">PROGRAM PENGEMBANGAN KURIKULUM
</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Tingkat partisipasi warga negara usia 13-15 tahun dalam Pendidikan SMP
</td>
                    </tr>
                    <tr style="background-color: rgba(154, 89, 182, 0.05);">
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: 500; color: #2c3e50;"></td>
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee;"></td>
                        <td style="padding: 15px 20px; border-bottom: 1px solid #eee;"></td>  
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">PROGRAM PENDIDIK DAN TENAGA KEPENDIDIKAN
</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Tingkat partisipasi warga negara usia 7-18 tahun dalam Pendidikan kesetaraan
</td>
                    </tr>
                    <tr style="background-color: rgba(26, 75, 140, 0.05);">
                        <td style="padding: 15px 20px; font-weight: 500; color: #2c3e50;"></td>
                        <td style="padding: 15px 20px;"></td>
                        <td style="padding: 15px 20px;"></td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">Tingkat partisipasi warga negara usia 5-6 tahun dalam pendidikan usia dini</td>
                    </tr>
                    <tr style="background-color: rgba(26, 75, 140, 0.05);">
                        <td style="padding: 15px 20px; font-weight: 500; color: #2c3e50;"></td>
                        <td style="padding: 15px 20px;"></td>
                        <td style="padding: 15px 20px;"></td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA</td>
                        <td style="text-align: center;padding: 15px 20px; border-bottom: 1px solid #eee;">SAKIP Perangkat Daerah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


 <section id="tutors">
  <div class="tengah">
    <div class="kolom">
      <p class="deskripsi">Meet Our Expert Educators</p>
      <h2>Professional Tutors</h2>
      <p>Our certified tutors bring years of experience and specialized knowledge to help you achieve your learning goals.</p>
    </div>

    <div class="profile-card-container">
      <?php
      $sql1 = "SELECT * FROM tutors ORDER BY id ASC";
      $q1 = mysqli_query($koneksi, $sql1);
      while ($r1 = mysqli_fetch_array($q1)) {
        $id = $r1['id'];
        $nama = htmlspecialchars($r1['nama']);
        $bidang = htmlspecialchars($r1['bidang'] ?? '');
        $foto = tutors_foto($id);
        $rating = $r1['rating'] ?? 5;
        $link = buat_link_tutors($id);
      ?>
        <div class="pc-card-wrapper" style="--icon: none; --grain: none;">
          <a href="<?php echo $link ?>">
            <section class="pc-card">
              <div class="pc-inside">
                <div class="pc-shine"></div>
                <div class="pc-glare"></div>
                <div class="pc-content pc-avatar-content">
                  <img class="avatar" src="gambar/<?php echo $foto ?>" alt="<?php echo $nama ?>" loading="lazy" />
                  <div class="pc-user-info">
                    <div class="pc-user-details">
                      <div class="pc-mini-avatar">
                        <img src="gambar/<?php echo $foto ?>" alt="<?php echo $nama ?>" loading="lazy" />
                      </div>
                      <div class="pc-user-text">
                        <div class="pc-handle"><?php echo htmlspecialchars($r1['email'] ?? '@unknown') ?></div>
                        <div class="pc-status"><?php echo $bidang ?></div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="pc-content">
                  <div class="pc-details">
                    <h3><?php echo $nama ?></h3>
                    <p><?php echo $bidang ?></p>
                    <div class="tutor-rating" style="margin-top: 0.5em;">
                      
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </a>
        </div>
      <?php } ?>
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
<script>
        // Variabel global untuk menyimpan objek chart dan data
        let mainChart, secondaryChart;
        let mainChartType = 'bar';
        let secondaryChartType = 'bar';
        let currentDataType = 'prasarana';

        // Fungsi untuk memuat data dari server berdasarkan tipe data yang dipilih
        function loadChartData() {
            const sekolah = document.getElementById('sekolah').value;
            const tahun = document.getElementById('tahun').value;
            
            // Tentukan jenis filter berdasarkan tipe data
            let jenisFilter = '';
            if (currentDataType === 'prasarana') {
                jenisFilter = document.getElementById('jenisPrasarana').value;
            } else if (currentDataType === 'sarana') {
                jenisFilter = document.getElementById('jenisSarana').value;
            }
            
            // Tampilkan loading
            document.getElementById('dataSummary').innerHTML = '<div class="loading">Memuat data...</div>';
            
            // AJAX request untuk mendapatkan data
            $.ajax({
                url: 'getData.php',
                method: 'POST',
                data: {
                    data_type: currentDataType,
                    sekolah: sekolah,
                    jenis: jenisFilter,
                    tahun: tahun
                },
                dataType: 'json',
                success: function(data) {
                    updateCharts(data);
                    updateSummary(data);
                    populateSchoolDropdown(data.sekolahList);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                    document.getElementById('dataSummary').innerHTML = 
                        '<div class="loading">Gagal memuat data. Silakan coba lagi.</div>';
                }
            });
        }

        // Fungsi untuk mengelola tampilan filter berdasarkan tipe data
        function updateFilterVisibility() {
            // Sembunyikan semua grup filter jenis
            document.getElementById('jenisPrasaranaGroup').style.display = 'none';
            document.getElementById('jenisSaranaGroup').style.display = 'none';
            
            // Tampilkan grup filter yang sesuai
            if (currentDataType === 'prasarana') {
                document.getElementById('jenisPrasaranaGroup').style.display = 'flex';
                document.getElementById('chart1Title').textContent = 'Kondisi Prasarana';
                document.getElementById('chart2Title').textContent = 'Data per Jenis Prasarana';
                document.querySelectorAll('.data-source-badge').forEach(badge => {
                    badge.textContent = 'Prasarana';
                });
            } else if (currentDataType === 'sarana') {
                document.getElementById('jenisSaranaGroup').style.display = 'flex';
                document.getElementById('chart1Title').textContent = 'Kondisi Sarana';
                document.getElementById('chart2Title').textContent = 'Data per Jenis Sarana';
                document.querySelectorAll('.data-source-badge').forEach(badge => {
                    badge.textContent = 'Sarana';
                });
            }
            
            // Perbarui data
            loadChartData();
        }

        // Fungsi untuk mengisi dropdown sekolah
        function populateSchoolDropdown(sekolahList) {
            const dropdown = document.getElementById('sekolah');
            const currentValue = dropdown.value;
            
            // Simpan opsi "Semua Sekolah"
            const allOption = dropdown.options[0];
            
            // Kosongkan dropdown
            dropdown.innerHTML = '';
            dropdown.appendChild(allOption);
            
            // Tambahkan setiap sekolah ke dropdown
            sekolahList.forEach(sekolah => {
                const option = document.createElement('option');
                option.value = sekolah.npsn;
                option.textContent = sekolah.nama_sekolah;
                dropdown.appendChild(option);
            });
            
            // Kembalikan nilai yang dipilih sebelumnya jika masih ada
            if (currentValue) {
                dropdown.value = currentValue;
            }
        }

        // Fungsi untuk memperbarui chart dengan data baru
        function updateCharts(data) {
            const ctx1 = document.getElementById('mainChart').getContext('2d');
            const ctx2 = document.getElementById('secondaryChart').getContext('2d');
            
            // Hancurkan chart sebelumnya jika ada
            if (mainChart) mainChart.destroy();
            if (secondaryChart) secondaryChart.destroy();
            
            // Siapkan data berdasarkan tipe data
            let mainLabels, mainDatasets, secondaryLabels, secondaryDatasets;
            
            if (currentDataType === 'prasarana') {
                // Data untuk chart utama (kondisi prasarana)
                mainLabels = ['Baik', 'Ringan', 'Sedang', 'Berat'];
                mainDatasets = [{
                    label: 'Jumlah Prasarana',
                    data: [
                        data.total.kondisi_baik || 0,
                        data.total.kondisi_ringan || 0,
                        data.total.kondisi_sedang || 0,
                        data.total.kondisi_berat || 0
                    ],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',   // Hijau cerah untuk kondisi baik
                        'rgba(241, 196, 15, 0.7)',   // Kuning untuk kerusakan ringan
                        'rgba(243, 156, 18, 0.7)',   // Jingga untuk kerusakan sedang
                        'rgba(231, 76, 60, 0.7)'     // Merah untuk kerusakan berat
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(241, 196, 15, 1)',
                        'rgba(243, 156, 18, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1
                }];
                
                // Data untuk chart sekunder (per jenis prasarana)
                secondaryLabels = [];
                const secondaryBaikData = [];
                const secondaryRinganData = [];
                const secondarySedangData = [];
                const secondaryBeratData = [];
                
                data.byJenis.forEach(item => {
                    secondaryLabels.push(item.jenis.replace(/_/g, ' ').toUpperCase());
                    secondaryBaikData.push(item.kondisi_baik || 0);
                    secondaryRinganData.push(item.kondisi_ringan || 0);
                    secondarySedangData.push(item.kondisi_sedang || 0);
                    secondaryBeratData.push(item.kondisi_berat || 0);
                });
                
                secondaryDatasets = [
                    {
                        label: 'Baik',
                        data: secondaryBaikData,
                        backgroundColor: 'rgba(46, 204, 113, 0.7)',
                        borderColor: 'rgba(46, 204, 113, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Ringan',
                        data: secondaryRinganData,
                        backgroundColor: 'rgba(241, 196, 15, 0.7)',
                        borderColor: 'rgba(241, 196, 15, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Sedang',
                        data: secondarySedangData,
                        backgroundColor: 'rgba(243, 156, 18, 0.7)',
                        borderColor: 'rgba(243, 156, 18, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Berat',
                        data: secondaryBeratData,
                        backgroundColor: 'rgba(231, 76, 60, 0.7)',
                        borderColor: 'rgba(231, 76, 60, 1)',
                        borderWidth: 1
                    }
                ];
                
            } else if (currentDataType === 'sarana') {
                // Data untuk chart utama (kondisi sarana)
                mainLabels = ['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat'];
                mainDatasets = [{
                    label: 'Jumlah Sarana',
                    data: [
                        data.total.baik || 0,
                        data.total.rusak_ringan || 0,
                        data.total.rusak_sedang || 0,
                        data.total.rusak_berat || 0
                    ],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',   // Hijau cerah untuk kondisi baik
                        'rgba(241, 196, 15, 0.7)',   // Kuning untuk kerusakan ringan
                        'rgba(243, 156, 18, 0.7)',   // Jingga untuk kerusakan sedang
                        'rgba(231, 76, 60, 0.7)'     // Merah untuk kerusakan berat
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(241, 196, 15, 1)',
                        'rgba(243, 156, 18, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1
                }];
                
                // Data untuk chart sekunder (per jenis sarana)
                secondaryLabels = [];
                const secondaryBaikData = [];
                const secondaryRinganData = [];
                const secondarySedangData = [];
                const secondaryBeratData = [];
                
                data.byJenis.forEach(item => {
                    secondaryLabels.push(item.jenis.toUpperCase());
                    secondaryBaikData.push(item.baik || 0);
                    secondaryRinganData.push(item.rusak_ringan || 0);
                    secondarySedangData.push(item.rusak_sedang || 0);
                    secondaryBeratData.push(item.rusak_berat || 0);
                });
                
                secondaryDatasets = [
                    {
                        label: 'Baik',
                        data: secondaryBaikData,
                        backgroundColor: 'rgba(46, 204, 113, 0.7)',
                        borderColor: 'rgba(46, 204, 113, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Rusak Ringan',
                        data: secondaryRinganData,
                        backgroundColor: 'rgba(241, 196, 15, 0.7)',
                        borderColor: 'rgba(241, 196, 15, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Rusak Sedang',
                        data: secondarySedangData,
                        backgroundColor: 'rgba(243, 156, 18, 0.7)',
                        borderColor: 'rgba(243, 156, 18, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Rusak Berat',
                        data: secondaryBeratData,
                        backgroundColor: 'rgba(231, 76, 60, 0.7)',
                        borderColor: 'rgba(231, 76, 60, 1)',
                        borderWidth: 1
                    }
                ];
            }
            
            // Buat chart utama
            mainChart = new Chart(ctx1, {
                type: mainChartType,
                data: {
                    labels: mainLabels,
                    datasets: mainDatasets
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        }
                    }
                }
            });
            
            // Buat chart sekunder
            secondaryChart = new Chart(ctx2, {
                type: secondaryChartType,
                data: {
                    labels: secondaryLabels,
                    datasets: secondaryDatasets
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        }
                    }
                }
            });
        }

        // Fungsi untuk mengubah tipe chart
        function changeChartType(chartId, type) {
            // Simpan tipe chart yang dipilih
            if (chartId === 'mainChart') {
                mainChartType = type;
            } else {
                secondaryChartType = type;
            }
            
            // Update tampilan tombol
            document.querySelectorAll(`.chart-btn[data-chart="${chartId}"]`).forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-type') === type) {
                    btn.classList.add('active');
                }
            });
            
            // Muat ulang data dengan tipe chart baru
            loadChartData();
        }

        // Fungsi untuk memperbarui ringkasan data
        function updateSummary(data) {
            const summaryDiv = document.getElementById('dataSummary');
            let html = '';
            
            if (currentDataType === 'prasarana') {
                const total = data.total.total || 0;
                html = `
                    <h3>Ringkasan Data Prasarana</h3>
                    <p>Total Prasarana Terdata: <strong>${total}</strong></p>
                    <p>Kondisi Baik: <strong>${data.total.kondisi_baik || 0}</strong> (${total > 0 ? Math.round(((data.total.kondisi_baik || 0) / total) * 100) : 0}%)</p>
                    <p>Kerusakan Ringan: <strong>${data.total.kondisi_ringan || 0}</strong> (${total > 0 ? Math.round(((data.total.kondisi_ringan || 0) / total) * 100) : 0}%)</p>
                    <p>Kerusakan Sedang: <strong>${data.total.kondisi_sedang || 0}</strong> (${total > 0 ? Math.round(((data.total.kondisi_sedang || 0) / total) * 100) : 0}%)</p>
                    <p>Kerusakan Berat: <strong>${data.total.kondisi_berat || 0}</strong> (${total > 0 ? Math.round(((data.total.kondisi_berat || 0) / total) * 100) : 0}%)</p>
                `;
            } else if (currentDataType === 'sarana') {
                const total = data.total.total || 0;
                html = `
                    <h3>Ringkasan Data Sarana</h3>
                    <p>Total Sarana Terdata: <strong>${total}</strong></p>
                    <p>Kondisi Baik: <strong>${data.total.baik || 0}</strong> (${total > 0 ? Math.round(((data.total.baik || 0) / total) * 100) : 0}%)</p>
                    <p>Rusak Ringan: <strong>${data.total.rusak_ringan || 0}</strong> (${total > 0 ? Math.round(((data.total.rusak_ringan || 0) / total) * 100) : 0}%)</p>
                    <p>Rusak Sedang: <strong>${data.total.rusak_sedang || 0}</strong> (${total > 0 ? Math.round(((data.total.rusak_sedang || 0) / total) * 100) : 0}%)</p>
                    <p>Rusak Berat: <strong>${data.total.rusak_berat || 0}</strong> (${total > 0 ? Math.round(((data.total.rusak_berat || 0) / total) * 100) : 0}%)</p>
                `;
            }
            
            summaryDiv.innerHTML = html;
        }

        // Event listener untuk tombol pemilihan data
        document.querySelectorAll('.data-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.data-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentDataType = this.getAttribute('data-type');
                updateFilterVisibility();
            });
        });
        
        // Event listener untuk tombol perbarui
        document.getElementById('updateBtn').addEventListener('click', loadChartData);
        
        // Event listener untuk tombol perubahan tipe chart
        document.querySelectorAll('.chart-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const chartId = this.getAttribute('data-chart');
                const chartType = this.getAttribute('data-type');
                changeChartType(chartId, chartType);
            });
        });
        
        // Muat data saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', loadChartData);
    </script>
</body>
</html>

<script src="infinite-scroll.js"></script>

<script>
  VanillaTilt.init(document.querySelectorAll(".pc-card"), {
    max: 25,
    speed: 400,
    glare: true,
    "max-glare": 0.2,
  });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardSwapContainer = document.getElementById('cardSwapContainer');
            const cards = cardSwapContainer.querySelectorAll('.card');
            
            const totalCards = cards.length;
            let currentIndex = 0;
            let autoPlayInterval;
            
            // Konfigurasi animasi
            const config = {
                cardDistance: 60,
                verticalDistance: 70,
                skewAmount: 6,
                animationDuration: 800,
                delay: 3000 // Delay antara pertukaran kartu
            };
            
            // Atur posisi awal kartu
            function initializeCards() {
                cards.forEach((card, i) => {
                    const slot = calculateSlot(i, config.cardDistance, config.verticalDistance, totalCards);
                    setCardPosition(card, slot, config.skewAmount);
                });
            }
            
            // Hitung posisi slot
            function calculateSlot(i, distX, distY, total) {
                return {
                    x: i * distX,
                    y: -i * distY,
                    z: -i * distX * 1.5,
                    zIndex: total - i
                };
            }
            
            // Atur posisi kartu
            function setCardPosition(card, slot, skew) {
                card.style.transform = `
                    translate(-50%, -50%) 
                    translateX(${slot.x}px) 
                    translateY(${slot.y}px) 
                    translateZ(${slot.z}px) 
                    skewY(${skew}deg)
                `;
                card.style.zIndex = slot.zIndex;
            }
            
            // Animasi ke kartu berikutnya
            function goToNextCard() {
                currentIndex = (currentIndex + 1) % totalCards;
                updateCardsPosition();
            }
            
            // Perbarui posisi semua kartu berdasarkan currentIndex
            function updateCardsPosition() {
                cards.forEach((card, i) => {
                    let targetIndex = i - currentIndex;
                    if (targetIndex < 0) targetIndex += totalCards;
                    
                    const slot = calculateSlot(targetIndex, config.cardDistance, config.verticalDistance, totalCards);
                    
                    // Gunakan CSS transition untuk animasi
                    card.style.transition = `transform ${config.animationDuration}ms cubic-bezier(0.175, 0.885, 0.32, 1.275)`;
                    setCardPosition(card, slot, config.skewAmount);
                });
            }
            
            // Inisialisasi
            initializeCards();
            
            // Mulai auto play
            autoPlayInterval = setInterval(goToNextCard, config.delay);
            
            // Hentikan animasi saat hover (opsional)
            cardSwapContainer.addEventListener('mouseenter', function() {
                clearInterval(autoPlayInterval);
            });
            
            cardSwapContainer.addEventListener('mouseleave', function() {
                autoPlayInterval = setInterval(goToNextCard, config.delay);
            });
        });
    </script>

  <script src="profile_card.js"></script>
