<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
    protected $fillable = [
		'name'
	];
    public function robots()
    {
        return $this->belongsToMany(Robot::class);
    }

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
    public function countRobotByTaggg()
    {
    	return DB::table('tags','robots')
            ->join('robot_tag', 'tags.id', '=', 'robot_tag.tag_id','robot.id','=','robot_tag.robot_id')
            ->select('tags.*')
            ->get();
    }


}
