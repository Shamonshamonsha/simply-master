<?php
/**
 * The application class.
 *
 * Handles the request database operations
 * and executes the proper methods for various operations.
 *
 */  
/*setting up the database connection parameters--*/
$config=array(
  'hostname'=>'localhost',
  'username'=>'root',
   'password'=>'',
   'database'=>'tutorials'
  );

  class Model{
    
	/*
    * stroes the connection object from controller
    *
    *@var string
    */
  	public $connect;

  	/**
     * Connect the database to mysql
     * and setup the connction object for db operations
     * @return void
     */
  	public function connectToDatabase()
  	{
  		
      global $config;
      try
  		{
  			$this->connect=new PDO('mysql:host='.$config['hostname'].';dbname='.$config['database'],$config['username'],$config['password']);
  			//$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
  		}
  		catch(Exception $e)
  		{
  			echo '<h4>Database Connection error</h4>
  			<p>Configure the connection object with proper values</p>';

  		}
  	}
    /**
     * Execute the select query in database 
     * and returns the values as array
     * @param  string $table tablename
     * @param  integer $id primary key of the table
     * @return array
     */
    public function all($table,$id='')
    {
      
      Model::connectToDatabase();
      $query= $id?"SELECT * FROM ".$table." WHERE `id`=?":"SELECT * FROM ".$table;
      $r=$this->connect->prepare($query);
      $id?$r->execute(array($id)):$r->execute();
      return $r->rowCount()?$r->FetchAll(PDO::FETCH_ASSOC):'No rows found';
      
    }
    /**
     * Execute the insert  query in database 
     * and returns number of affeted rows
     * @param string $table name of the table
     * @param  array  $data key-value pairs of column name and values 
     * @return integer number of affected rows
     */
    public function insert($table,$data)
    {

      $query='INSERT INTO '.$table.'(';
      $i=0;

      //for adding column names
      foreach($data as $key=>$val)
      {
        $query.=$key.',';
        if($i==sizeof($data)-1)
        {
          $query=substr($query,0,strlen($query)-1).') VALUES (';
        }
         $i++;
      }

      //for adding values
      for($i=0;$i<sizeof($data);$i++)
      {
        $query.='?,';
        if($i==sizeof($data)-1)
        {
          $query=substr($query,0,strlen($query)-1).')';
        }
      }

      Model::connectToDatabase();
      $r=$this->connect->prepare($query);
      $r->execute(array_values($data));
      return $r->rowCount()?true:false;
    }
    /**
     * Execute the delete  query in database 
     * and returns number of affeted rows
     * @param  string  $table tablename
     * @param  integer $id primarkey of the table  
     * @return boolean 
     */
    public function delete($table,$id='')
    {
      Model::connectToDatabase();
      $query= $id?"DELETE FROM ".$table." WHERE `id`=?":"DELETE FROM ".$table;
      $r=$this->connect->prepare($query);
      $id?$r->execute(array($id)):$r->execute();
      return $r->rowCount()?true:false;
    }
    /**
     * Execute the update  query in database 
     * and returns number of affeted rows
     * @param  string  $table tablename
     * @param array $data parameters for the query
     * @param  integer $id primarkey of the table  
     * @return integer
     */
    public function update($table,$data=[],$id='')
    {

      $data=array('name'=>'manu','mark'=>'50');
      $query="UPDATE ".$table." SET ";
      $i=0;
      foreach($data as $key=>$val)
      {
        $query.=$key.'=?,';
        if($i==sizeof($data)-1)
        {
          $query=substr($query,0,strlen($query)-1);
        }
        $i++;
      }

      $query= $id?$query.'WHERE `id`=?':$query;
      Model::connectToDatabase();
      $r=$this->connect->prepare($query);
      $data=array_values($data);
      $id?$data[]=$id:$data;
      $r->execute($data);
      return $r->rowCount()?$r->rowCount():0;

    }
    /**
     * Execute the user defined query in database
     * and returns array of values if query is select else return number of affected rows
     * @param  string  $query user defind query
     * @param  array  $data array of values for query execution
     * @return array if the query is select otherwise returns number of affected rows
     */
    public function customQuery($query,$data=[])
    {
      
      Model::connectToDatabase();
      $r=$this->connect->prepare($query);
      $data?$r->execute($data):$r->execute();
      $temp=$r->fetchAll(PDO::FETCH_ASSOC);
      return $temp?$temp:$r->rowCount();
      
    }
  }
?>