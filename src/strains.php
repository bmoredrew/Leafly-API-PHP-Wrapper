<?php
class Leafly_Strains
{

	public function __construct()
	{
		$this->connection = Leafly_Connector::init( false, false );
	}

	public function get_strain( $slug )
	{
		return $this->connection->query( null, 'strains', $slug );
	}

	public function search( $args )
	{
		return $this->connection->query( $args, 'strains' );
	}

}