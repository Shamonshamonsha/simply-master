<?php 
/**
 * The application class.
 *
 * Handles the request for each call to the application
 * and calls the chosen controller and method after splitting the URL.
 *
 */

 class App
 {
 	/**
     * Stores the controller from the split URL
     *
     * @var string
     */
 	protected $controller="home";

 	 /**
     * Stores the method from the split URL
     * @var string
     */
 	protected $method="index";

	/**
     * Stores the parameters from the split URL
     * @var array
     */
 	protected $params=[];

 	public function __construct()
 	{
 		$url=$this->parseUrl();
 	    if(file_exists('../app/controllers/'.$url[0].'.php'))
 		{
 			$this->controller=$url[0];
 			unset($url[0]);
 		}
        if(isset($url[0])&&!file_exists('../app/controllers/'.$url[0].'.php'))
        {
        	echo '<h2>Unable to load  the controller :'.$url[0].'.php</h2>';
        	return;
        }
 		require_once '../app/controllers/'.$this->controller.'.php';
 		$this->controller=new $this->controller;
 		if(isset($url[1]))
 		{
 			if(method_exists($this->controller,$url[1]))
 			{
 				$this->method=$url[1];
 				unset($url[1]);
 			}
 			else
 			{
 				echo '<h2>Unable to load the method:&nbsp;'.$url[1].'()</h2>';
 				return;
 			}
 		}
 		$this->params=$url?array_values($url):[];
 		call_user_func_array([$this->controller,$this->method],$this->params);
 	}
 	/**
     * Parse the URL for the current request. Effectivly splits it, stores the controller
     * and the method for that controller.
     *
     * @return url $url return url as array
     */
 	public function parseUrl()
 	{
 		if(isset($_GET['url']))
 		{

 			$url=explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
 			//if the routing didn't work properly comment the following two lines and use this
 			/* return $url; */
 			unset($url[0]);
 			return array_values($url);
 		}
 	}
    public function loadFrom()
    {
        echo 'form loaded';
    }
 }
?>