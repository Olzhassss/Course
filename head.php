<head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Importing Bootstrap -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
    <!-- Importing custom stylesheets and short style to write in '<style>' tag if detected -->
    <?php
    if (isset($custom_stylesheets))
    {
        foreach ($custom_stylesheets as $value)
        {
            echo "<link rel='stylesheet' href=$temp/stylesheets/$value>".PHP_EOL;
        }
    }
    if (isset($custom_styles))
    {
        echo "<style> $custom_styles </style>".PHP_EOL;
    }
    ?>
    <!-- If the title was provided in variable 'title' earlier on webrage, then use custom title, else default one -->
    <title>
    	<?php
    	if(isset($title))
    	{
    		echo $title;
    	}
    	else
    	{
    		echo 'Olzhas\'s website';
    	}
    	?>
    </title>	
</head>