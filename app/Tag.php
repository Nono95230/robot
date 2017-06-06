<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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

    public function robots()
    {
        return $this->belongsToMany(Robot::class);
    }
    //doesn't work
    public function countRobotByTag()
    {
        $tagsCount = Tag::withCount('robots')->get();

        //return $this->robots_count;
        foreach ($tagsCount as $tag) {
        	if ($this->id=== $tag->id) {
	        	return $tag->robots_count;
        	}
        }

    }
    //doesn't work
    public function countRobotByTaggg()
    {
    	return DB::table('tags','robots')
            ->join('robot_tag', 'tags.id', '=', 'robot_tag.tag_id','robot.id','=','robot_tag.robot_id')
            ->select('tags.*')
            ->get();
    }


}
