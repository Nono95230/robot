<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Requests\TagRequest;

class TagController extends Controller
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
        $tags = Tag::all();
        $nb_tag = count($tags);

        $tagsCount = Tag::withCount('robots')->get();

        return view('back.tag.index', [ 'tags' => $tags, 'title' => 'Liste des tags', 'tagsCount' => $tagsCount, 'nb_tag' => $nb_tag, 'limit' => 100 ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Tag::class); 

        return view('back.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->all());

        $tag->save();

        $message = [
            'success',
            sprintf('Thanks for add the tag "%s" !', $tag->name)
        ];
        
        return redirect()->route('tag.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $this->authorize('update', $tag);

        $title = 'Edit the tag : '. $tag->name;

        return view('back.tag.edit', compact('tag','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $this->authorize('update', $tag);

        $tag->update($request->all());

        $message = [
            'success',
            sprintf('Update of the tag "%s" performed successfully !', $tag->name)
        ];

        return redirect()->route('tag.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->authorize('delete', $tag); // politique d'accès 

        $tagName = $tag->name;
        $tag->delete();

        $message = [
            'success',
            sprintf('Delete of the tag "%s" performed successfully !', $tagName)
        ];

        return redirect()->route('tag.index')->with('message', $message);
    }
}
