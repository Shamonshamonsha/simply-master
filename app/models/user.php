<?php    
 class User extends Model{
 	public $name;
 	public function __construct()
 	{
 	
 	}
 	public function get($name)
 	{
 		return Model::all($name);
 	} 
 }
?>