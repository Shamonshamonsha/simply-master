<?php
/**
 * The default home controller, called when no controller/method has been passed
 * to the application.
 */
 class Home extends Controller
 {

	/**
     * The default controller method.
     *
     * @return void
     */
 	public function index()
 	{

 		$this->helper('form');
 		//index view
 		$this->view('home/index');		
 	}
 	public function test()
 	{
 		print_r($_POST);
 	}
 }
?>