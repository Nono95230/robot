@forelse($robot->tags as $tag)
    @if(isset($tagId) && $tagId == $tag->id)
        <div class="chip">
            <p>{{ $tag->name }}</p>
        </div>
    @else
        <div class="chip">
            <a href="{{ url('tag',$tag->id)}}">{{ $tag->name }}</a>
        </div>
    @endif
  @empty
@endforelse