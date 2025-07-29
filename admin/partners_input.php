<?php include("inc_header.php") ?>
<?php
$nama       = "";
$isi        = "";
$foto       = "";
$foto_name  = "";
$error      = "";
$sukses     = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    $sql1   = "select * from partners where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $nama   = $r1['nama'];
    $isi    = $r1['isi'];
    $foto   = $r1['foto'];

    if($isi == ''){
        $error  = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $isi  = $_POST['isi'];

    if ($nama == '' or $isi == '') {
        $error = "Silakan masukkan semua data yakni adalah data isi dan nama.";
    }

    if($_FILES['foto']['name']){
        $foto_name = $_FILES['foto']['name'];
        $foto_file = $_FILES['foto']['tmp_name'];

        $detail_file = pathinfo($foto_name);
        $foto_ekstensi = $detail_file['extension'];
        $ekstensi_yang_diperbolehkan = array("jpg","jpeg","png","gif");
        
        if(!in_array($foto_ekstensi,$ekstensi_yang_diperbolehkan)){
            $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png dan gif";
        }
    }

    if (empty($error)) {
        if($foto_name){
            $direktori = "../gambar";
            @unlink($direktori."/$foto");
            $foto_name = "partners_".time()."_".$foto_name;
            move_uploaded_file($foto_file,$direktori."/".$foto_name);
            $foto = $foto_name;
        }else{
            $foto_name = $foto;
        }

        if($id != ""){
            $sql1 = "update partners set nama = '$nama',foto='$foto_name',isi='$isi',tgl_isi=now() where id = '$id'";
        }else{
            $sql1 = "insert into partners(nama,foto,isi) values ('$nama','$foto_name','$isi')";
        }
        
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Sukses memasukkan data";
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>
<style>
    /* Main Styles */
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Container */
    .admin-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    /* Header */
    h1 {
        color: #2c3e50;
        font-size: 28px;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    /* Back Link */
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #3498db;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .back-link:hover {
        color: #2980b9;
        transform: translateX(-3px);
    }
    
    /* Alerts */
    .alert {
        padding: 12px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid transparent;
    }
    
    .alert-danger {
        background-color: #fdecea;
        border-color: #f5c6cb;
        color: #721c24;
    }
    
    .alert-primary {
        background-color: #e7f5ff;
        border-color: #b8daff;
        color: #004085;
    }
    
    /* Form Styles */
    .form-row {
        margin-bottom: 20px;
    }
    
    .col-form-label {
        font-weight: 600;
        color: #495057;
        padding-top: 8px;
    }
    
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 10px 12px;
        transition: all 0.3s;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        outline: none;
    }
    
    /* Button Styles */
    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
    }
    
    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* File Upload */
    .file-upload {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 10px;
    }
    
    .file-upload img {
        max-height: 100px;
        max-width: 100px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    
    /* Summernote Editor */
    .note-editor.note-frame {
        border-radius: 4px !important;
        border: 1px solid #ced4da !important;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .admin-container {
            padding: 15px;
            margin: 10px;
        }
        
        .col-sm-2, .col-sm-10 {
            width: 100%;
            padding: 0;
        }
        
        .col-form-label {
            margin-bottom: 5px;
            padding-top: 0;
        }
        
        .btn-primary {
            width: 100%;
        }
        
        .file-upload {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="admin-container">
    <h1>Halaman Admin Input Data Partners</h1>
    <div class="mb-3 row">
        <a href="partners.php" class="back-link">
            &laquo; Kembali ke halaman admin Partners
        </a>
    </div>
    
    <?php if ($error): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
    <?php endif; ?>
    
    <?php if ($sukses): ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php endif; ?>
    
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 row form-row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" value="<?php echo htmlspecialchars($nama) ?>" name="nama" required>
            </div>
        </div>
        
        <div class="mb-3 row form-row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <div class="file-upload">
                    <?php if($foto): ?>
                    <img src='../gambar/<?php echo htmlspecialchars($foto) ?>' alt='Foto Partner'/>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max 2MB)</small>
            </div>
        </div>
        
        <div class="mb-3 row form-row">
            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
                <textarea name="isi" class="form-control" id="summernote" required><?php echo htmlspecialchars($isi) ?></textarea>
            </div>
        </div>
        
        <div class="mb-3 row form-row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>

<?php include("inc_footer.php") ?>