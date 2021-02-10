<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Update Product</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        <form class="form-width" method="POST" action="{{route('products.update', $product->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="productName">Product name</label>
              <input type="text" class="form-control" placeholder="Enter product name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group" >
                <div class="col-auto my-1 drpdwn">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='category_id'>
                      <option selected" value="{{$product->category_id}}</option>}}">Choose...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
</x-layout>