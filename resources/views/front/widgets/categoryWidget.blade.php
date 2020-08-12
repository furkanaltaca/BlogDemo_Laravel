@isset($categories)
<!-- Categories -->
<div class="card">
    <div class="card-header">
        Kategoriler
    </div>
</div>
<div class="list-group">
    @foreach($categories as $category)
    <a 
    class="list-group-item @if(Request::segment(2)==$category->slug) active @endif "
    @if(Request::segment(2)!=$category->slug) href="{{ route('category',$category->slug) }}" @endif
    >
        {{$category->name}}
        <span class="float-right">({{$category->getNewsCount()}})</span>
    </a>
    @endforeach
</div>
@endif