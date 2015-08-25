<?php  
/**
 * The  Application file
 *
 * Conatains various functions for handling form data processing
 *
 */

/**
  * get the base url of the website
  * 
  * @return string $url current url
 */
function get_url()
{
	$base_url="http://localhost/simply-master/public";
	return  $base_url;

}
/**
  * opens the form tag 
  * @param string spefifies the action controller 
  * @return void
 */
function form_open($url,$method='get')
{
	$base=get_url();
	echo '<form action="'.$base.'/'.$url.'" method="'.$method.'">';
}
function form_close()
{
	echo '</form>';
}
?>