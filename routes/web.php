<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/{name}', function ($name = 'tony') {

    return "hello Laravel, je suis $name";

    //return view('welcome');
});

Route::get('/category/{id}/{slug?}', function ($id, $slug = '') {

    $slug = empty($slug)? 'no slug' : $slug;

    return "Les robots de la catégorie: $id, slug: $slug";
    //return view('welcome');
});*/



Route::get('/', 'FrontController@index')->name('home');
Route::get('robot/{id}/{slug?}', 'FrontController@showRobot');


//Category
Route::get('category/{id}', 'FrontController@showRobotByCategory');


//Tags
Route::get('tag/{id}', 'FrontController@showRobotByTag');


//Login
// Route::get('auth/login', 'Admin\LoginController@login');
// Route::post('auth/login', 'Admin\LoginController@login');
Route::any('admin/login', 'Admin\LoginController@login')->name('login'); // traiter en même temps le post et le get (verb HTTP)
Route::get('admin/logout','Admin\LoginController@logout')->name('logout');

//Dashboard Admin
//Route::get('admin/dashboard', 'Admin\DashboardController@index');

Route::group(['middleware' => 'auth'], function(){

	Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('admin/robot', 'Admin\RobotController');
    Route::resource('admin/user', 'Admin\UserController');
    Route::resource('admin/tag', 'Admin\TagController');
    Route::resource('admin/category', 'Admin\CategoryController');

});

/*
class A{}

class B{
	public function __construct(A $a){
    	$this->a = $a;
    }
    public function message(){
    	return "Hello world";
    }
}
dump( (new B (new A) ) ) ;



dump( app()->make('B') ) ;
class Student
{

    protected $ip;

    // le constructeur récupère son IP
    public function __construct(string $ip)
    {
        $this->ip = $ip;
        $this->id =  uniqid('', true);
    }
}
app()->bind('Student', function($app){

	return new Student ($app->make('request')->getClientIp() );

});

class StatRobot
{

    protected $robot;

    public function __construct(App\Robot $robot)
    {
        $this->robot = $robot;
    }

    public function count(){
        return  $this->robot->countPublished() ;
    }
}
app()->singleton('StatRobot', function($app){
	return new StatRobot($app->make('App\Robot'));
});
*/

/*
class StatAll{



    public function __construct(){

        $dashboard = config('dashboard');

        for ($i=0; $i < count($dashboard); $i++) { 
            $entity = $dashboard[$i]['machine-name'];
            $dashboard[$i]['count'] = DB::table($entity)->count('id');
        }
        dump($dashboard);
        return $dashboard;
    }


}*/

/*
        //Works correctly
        app()->make('StatAll', function(){
            return new StatAll();
        });

        //Works correctly    
        app()->make(StatAll::class, function(){
            return new StatAll();
        });


*/