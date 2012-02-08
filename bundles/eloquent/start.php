<?php
Laravel\Autoloader::map(array(
	'Eloquent\\Model'    => path('bundle').'eloquent/model'.EXT,
	'Eloquent\\Hydrator' => path('bundle').'eloquent/hydrator'.EXT,
));