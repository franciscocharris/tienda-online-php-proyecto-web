<?php

class Database{
	public static function connect(){
		$db = new mysqli('mysql-franciscocharrisweb.alwaysdata.net', '254147', '1francisco2345', 'franciscocharrisweb_tienda-online');
		// $db = new mysqli('localhost', 'root', '', 'tienda_master');
		$db->query(" SET NAMES 'utf8'");
		return $db;
	}
}