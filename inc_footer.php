<style>

    html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

#contact {
    margin-top: auto; /* dorong footer ke bawah */
}           
    /* Compact Footer Styles */
    #contact {
        background-color: #2c3e50;
        color: #ffffff;
        padding: 60px 10px   60px; /* Reduced padding */
    }

    .footer {
        display: relative;
        grid-template-columns: repeat(4, 1fr);
        margin: 0px; /* Negative margin to eliminate gaps */
    }

    .footer-section {
        padding: 0px; /* Small padding instead of gap */
    }

    .footer-section h3 {
        color: #3498db;
        font-size: 1.1rem;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 0px;
        font-family: 'Arial', sans-serif;
        font-weight: 600;
        align-items: center;
        display: flex;
        justify-content: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer-section h3::after {
        content: '';
        position: absolute;
        left: 0px;
        bottom: 0;
        width: 30px;
        height: 2px;
        background-color: white;
    }

    .footer-section p,
    .footer-section address,
    .footer-section a {
        color: #ecf0f1;
        line-height: 0;
        font-size: 0.85rem;
        margin: 3px 0;
        font-family: 'Arial', sans-serif;
    }

    .footer-section h3 {
        display: block;
        transition: color 0.2s ease;
    }

    .footer-section h3:hover {
        color: #3498db;
    }

    #copyright {
        background-color: #1a252f;
        color: #bdc3c7;
        padding: 0;
        text-align: center;
        font-size: 0.8rem;
        margin-top: 0; /* Added space between content and copyright */
    }

    #copyright b {
        color: #ecf0f1;
        font-weight: 500;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .footer {
            grid-template-columns: repeat(2, 1fr);
            margin: 0 -5px;
        }
    }

    @media (max-width: 480px) {
        .footer {
            grid-template-columns: 1fr;
            margin: 0;
        }
        
        .footer-section {
            padding: 0;
            margin-bottom: 20px;
        }
    }
</style>
</div>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3><?php echo ambil_isi_info('1','judul')?></h3>
                    <?php echo ambil_isi_info('1','isi')?>
                </div>
                <div class="footer-section">
                    <h3><?php echo ambil_isi_info('2','judul')?></h3>
                    <?php echo ambil_isi_info('2','isi')?>
                </div>
                <div class="footer-section">
                    <h3><?php echo ambil_isi_info('3','judul')?></h3>
                    <?php echo ambil_isi_info('3','isi')?>
                </div>
                <div class="footer-section">
                    <h3><?php echo ambil_isi_info('4','judul')?></h3>
                    <?php echo ambil_isi_info('4','isi')?>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2025. <b>Dinas Pendidikan Sumedang.</b> All Rights Reserved.
        </div>
    </div>
    
</body>
</html>