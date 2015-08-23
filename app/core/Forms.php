<?php
/**
 * The  class.
 *
 * Handles the form and their actions
 * and executes the proper methods for various operations.
 *
 */
 
class Forms 
{
	/**
     *Open the form tag in view file
     * and setup the action controller function
     * @return void
     */
	public function open($action,$method='get')
	{
		
		echo '<form action="" method="'.$method.'">';
	}
	public function close()
	{
		echo '</form>';
	}
	
}

?>