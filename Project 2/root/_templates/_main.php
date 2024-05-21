<!DOCTYPE html>
<html lang="en">
    <head>
        <?php Session::loadTemplates('_head'); ?>
    </head>
    <body>

        <?php
        
            if (Session::$isError) {
                // Session::loadTemplates(); TODO: Implemente a error page
            } else {
                Session::loadTemplates(Session::currentfile());
            }

        ?>

        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- Tost JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    </body>

    <!-- Custom JavaScript -->
    <script src="<?=get_config('root_path');?>assets/_js/script.js"></script>
    
</html>