<?php

namespace App;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


use Auth;

class Robot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'description',
		'category_id',
		'status',
		'link'
	];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNameAttribute($value) {

        $this->attributes['name'] = ucfirst($value);
        $this->attributes['slug'] = str_slug($value);

    }

    /*
     *
     * doesn't work, i don't understand why, so i make the function getUserId() & setUserId()
     * 
     */
    /*
    public function setUserIdAttribute($value) {
        $this->attributes['user_id'] = Auth::user()->id;
    }
    */

    public function getUserId(){
        return Auth::user()->id;
    }

    public function setUserId($value){
        $this->attributes['user_id'] = $value;
    }

    public function setStatusAttribute($value){
        $this->attributes['status'] = $value;
        $this->attributes['published_at'] = ( $value ==='published')? Carbon::now() : null;
    }

    public function isTag(int $tagId){
        foreach($this->tags as $tag){
        	if($tag->id == $tagId) return true;
        }
        return false;
    }


    public function scopeCount($query) {
        return $query->count('id');
    }


    public function scopeCountPublished($query) {
        return $query->count('status','published');
    }


    public function scopePowerAvg($query, $rate = 50)
    {
         return $query->select('type', DB::raw('AVG(power) as m'),DB::raw('COUNT(id) as nb'))
                ->groupBy('type')
                ->havingRaw(sprintf('m >= %d', $rate))
                ->get();
    }

    
}
