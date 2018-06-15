<?php
// MENU ACTIVE ELEMENT
function is_active( $routeNames ) {
	$routeNames = (array) $routeNames;
	foreach ( $routeNames as $routeName ) {
		if ( Route::is( $routeName ) ) {
			return ' active';
		}
	}
	return '';
}
