<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i>Create Product</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
          <form class="form-width" method="POST" action="/products">
          @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="productName">Product name</label>
                <input type="text" class="form-control" placeholder="Enter product name" name="name">
              </div>
              <div class="form-group col-md-6">
                <label for="inputProductValue4">Product Value</label>
                <input type="Product Value" class="form-control" id="inputProductValue4" placeholder="Product Value" name="value">
              </div>
            </div>
            <div class="form-group">
              <label for="example-date-input" class="col-7 col-form-label">Date of Purchase</label>
              <input class="form-control" type="date" name="date_of_purchase" value="today_parsed" id="example-date-input">
            </div>
            <div class="form-group">
              <label for="inputComment">Comment</label>
              <input type="text" class="form-control" id="inputComment" placeholder="Add Product Comment" name="comment">
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputSerialKey">Serial Key</label>
                <input type="text" class="form-control" id="inputSerialKey" name="serial_key">
              </div>
              <div class="form-group col-md-3">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"  name='category_id'>
                    <option selected>Choose...</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group col-md-6">
                <div class="rate">
                  <p>Condition:</p>
                  <input type="radio" id="star5" name="condition" value="5" />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" id="star4" name="condition" value="4" />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" name="condition" value="3" />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" name="condition" value="2" />
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" name="condition" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
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
