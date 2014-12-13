<!doctype html>
<head>
	<title>Leafly Test</title>
	<style type="text/css">
	body{ font: 14px helvetica,sans-serif; color: #433; }
	</style>
</head>
<body>

	<h1>Leafly API Testing</h1>

<?php

$api_url = 'http://data.leafly.com';
$app_id = 'YOUR_ID_HERE';
$app_key = 'YOUR_KEY_HERE';

include dirname( __FILE__ ) . '/utils.php';
include dirname( __FILE__ ) . '/src/leafly.php';

Leafly_Connector::init( $app_id, $app_key );

$strains = new Leafly_Strains();

if ( isset( $_GET['strain'] ) )
{
	$strain = $strains->get_strain( $_GET['strain'] );
}

$search = $strains->search( array( 'take' => 2, 'page' => 0 ) );

foreach ( $search->Strains as $strain )
{
?>
	<h3><?php echo $strain->Name; ?></h3>
	<h4>Category: <em><?php echo $strain->Category; ?></em></h4>
	<p><strong>Negative effects:</strong></p>
	<ul>
		<?php foreach ( $strain->NegativeEffects as $effect ) : ?>
		<li><?php echo $effect->Name; ?></li>
		<?php endforeach; ?>
	</ul>
	<hr>
<?php
}

?>
</body>
</html>