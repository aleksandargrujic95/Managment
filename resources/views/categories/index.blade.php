<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i> Categories</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
      </div>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Categories</b></h2>
                </div>
                <div class="col-xs-6 ">
                  <a href="/categories/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Category</span></a>					
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>                
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td><img src="{{url('/images/' .$category->image)}}" alt=""></td>                 
                      <td>{{$category->name}}</td>
                  <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="edit" ><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="dlt-form">
                      @csrf
                      @method('DELETE')
                      <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" title="Delete"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            
          </div>
        </div>        
        </div>
     
        {!! $categories->links() !!}
</x-layout>