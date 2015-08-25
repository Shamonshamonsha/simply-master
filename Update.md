FORM HANDLING
------------------------
If you intend to use the form load the form helper in your controller like this way

$this->helper('form');

You can change the base_url in get_url() method which is found in  app/helpers/form_helper.php

FUNCTIONS 
------------------------
1.form_open(action controller/function, form method);
 
 opens the html form tag.

 Default is method is get.

 Usage:

 <?php echo form_open('home/test','post')  ?>

 Its output looks like

 <form action="http://localhost/simply-master/public/home/test" method="post"> 

You can get the form data in test() method which is in home controller.

eg:

class home extends Controller
{
	//handles the form action of  "http://localhost/simply-master/public/home/test"

	public function test()
	{
	  print_r($_POST);
    }
}

2.form_close()

Closes the html form tag

Alternatively you can use this method to open the form 

<form action="<?php echo get_url();?>/home/test" method="post">

</form>







