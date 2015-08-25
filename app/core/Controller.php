<?php  
 /**
 * The controller class.
 *
 * The base controller for all other controllers. Extend this for each
 * created controller and get access to it's wonderful functionality.
 */
 class Controller
 {

    /**
     * Load a model
     *
     * @param string $model The name of the model to load
     *
     * @return object
     */
 	public function model($model)
 	{
 		if(!file_exists('../app/models/'.$model.'.php'))
 		{
 			echo '<h4>Unable to load the model:&nbsp;'.$model.'.php</h4>';
 			return;
 		}
 		require_once '../app/models/'.$model.'.php';
 		return new $model();
 	}
 	/**
     * Render a view
     *
     * @param string $viewName The name of the view to include
     * @param array  $data Any data that needs to be available within the view
     *
     * @return void
     */
 	public function view($view,$data=[]){
 		if(!file_exists('../app/views/'.$view.'.php'))
 		{
 			$this->show404Error('The requested view cant find on this server');
 			return;
 		}
 		require_once '../app/views/'.$view.'.php';
 	}
 	/**
     * Render  error page
     *
     * @param string $error error message to be displayed
     *
     * @return void
     */
 	public function show404Error($error)
 	{
 		require_once '../app/views/error.php';
 	}
    /**
     * Load the helper file
     *
     * @param $name file-name of the helper
     * @return void
     */
    public function helper($name)
    {
       
             if(!file_exists('../app/helpers/'.$name.'_helper.php'))
            {
                echo '<h4>Unable to load the helper file:&nbsp;'.$name.'_helper.php</h4>';
                return;
            }
            require_once('../app/helpers/'.$name.'_helper.php');    
    }
 }
  
?>