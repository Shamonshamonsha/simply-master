<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to Simply!!</title>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div>
            <header>
                <h1>Welcome to the home/index view</h1>
            </header>
            <p>
                You can find this html in <strong>app/views/</strong> folder,
                And the controller for this is located in <strong>app/controlles/</strong> folder.
            </p>
        </div>  
       <form action="<?php echo get_url(); ?>/home/test" method="post">
        <input type="text" name="name"><br>
        <input type="submit" value="test">
    </form>
    </body>
</html>
