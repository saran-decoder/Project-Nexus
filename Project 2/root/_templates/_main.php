<!DOCTYPE html>
<html lang="en">
    <head>
        <?php Session::loadTemplates('_head'); ?>
    </head>
    <body>

        <?php
        
            if (Session::$isError) {
                Session::loadTemplates('_error');
            } else {
                Session::loadTemplates(Session::currentfile());
            }

        ?>

        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!-- Tost JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    </body>

    <!-- Custom JavaScript -->
    <script src="<?=get_config('root_path');?>assets/_js/script.js"></script>

    <script>
		// Initialize the agent at application startup.
		const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
			.then(FingerprintJS => FingerprintJS.load())

		// Get the visitor identifier when you need it.
		fpPromise
			.then(fp => fp.get())
			.then(result => {
				// This is the visitor identifier:
				const visitorId = result.visitorId

				// set a cookie 
				setCookie('fingerprint', visitorId, 1);
			})
	</script>
    
</html>