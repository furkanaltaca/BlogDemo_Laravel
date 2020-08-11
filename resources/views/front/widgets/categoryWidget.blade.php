@isset($categories)
<!-- Categories -->
<div class="card">
    <div class="card-header">
        Kategoriler
    </div>
</div>
<div class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item">
        <a href="#">{{$category->name}} </a><span class="float-right">({{$category->getNewsCount()}})</span>
    </li>
    @endforeach
</div>
@endif