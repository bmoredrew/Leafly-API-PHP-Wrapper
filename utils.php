<?php
function wp_dump()
{
	foreach ( func_get_args() as $arg )
	{
		echo '<pre style="font-family:monaco;font-size:12px;background:#fff;border:1px solid #ccc;padding:1em;margin:1em;">';
		var_dump( $arg );
		echo '</pre>';
	}
}