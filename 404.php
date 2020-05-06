<?php
include("connect.php");
$page = '404';
?>
<!DOCTYPE html>
<html>
<head>
        <?php include_once('include_css.php') ?>


    </head>


    <body>

        <!-- Loader -->
        <?php include_once('include_loader.php') ?>

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="wrapper-page">
                            <img src="assets/images/animat-search-color.gif" alt="" >
                            <h2 class="text-uppercase text-danger">Page Not Found</h2>
                            <p class="text-muted">It's looking like you may have taken a wrong turn. Don't worry... it
                                happens to the best of us. You might want to check your internet connection. Here's a
                                little tip that might help you get back on track.</p>

                            <a class="btn btn-success waves-effect waves-light m-t-20" href="<?php echo SITEURL."index"?>"> Return Home</a>
                        </div>

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
       <?php include_once('include_js.php') ?>

    </body>

<!-- Mirrored from coderthemes.com/zircos/material-design/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Apr 2018 11:11:45 GMT -->
</html>