<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Update Category</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        <form class="form-width" method="POST" action="{{route('category.update', $category->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="categoryName">Category name</label>
              <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
</x-layout>