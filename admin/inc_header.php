<?php 
session_start();
if($_SESSION['admin_username'] == ''){
    header("location:login.php");
    exit();
}
include("../inc/inc_koneksi.php");
include("../inc/inc_fungsi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Company Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link href="../css/summernote-image-list.min.css">
    <script src="../js/summernote-image-list.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #1cc88a;
        --dark-color: #5a5c69;
        --light-color: #f8f9fc;
        --danger-color: #e74a3b;
        --warning-color: #f6c23e;
        --info-color: #36b9cc;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fc;
        color: var(--dark-color);
        min-height: 100vh;
    }

    /* Navigation */
    .navbar {
        background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        padding: 0.75rem 1rem;
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 1.25rem;
        letter-spacing: 0.5px;
    }

    .nav-link {
        font-weight: 600;
        padding: 0.75rem 1rem;
        color: rgba(255, 255, 255, 0.85) !important;
        transition: all 0.3s ease;
        border-radius: 0.35rem;
        margin: 0 0.15rem;
        display: flex;
        align-items: center;
    }

    .nav-link i {
        margin-right: 0.5rem;
        width: 1.2rem;
        text-align: center;
    }

    .nav-link:hover, .nav-link.active {
        background-color: rgba(255, 255, 255, 0.15);
        color: white !important;
    }

    /* Main Content */
    .container {
        max-width: 100%;
        padding: 0;
    }

    main {
        padding: 2rem;
    }

    /* Cards */
    .card {
        border: none;
        border-radius: 0.35rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
        padding: 1rem 1.35rem;
        font-weight: 700;
        color: var(--dark-color);
    }

    /* Tables */
    .table {
        background-color: white;
        border-radius: 0.35rem;
        overflow: hidden;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
    }

    .table th {
        background-color: #f8f9fa;
        color: var(--dark-color);
        font-weight: 700;
        padding: 1rem;
        border-bottom: 1px solid #e3e6f0;
    }

    .table td {
        padding: 0.75rem 1rem;
        vertical-align: middle;
        border-top: 1px solid #e3e6f0;
    }

    .table tr:hover td {
        background-color: #f8f9fc;
    }

    /* Buttons */
    .btn {
        border-radius: 0.35rem;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: all 0.3s;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-success {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .btn-danger {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
    }

    .btn-warning {
        background-color: var(--warning-color);
        border-color: var(--warning-color);
    }

    /* Alerts */
    .alert {
        border-radius: 0.35rem;
        padding: 1rem 1.25rem;
    }

    /* Form Elements */
    .form-control {
        border-radius: 0.35rem;
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d3e2;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    /* Footer */
    footer {
        background-color: #f8f9fc;
        padding: 1.5rem;
        font-size: 0.875rem;
        color: var(--dark-color);
        text-align: center;
        border-top: 1px solid #e3e6f0;
        margin-top: 2rem;
    }

    /* Dashboard Cards */
    .dashboard-card {
        border-left: 0.25rem solid var(--primary-color);
        transition: transform 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .dashboard-card .card-body {
        padding: 1.25rem;
    }

    .dashboard-card .card-title {
        color: var(--dark-color);
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
    }

    .dashboard-card .card-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    /* Summernote Customization */
    .note-editor.note-frame {
        border-radius: 0.35rem;
        border: 1px solid #d1d3e2;
    }

    .note-editor.note-frame .note-toolbar {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
        border-radius: 0.35rem 0.35rem 0 0;
    }

    /* Image List Customization */
    .image-list-content .col-lg-3 {
        width: 100%;
    }

    .image-list-content img {
        float: left;
        width: 20%;
        border-radius: 0.25rem;
    }

    .image-list-content p {
        float: left;
        padding-left: 1rem;
    }

    .image-list-item {
        padding: 1rem;
        border-bottom: 1px solid #e3e6f0;
    }

    .image-list-item:hover {
        background-color: #f8f9fc;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .navbar-collapse {
            padding: 1rem 0;
        }
        
        .nav-link {
            margin: 0.25rem 0;
        }
        
        main {
            padding: 1rem;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
</head>
<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="halaman.php">
                                <i class="fas fa-home"></i> Halaman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tutors.php">
                                <i class="fas fa-chalkboard-teacher"></i> Tutors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="partners.php">
                                <i class="fas fa-handshake"></i> Partner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="info.php">
                                <i class="fas fa-envelope"></i> Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="members.php">
                                <i class="fas fa-users"></i> Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data_laporan.php">
                                <i class="fas fa-file-alt"></i> Laporan Sekolah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ganti_profile.php">
                                <i class="fas fa-key"></i> Ganti Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    