</main>
<style>
    /* Footer Styles */
    footer {
        background-color: #f8f9fc;
        padding: 1rem 0;
        border-top: 1px solid #e3e6f0;
        margin-top: 2rem;
    }
    
    .footer-content {
        text-align: center;
        color: #6c757d;
        font-size: 0.875rem;
    }
    
    .footer-content p {
        margin: 0;
        padding: 0.5rem 0;
    }
</style>

<footer>
    <div class="footer-content">
        <p>Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved</p>
    </div>
</footer>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                }
            },
            height: 200,
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["insert", ["link", "picture", "imageList", "video", "hr"]],
                ["help", ["help"]]
            ],
            dialogsInBody: true,
            imageList: {
                endpoint: "daftar_gambar.php",
                fullUrlPrefix: "../gambar/",
                thumbUrlPrefix: "../gambar/"
            }
        });

        $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajax({
                method: 'POST',
                url: 'upload_gambar.php',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('#summernote').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
    });
</script>
</body>

</html>