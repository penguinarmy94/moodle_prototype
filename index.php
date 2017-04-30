<?php


//require_once ("src/views/view.php");
require_once ("src/views/AdminMapView.php");
require_once ("src/views/TeacherMapView.php");
require_once ("src/views/EditMapView.php");
//require_once("vendor/autoload.php");
require_once ("src/views/EditMapCourseView.php");
require_once ("src/views/AdminMapView.php");
//require_once ("src/views/LoginView.php");
require_once ("src/controllers/navigationcontroller.php");

use moodle\views as VIEW;

$session_data =  [];
//'courses' -> an array fo course abbrev.
//'ids' -> an array of course id corresponding to abbrev
//'finished' -> ids that correspond to what courses the user has finished
//'map' -> matrix of the next courses they can take
//'role' -> user role (0= admin, 1= teacher, 2= student)
//'user_role' -> id of user
//'name' ->



$number = 3;
//if (!isset($_REQUEST['c'])) {
if ($number == 0) {
    $session_data['user_role'] = 0;
    $session_data['user_name'] = "Jorge Aguiniga";
    $session_data['user_id'] = "008214700";
    $a = new VIEW\AdminMapView($session_data);
    $a->render();
}
else if ($number == 1) {
    $session_data['students'] = [['user_id'=>2, 'first_name'=> "Jorge", 'last_name'=> "Aguiniga", 'map_name'=> "SE Fall 2016"], ['user_id'=>4, 'first_name'=> "Luis", 'last_name'=> "Otero", 'map_name'=> "SE Fall 2016"], ['user_id'=>7, 'first_name'=> "Kevin", 'last_name'=> "Dang", 'map_name'=> "SE Spring 2016"], ['user_id'=>14, 'first_name'=> "Yoho", 'last_name'=> "Chen", 'map_name'=> "SE Spring 2016"], ['user_id'=>19, 'first_name'=> "Andrew", 'last_name'=> "Javier", 'map_name'=> "CMPE Fall 2014"], ['user_id'=>20, 'first_name'=> "Jonathan", 'last_name'=> "Chen", 'map_name'=> "CMPE Fall 2014"]];
    $session_data['user_role'] = 1;
    $session_data['user_name'] = "Andy Kwan";
    $session_data['user_id'] = 1;
    $a = new TeacherMapView($session_data);
    $a->render();
}
else if ($number == 2) {
    $session_data['maps'] = [['map_id' => 1, 'map_name' => "SE Fall 2014", 'major_name' => "Software Engineering Fall 2014"], ['map_id' => 2, 'map_name' => "SE Fall 2016", 'major_name' => "Software Engineering Fall 2016"], ['map_id' => 3, 'map_name' => "SE Spring 2016", 'major_name' => "Software Engineering Fall 2016"], ['map_id' => 4, 'map_name' => "CMPE Fall 2016", 'major_name' => "Software Engineering Fall 2016"], ['map_id' => 5, 'map_name' => "CMPE Spring 2016", 'major_name' => "Software Engineering Fall 2016"],];
    $session_data['user_role'] = 0;
    $session_data['user_name'] = "Jorge Aguiniga";
    $session_data['user_id'] = 1;
    $a = new EditMapView($session_data);
    $a->render();
}
else if ($number == 3) {
    $session_data['courses'] = [['course_id' => 1, 'course_name'=> "Calculus I", 'course_abbrev' => "MATH030"],
    ['course_id' => 3, 'course_name'=> "Discrete Mathematics", 'course_abbrev' => "MATH042"],
    ['course_id' => 6, 'course_name'=> "Calculus II", 'course_abbrev' => "MATH031"],
    ['course_id' => 9, 'course_name'=> "Calculus III", 'course_abbrev' => "MATH032"],
    ['course_id' => 10, 'course_name'=> "Introduction to Programming", 'course_abbrev' => "CS046A"],
    ['course_id' => 11, 'course_name'=> "Introduction to Data Structures", 'course_abbrev' => "CS046B"],
    ['course_id' => 14, 'course_name'=> "Data Structures and Algorithms", 'course_abbrev' => "CS146"],
    ['course_id' => 16, 'course_name'=> "Computer Organization and Architecture", 'course_abbrev' => "CMPE120"],
    ['course_id' => 17, 'course_name'=> "Object Oriented Design", 'course_abbrev' => "CS151"],
    ['course_id' => 23, 'course_name'=> "Software Engineering I", 'course_abbrev' => "CMPE131"],
    ['course_id' => 24, 'course_name'=> "Software Engineering II", 'course_abbrev' => "CMPE133"],
    ['course_id' => 25, 'course_name'=> "Wireless Mobile Software Engineering", 'course_abbrev' => "CMPE137"],
    ['course_id' => 28, 'course_name'=> "Enterprise Software Platforms", 'course_abbrev' => "CMPE172"],
    ['course_id' => 29, 'course_name'=> "Computer Networks I", 'course_abbrev' => "CMPE148"],
    ['course_id' => 30, 'course_name'=> "Computer and Human Interaction", 'course_abbrev' => "ISE164"],
    ['course_id' => 31, 'course_name'=> "Intro Biology", 'course_abbrev' => "BIOL10"],
    ['course_id' => 33, 'course_name'=> "Senior Design Project I", 'course_abbrev' => "CMPE195A"],
    ['course_id' => 34, 'course_name'=> "Senior Design Project II", 'course_abbrev' => "CMPE195B"]];
    $session_data['map_id'] = 1;
    $session_data['map_name'] = "SE Fall 2012";
    $session_data['user_role'] = 0;
    $session_data['user_name'] = "Jorge Aguiniga";
    $session_data['user_id'] = 1;
    $a = new EditMapCourseView($session_data);
    $a->render();
}
else if(isset($_POST['add']))
{
	/*
    $class = new VIEW\View();
    $method = "render";
    $class->$method();
    echo "<div>".$_POST['add']."</div>";
	*/
}
else if (isset($_REQUEST['c']) && isset($_REQUEST['m']))
{
	$class = $_REQUEST['c'];
	if($class == "NavigationController")
	{
		$class = 'moodle\\controllers\\'.$class;
		$class = new $class();
		$user['first'] = "Kevin";
		$user['last'] = "Dang";
		$user['major'] = "Software Engineering";
		$method = $_REQUEST['m'];
		$class->$method($user);
	}
}
else
{
    $session_data['user_role'] = 0;
    $session_data['user_name'] = "Jorge Aguiniga";
    $session_data['user_id'] = "008214700";
    $a = new VIEW\AdminMapView($session_data);
    $a->render();
}