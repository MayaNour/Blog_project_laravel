<div id="sidebar">
    <div id="style1">
      <div class="first">
        <h2>Category</h2>
        <ul class="style2">
            @foreach ($tags as $tag)
            <li><a href="/tags/{{ $tag->id }}"> {{ $tag->name }}</a></li>		
            @endforeach
        </ul>
      </div>
    </div>
</div>
