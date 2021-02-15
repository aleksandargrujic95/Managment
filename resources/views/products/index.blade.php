<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i> Products</b></h5>
      </header>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Products</b></h2>
                </div>
                <div class="col-xs-6 ">
                  <a href="/products/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Product</span></a>
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>

                  </th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr class="{{$product->rented ? 'lager' : 'rented'}}">
                  <td>
                  </td>
                      <td class="product-image" ><img src="{{url('/images/' .$product->categories['image'])}}"></td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->rented ? 'On lager' : 'Rented'}}</td>
                  <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="edit" ><i class="fa fa-pencil"  title="Edit"></i></a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="dlt-form">
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
      <script>
        $(document).ready(function(){
          // Activate tooltip
          $('[data-toggle="tooltip"]').tooltip();

          // Select/Deselect checkboxes
          var checkbox = $('table tbody input[type="checkbox"]');
          $("#selectAll").click(function(){
            if(this.checked){
              checkbox.each(function(){
                this.checked = true;
              });
            } else{
              checkbox.each(function(){
                this.checked = false;
              });
            }
          });
          checkbox.click(function(){
            if(!this.checked){
              $("#selectAll").prop("checked", false);
            }
          });
        });
        </script>
</x-layout>
