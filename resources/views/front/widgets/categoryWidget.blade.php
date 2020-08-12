@isset($categories)
<!-- Categories -->
<div class="card">
    <div class="card-header">
        Kategoriler
    </div>
</div>
<div class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
        <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif >{{$category->name}} </a>
        <span class="float-right">({{$category->getNewsCount()}})</span>
    </li>
    @endforeach
</div>
@endif