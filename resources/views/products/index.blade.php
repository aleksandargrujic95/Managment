<x-layout>
    <!-- !PAGE CONTENT! -->
    <div class="table-body" class="therichpost-main" style="margin-left:300px;">
      <!-- Header -->
      <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-gamepad"></i> Products</b></h5>
      </header>
      <div class="therichpost-row-padding therichpost-margin-bottom">
        Categories
      </div>
      <div class="container">
        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-xl-9">
                  <h2>Manage <b>Employees</b></h2>
                </div>
                <div class="col-xs-6 ">
                  <a href="/product/create" class="btn btn-success" ><i class="material-icons"></i> <span>Add New Product</span></a>					
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>

                  </th>
                  <th>Name</th>
                  <th>Category</th>                 
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td>
                    <span class="custom-checkbox">
                      <label for="checkbox1"></label>
                    </span>
                  </td>                 
                      <td>{{$product->name}}</td>
                      <td>{{$product->category_id}}</td>
                  <td>
                    <a href="{{ route('product.edit', $product->id) }}" class="edit" ><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="dlt-form">
                      @csrf
                      @method('DELETE')
                      <button class="dlt-btn" type="submit" class="delete" ><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" title="Delete"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            <div class="clearfix">
              <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
              <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </div>
          </div>
        </div>        
        </div>
      <!-- Edit Modal HTML -->
      <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
              <div class="modal-header">						
                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">					
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" required>
                </div>					
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Modal HTML -->
      <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
              <div class="modal-header">						
                <h4 class="modal-title">Edit Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">					
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" required>
                </div>					
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-info" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Delete Modal HTML -->
      <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
              <div class="modal-header">						
                <h4 class="modal-title">Delete Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">					
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" value="Delete">
              </div>
            </form>
          </div>
        </div>
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