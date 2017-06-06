<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
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
        $categories = Category::all();
        $nb_category = count($categories);

        return view('back.category.index', ['categories' => $categories, 'title' => 'Liste des catégories', 'nb_category'=>$nb_category,'limit'=>100]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class); // politique d'accès 

        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        $category->save();

        $message = [
            'success',
            sprintf('Thanks for add the category "%s" !', $category->title)
        ];
        
        return redirect()->route('category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        $title = 'Edit the category : '. $category->title;

        return view('back.category.edit', compact('category','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $category->update($request->all());

        $message = [
            'success',
            sprintf('Update of the category "%s" performed successfully !', $category->title)
        ];

        return redirect()->route('category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category); // politique d'accès 

        $categoryName = $category->title;
        $category->delete();

        $message = [
            'success',
            sprintf('Delete of the category "%s" performed successfully !', $categoryName)
        ];
        return redirect()->route('category.index')->with('message', $message);
    }
}
