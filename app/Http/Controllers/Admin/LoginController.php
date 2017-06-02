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
         
            //dd($request->remember);  // $request->input('remember')
            //dd($request->email);  // $request->input('email')
            
            $this->validate($request, [
                'email' => 'bail|required|email|min:10|max:255',
                'password' => 'bail|required|between:8,10',
                'remember' => 'in:on'
            ],  [
                'email.required' => 'We need to know your e-mail address Toto !',
                'password.required' => 'The password field is FUCKING required !'
                // 'email.required' => 'email obligatoire',
                // 'email.email' => 'Syntax email non valide',
                // 'password.between' => 'le mot de passe doit être compris entre 8 à 10 caractères',
                // 'password.required' => 'le mot de passe est obligatoire'
            ]);
            
            // vérifions maintenant que l'utilisateur à les droit pour accèder à notre espace sécurité, pensez à faire un use Auth 
             if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
             
                session()->flash('message', 'Bienvenu dans le dashboard'); // enregistrer en variable de session
                
                return redirect()->intended('admin/dashboard'); // redirection propre au niveau de la sécurité
                
             
             }
             
             session()->flash('message', 'Mot de passe ou email invalide');
             
             return back()->withInput(['email' => $request->email]);
         }
        
        return view('auth.login');

    }

    public function logout(){
        auth()->logout();

        session()->flash('message', 'Thanks so much for visit');

        return redirect()->home();
    }


}

