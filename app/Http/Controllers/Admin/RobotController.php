<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\RobotRequest;
use DB;
use App\Robot;
use App\Tag;
use App\Category;
use App\User;

class RobotController extends Controller
{

    use UserAdmin;
    public function __construct(Request $request){

        $this->setUser();

        view()->composer('partials.nav', function($view) use($request) {

            $currentPath = $request->path();
            $view->with('currentPath',$currentPath);
            $categories = DB::table('categories')->select('id', 'title')->get();
            $view->with('categories',$categories);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $robots = Robot::all();
        $all_robot = count($robots);
        
        return view('back.robot.index', ['robots' => $robots, 'title' => 'Liste des robots', 'number_robots'=>$all_robot,'limit'=>100]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        $this->authorize('create', Robot::class); // politique d'accès 

        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('name', 'id');

        return view('back.robot.create', ['categories' => $categories,'tags'=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RobotRequest $request)
    {
        $robot = Robot::create($request->all());
        $robot->tags()->sync($request->tags);

        // Save User Id
        $userId = $robot->getUserId();
        $robot->setUserId($userId);

        if ($request->hasFile('link')) {

            $file = $request->link;
            $ext  = $file->extension();

            $linkName = str_random(12) . '.' . $ext;

            $file->storeAs('images', $linkName );

            $robot->link = $linkName;

        }
        $robot->save();
        $message = [
            'success',
            sprintf('Thanks for add the robot %s !', $robot->name)
        ];
        
        return redirect()->route('robot.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {

        $this->authorize('update', Robot::class); // politique d'accès 

        $robot = Robot::findOrFail($id); 
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('name', 'id');
        $robotTags = $robot->tags->pluck('name', 'id');
        //dd($robot->description);
        //$title = sprintf('Editer le Robot : %s', $robot->name);
        $title = 'Edit the robot : '. $robot->name;

        return view('back.robot.edit', compact('robot', 'robotTags', 'categories', 'tags', 'title'));
    }*/
    public function edit(Robot $robot)
    {
        $this->authorize('update', $robot); // politique d'accès 

        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('name', 'id');
        $robotTags = $robot->tags->pluck('name', 'id');
        //dd($robot->description);
        //$title = sprintf('Editer le Robot : %s', $robot->name);
        $title = 'Edit the robot : '. $robot->name;

        return view('back.robot.edit', compact('robot', 'robotTags', 'categories', 'tags', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RobotRequest $request, Robot $robot)
    {
        $this->authorize('update', $robot);//add today @todo arnaud à supprimer si bug sinon virer ce comm
        //dd($request->all()); 
        
        //$robot = Robot::find($id);//@todo arnaud this to !
        $robot->update($request->all());
        
        $robot->tags()->sync($request->tags); // detach puis un attach <=> la mise des jours des tags du robot

        //$message = sprintf('Mise à jour du robot %s effectuée avec succès !', $robot->name);
        $message = [
            'success',
            sprintf('Update of the robot %s performed successfully !', $robot->name)
        ];

        return redirect()->route('robot.index')->with('message', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /*public function destroy(Request $request, $id)
    {
        //dd($request->all()); 
        //dd($id); 
        $robot = Robot::find($id);
        $message = sprintf('Suppression du robot %s effectuée avec succès !', $robot->name);
        $robot->delete();

        return redirect()->route('robot.index')->with('message', $message);

    }*/
    public function destroy(Robot $robot)
    {
       /* if ( !Gate::allows('destroy',$robot) ) {
            abort(403,'Unauthorized action');
        }*/
        $this->authorize('delete', $robot); // politique d'accès 
        
        //dd($request->all()); 
        //dd($id); 
        //
       /* $robot = Robot::find($id);
        $message = sprintf('Suppression du robot %s effectuée avec succès !', $robot->name);
        $robot->delete();*/

        $robotName = $robot->name;
        $robot->delete();

        $message = [
            'success',
            sprintf('Suppression du robot %s effectuée avec succès !', $robotName)
        ];

        return redirect()->route('robot.index')->with('message', $message);

    }
}
