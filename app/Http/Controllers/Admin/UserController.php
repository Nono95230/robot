<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;


class UserController extends Controller
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
        $users = User::all();
        $nb_user = count($users);

        return view('back.user.index', ['users' => $users, 'title' => 'Liste des utilisateurs', 'nb_user'=>$nb_user,'limit'=>100]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class); // politique d'accès 

        return view( 'back.user.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        $user = User::create($request->all());

        $user->save();

        $message = [
            'success',
            sprintf('Thanks for add the user "%s" !', $user->name)
        ];
        
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user); // politique d'accès 

        $title = 'Edit the user : '. $user->name;

        return view('back.user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $this->authorize('update', $user);

        if ($user->exists){
            if ( !$request->get('password') == '' ) {
                // doesn't work actually @todo arnaud : make it 's working
                //$user::$rules['password'] = 'bail|required|between:8,10';
                $data = $request->except('confirm_password');
            }
            else{
                $data = $request->except('password','confirm_password');
            }
            

            $user->update($data);

            $message = [
                'success',
                sprintf('Update of the user %s performed successfully !', $user->name)
            ];

            return redirect()->route('user.index')->with('message', $message);
        }

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user); // politique d'accès 

        $userName = $user->name;
        $user->delete();

        $message = [
            'success',
            sprintf('Suppression de l\'utilisateur %s effectuée avec succès !', $userName)
        ];

        return redirect()->route('user.index')->with('message', $message);
    }
}
