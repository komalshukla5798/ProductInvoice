<div class="modal fade" id="AddProduct" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" id="AddProductFrm" action="" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-rose">
                <h4 class="card-title mt-0">Booking Details</h4>
              </div>
              <div class="card-body">
               <div class="form-group">
                <input type="hidden" name="id" id="id">
                <input type="number" name="guests" id="guests" class="form-control" placeholder="Guests">
               </div>
               <div class="form-group">
                  <input type="date" name="date" id="date" class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                  <table class="list-table table table-hover my">
                    <thead class="">
                        <th>Select</th>
                        <th>Table Name</th>
                        <th>Capacity</th>
                        <th>Avilable Time</th>
                    </thead>
                    <tbody id="table_orders">
                        <td><input type="checkbox"></td>
                        <td>Table 1</td>
                        <td>3</td>
                        <td>10:00 to 11:00</td>
                    </tbody>
                  </table>
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