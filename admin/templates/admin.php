<div class="wrap">
	<h1>Tekstit kauppahaulle</h1>
	<?php 
	// mm: Display errors, if any
	settings_errors(); 
	?>

    <form method="post" action="options.php">
	    <?php
		
			// mm: Display all custom fields of plugin and submit button	
		
            settings_fields( 'kauppahaku_settings' );
            do_settings_sections( 'kauppahaun-kentat' );
	    	submit_button();
	    ?>
	</form>
</div>