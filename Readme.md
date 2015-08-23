Simply
-------------------------------------
A simple PHP MVC Framework
-------------------------------------
Installation
----------
1.Download the ripo

2.copy the folder simply-master to htdocs

3.open the url simply-master/public.

4.If you intend to use database open the app/core/Model.php with a text editor and set your database settings(change the  values of $config array to  your configuration). 

Routing
----------
The segments in the URL usually represent:

mywebsite.com/class/function/param1

1.Class represnt the controller class that should invoked.

2.Second section represents the class function should be called.

3.Third segment represent parameters passed for that function.

eg:mywebsite.com/welcome/index/2 shuold invoke the function index() that found in 
   app/controllers/welcome.php.


   class Welcome extends Controller
   {

    public function index($id)
    {
       echo 'From url'.$id;
    }

   }
   
Note:If you will get 404 error open app/core/App.php and replaces the following two lines
 
 unset($url[0]);
 return $url=array_values($url); 
  with this line return $url;
 You can find it in parseUrl() method.

Database Refernece
-------------------------
 For using Databases, open the app/core/Model.php with a text editor and set your database settings(change the  values of $config array to  your configuration).

 In order to use a model you should create a model class in app/models folder.

Usage:
  create a class model user.php in app/models folder

 class User extends Model
 {

 }

 In your controller you can load the user model like this.
 //load the model user and returns a model object.
 $user=$this->model('User');

 Database Functions 
 --------------------
 1.all(<tablename string>,<id string>)

   Perfoms select query in database.
   returns array of results.
   Usage:

    a.$user->all('student'); //executes SELECT * FROM `student` and returns array of result.

    b.$user->all('student','2') //executes SELECT * FROM `student` where `id`='2'.
 2.insert(<tablename string>,<columnname-values array>)

 	 Perfoms insert query in database.
 	 return true if success else return false.
 	 Usage:
 	 a.$user->insert('student',['id'=>'1','name'=>'jhon','mark'=>'50']).  
 	 //executes INSERT INTO `student`(`id`, `name`, `mark`) VALUES ('1','jhon','50')

3.delete(<tablename string>,<id string>)

	Perfoms delete query in database.
 	return true if success else return false.
 	Usage:
 	a.$user->delete('student'); //execute DELETE FROM `student`.

 	b.$user->delete('student','2'); //execute DELETE FROM `student` WHERE `id`='2'.

4.update(<tablename string>,<array of columnname-values array>,<id string>)

	Perfoms update query in database.
 	return true if success else return false.
    Usage:

    a.$user->update('student',['name'=>'rahul','mark'=>'100']);
     //executes UPDATE `student` SET `name`="rahul",`mark`="100".

    b.$user->update('student',['name'=>'rahul','mark'=>'100'],'2');
    //executes UPDATE `student` SET `name`="rahul",`mark`="100" WHERE `id`='2'.

5.customQuery(<query string>,<parameters array>)

   userdefined query's can be executed.
   returns array of result in the case of select query ,otherwise returns number of
   affected rows.
   Usage:

   a.$user->customQuery($query,$data); 
   $query="delete  from `student` where `id`=? and `mark`=?";
   $data=['2','50']
   //executes delete  from `student` where `id`='2' and `mark`='50' and returns number of affected rows.

   b.$user->customQuery($query,$data);

     $query="select * from `student` where `id`=? and `mark`=?";
     $data=['2','50'];
     //executes select *   from `student` where `id`='2' and `mark`='50'
     and returns the result as array.