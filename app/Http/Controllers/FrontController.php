<?php

namespace App\Http\Controllers;

use DB;
use App\Robot; // alias pour composer
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller {

    public function __construct(Request $request){

        view()->composer('partials.nav', function($view) use($request) {

            $currentPath = $request->path();
            $view->with('currentPath',$currentPath);
            $categories = DB::table('categories')->select('id', 'title')->get();
            $view->with('categories',$categories);
        });

    }


    public function index() {

        $robots = Robot::all(); // select * from robots
        $all_robot = count($robots);

        // echo '<pre>',print_r($categories,1),'</pre>';
        // echo '<pre>',print_r($robot,1),'</pre>';
        // die();
        

        return view('front.home', ['robots' => $robots, 'title' => 'Liste des robots', 'number_robots'=>$all_robot,'limit'=>100]);

    }



    public function showRobot($id, $slug='') {

        $robot = Robot::findOrFail($id); // select * from one robot
        $category = $robot->category ?  $robot->category->title : 'Sans catégorie';
        $title = $robot->name;

        // echo '<pre>',print_r($robot,1),'</pre>';
        // die();
        return view('front.single', compact('robot' ,'title', 'category'));//['robot' => $robot,'title'=>$title, 'category'=>$category]

    }



    public function showRobotByTag($id) {

        $robots = Tag::findOrFail($id)->robots;
        $title = 'All Robots of Tag : '. Tag::findOrFail($id)->name;
        $limit = 100;
        $tagId = $id;

        return view('front.tag', compact('robots','title','limit','tagId'));//['robot' => $robot,'title'=>$title, 'category'=>$category]
       
    }

    public function showRobotByCategory($id) {

        $robots = Category::findOrFail($id)->robots;
        $title = 'All Robots of Category : '. Tag::findOrFail($id)->name;
        $limit = 100;
        $categoryId = $id;

        return view('front.category', compact('robots','title','limit','categoryId'));//['robot' => $robot,'title'=>$title, 'category'=>$category]
       
    }




}
