@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
<link href="{{ asset('css/orders.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    {{ __('Dashboard') }}
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#AddOrder">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="list-table table table-hover my">
                          <thead class="">
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Rate</th>
                            <th>Unit</th>
                            <th>Qty</th>
                            <th>Disc%</th>
                            <th>Net Amt.</th>
                            <th>Total Amt.</th>
                            <th>Action</th>
                          </thead>
                          <tbody id="table_orders">
                          </tbody>
                        </table>
                  </div>
                  <input type="hidden" id="FinalTotalAmount">
                  <button type="button" class="btn btn-success pull-right" id="final_submit" >
                   Submit  <span id="FinalTotalAmount_text"> </span> </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddOrder" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form method="post" id="AddOrderFrm" action="{{route('orders.store')}}">
         @csrf
        <div class="modal-body">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-rose">
                  <h4 class="card-title mt-0">New Order</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="CustomerName" id="CustomerName" class="form-control" placeholder="Customer Name">
                  </div>
                  <div class="form-group">
                    <select name="Product_Name" class="form-control" id="Product_Name">
                        <option value="">--Select Product--</option>
                        @foreach($products as $product)
                        <option data-rate = "{{$product->Rate}}" data-unit = "{{$product->Unit}}" value="{{$product->Product_ID}}">{{$product->Product_Name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <label id="Product_Name-error" class="error" for="Product_Name" style="display: none;"></label>
                    <div class="row">
                        <div class="form-group col">
                            <input type="number" name="Qty" id="Qty" class="form-control">
                        </div>
                        <div class="form-group col">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              </div>
                              <input type="number" name="Disc_Percentage" id="Disc_Percentage" class="form-control" value="0">
                              <div class="input-group-append">
                                <span class="input-group-text">%</span>
                              </div>
                            </div>
                            <label id="Disc_Percentage-error" class="error" for="Disc_Percentage" style="display: none;"></label>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Unit</th>
                            <td>
                                <input type="hidden" name="Rate" id="Rate">
                                <span class="rates" id="Rate_text"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Rate</th>
                            <td>
                                <input type="hidden" name="Unit" id="Unit">
                                <span class="rates" id="Unit_text"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Net Amount</th>
                            <td>
                                <input type="hidden" name="NetAmount" id="NetAmount">
                                <span class="rates" id="NetAmount_text"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>
                                <input type="hidden" name="TotalAmount" id="TotalAmount">
                                <span class="rates" id="TotalAmount_text"></span>
                            </td>
                        </tr>
                    </table>
                  </div>
               </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    var orders = "{{route('orders.index')}}";
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="{{ asset('js/orders.js') }}"></script>
@endsection