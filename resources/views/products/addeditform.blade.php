<div class="modal fade" id="AddProduct" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" id="AddProductFrm" action="" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-rose">
                <h4 class="card-title mt-0">Product Details</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col">
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group col">
                    <select name="category_id" class="form-control" id="category_id">
                        <option value="" selected="">--Select Category--</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label id="category_id-error" class="error" for="category_id"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="number" name="price" id="price" class="form-control" placeholder="Price">
                      <div class="input-group-append">
                        <span class="input-group-text">$</span>
                      </div>
                    </div>
                    <label id="price-error" class="error" for="price" style="display: none;"></label>
                  </div>
                  <div class="form-group col">
                    <input type="file" name="image" id="image" class="form-control" style="display: none;" accept="image/*">
                    <input type="hidden" name="hidden_image" id="hidden_image">
                    <label for="image" class="btn btn-sm btn-primary">Choose File</label>
                    <img id="image_preview" src="{{asset('images/noimg.jpg')}}" style="width:100px">
                    <label id="image-error" class="error" for="image"></label>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>