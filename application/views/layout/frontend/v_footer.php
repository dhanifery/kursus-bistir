</main>

<footer>
        <div class="container">
                <div class="footer-logo">
                        <img class="logo-img" src="<?= base_url()?>assets/images/logo.png">
                        <a href="" class="logo">BI<span class="danger">-STIR</span></a>
                </div>
                <p class="text">&copy; Copyright 2022. All rights reserved</p>
                <ul>
                        <li>
                                <a href="" class="media">
                                        <i class="uil uil-facebook-f"></i>
                                </a>
                        </li>
                        <li>
                                <a href="" class="media">
                                        <i class="uil uil-twitter"></i>
                                </a>
                        </li>
                        <li>
                                <a href="" class="media">
                                        <i class="uil uil-dribbble"></i>
                                </a>
                        </li>
                </ul>
        </div>
</footer>

<!-- Javascript files -->


<script src="<?= base_url()?>/assets/js/mixitup.min.js"></script> 
<script src="<?= base_url()?>/assets/js/home_js.js"></script>

<script>
               $(document).ready( function () {
                    $('#datatable').DataTable({
                         "lengthChange": false,
                    });
               } );
          </script>
<script>
        window.setTimeout(function() {
                $(".alert").fadeTo(500,0).slideUp(500, function(){
                $(this).remove();
        });
        },3000)
</script>
</body>
</html>