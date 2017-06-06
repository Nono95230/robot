<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct(Request $request)
    {
        view()->composer('partials.nav', function($view) use($request) {

            $currentPath = $request->path();
            $view->with('currentPath',$currentPath);
            $categories = DB::table('categories')->select('id', 'title')->get();
            $view->with('categories',$categories);
        });
    }

    public function login(Request $request) {

         if($request->isMethod('post'))
         {
            
            $this->validate($request, [
                'email' => 'bail|required|email|min:10|max:255',
                'password' => 'bail|required|between:8,10',
                'remember' => 'in:on'
            ],  [
                'email.required' => 'We need to know your e-mail address !',
                'password.required' => 'The password field is FUCKING required !'
            ]);
            
            // vérifions maintenant que l'utilisateur à les droit pour accèder à notre espace sécurité, pensez à faire un use Auth 
             if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                
                $userName = Auth::user()->name;

                $message = [
                    'success',
                    sprintf('Bienvenue %s',$userName)
                ];

                session()->flash('message', $message); // enregistrer en variable de session
                
                return redirect()->intended('admin/dashboard'); // redirection propre au niveau de la sécurité
                
             
             }
             
            $message = [
                'error',
                sprintf('Mot de passe ou email invalide')
            ];

            session()->flash('message', $message);

            return back()->withInput(['email' => $request->email]);

         }
        
        return view('auth.login');

    }

    public function logout(){

        $userName = Auth::user()->name;

        auth()->logout();

        $message = [
            'success',
            sprintf('Thanks so much for visit %s', $userName)
        ];
        session()->flash('message', $message);

        return redirect()->home();
    }


}

