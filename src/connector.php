<?php
class Leafly_Connector
{
	public static $instance; 

	protected $app_id;
	protected $app_key;

	const API_URL = 'http://data.leafly.com';

	// Singleton
	public static function init( $app_id = false, $app_key = false )
	{
		null == self::$instance && self::$instance = new self( $app_id, $app_key );
		return self::$instance;
	}

	private function __construct( $app_id, $app_key )
	{
		$this->app_id = $app_id;
		$this->app_key = $app_key;
	}

	public function query( $data, $category, $name = false )
	{
		$ch = curl_init();

		// build API url
		$url = self::API_URL . '/' . $category;

		if ( $name )
		{
			$url .= '/' . $name;
		}
		else
		{
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $data ) );
		}
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'APP_ID:' . $this->app_id, 'APP_KEY:' . $this->app_key ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		
		$response = curl_exec( $ch );

		return json_decode( $response );
	}

}
