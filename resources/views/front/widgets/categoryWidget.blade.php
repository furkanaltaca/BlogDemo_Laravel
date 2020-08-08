<!-- Categories -->
<div class="card">
    <div class="card-header">
        Kategoriler
    </div>
</div>
<div class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item">
        <a href="#">{{$category->name}} </a><span class="float-right">(12)</span>
    </li>
    @endforeach
</div>