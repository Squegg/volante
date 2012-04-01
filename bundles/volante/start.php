<?php
Autoloader::map(array(
	'Volante_Base_Controller' => path('bundle').'volante/controllers/base.php'
));

Autoloader::namespaces(array(
    'Volante' => path('bundle').'volante/core',
));