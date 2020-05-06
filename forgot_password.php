<?php 
include_once('connect.php');
$db->rpcheckNotLogin();
$page = RESET_PASSWORD_TITLE;

?>

<html>
<head>
    <title><?php echo RESET_PASSWORD_TITLE.'| '.SITENAME; ?></title>
    <?php include_once('include_css.php') ?>
</head>
<body class="user-page">
<main class="main-wrapper">
    <?php include_once('include_header.php'); ?>
    <section>
        <div class="container">
            <div class="row no-gutters user-form">
            <div class="col-md-6 bg-primary-1 p-5 d-none d-md-flex flex-column justify-content-center text-white">
                    <h2 class="h2 title"><?php echo WLCOME_TO.SITENAME; ?></h2>
                    <p><?php echo FORGOT_PASSWORD_DESCRIPTION; ?></p>
                </div>
                <div class="col-md-6 p-3 p-sm-5 bg-white">
                    <div class="card border-0 rounded-0 h-100">
                        <div class="card-body">
                            <h3 class="h3 text-center mb-5"><strong><?php echo RESET_PASSWORD; ?></strong></h3>
                            <form method="post" name="forgot-password-form" id="forgot-password-form" action="<?php echo SITEURL; ?>process-forgot-password/">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="<?php echo EMAIL; ?>" name="email">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary-1 btn-lg btn-block rounded-pill px-4"><?php echo RESET_PASSWORD_BUTTON; ?></button>
                                </div>
                            </form>
                            <p class="mb-0 small text-center"><?php echo GO_BACK_TO; ?> <a href="<?php echo SITEURL; ?>"><?php echo LOGIN_PAGE; ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- CDN -->
<?php include_once('include_js.php') ?>
<script type="text/javascript">
    $("#forgot-password-form").validate({
        ignore : [],
        rules: 
        {
            email:{required : true,email: true}
        },
        messages: {
            email:{required:"<?php echo PLEASE_ENTER_EMAIL; ?>", email : "<?php echo PLEASE_ENTER_VALID_EMAIL; ?>"}
        }, 
        errorPlacement: function (error, element) 
        {
            error.insertAfter(element);
        }
    });
</script>
</body>
</html>