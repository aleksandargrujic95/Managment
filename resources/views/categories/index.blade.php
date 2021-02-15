<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"><h5><b><i class="fa fa-gamepad"></i> Categories</b></h5></div>
            <div class="col-md-2"><a href="categories/create" class="btn btn-info">Add New Category</a></div>
          </div>
        </div>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom"> 

          @php
            $counter = 1;    
          @endphp
          @foreach ($categories as $category)
            @if ($counter%3 == 1)
              <div class="card-group">
            @endif
            <div class="card category-card col-md-3" >
              <div class="category-image">
                <img class="card-img-top" src="{{url('/images/' .$category->image)}}" alt="{{$category->name}}">
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
                <a href="/categories/{{$category->id}}" class="btn btn-primary">Products</a>
                <a href="/categories/{{$category->id}}/edit" class="btn btn-success">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="dlt-form">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </div>
            </div>
            @if ($counter%3 == 0)
              </div>
            @endif
            @php
                $counter++;
            @endphp
          @endforeach
      </div>
        {!! $categories->links() !!}
</x-layout>