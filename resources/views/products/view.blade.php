<div class="modal fade" id="viewProduct" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-rose">
                <h4 class="card-title mt-0">Product Details</h4>
              </div>
              <div class="card-body">
                <table class="view-table table table-hover my">
                  <tr>
                    <th>Product ID</th>
                    <td>{{$product['id']}}</td>
                  </tr>
                  <tr>
                    <th>Product Name</th>
                    <td>{{$product['name']}}</td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td>{{$product['category']['name']}}</td>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <td>${{$product['price']}}</td>
                  </tr>
                  <tr>
                    <th>Image</th>
                    <td>
                      <a data-fancybox="gallery" href="{{$product['image']}}"><img src="{{$product['image']}}" style="width:50%"></a>
                    </td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>
                      @if($product['description']) {!! $product['description'] !!} @else N/A @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                      @if($product['is_active'] == 1) Active @else Inactive @endif
                    </td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
	</div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
