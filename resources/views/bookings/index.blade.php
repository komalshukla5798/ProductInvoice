@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    {{ __('Bookings') }}
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#AddProduct">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive" id="table_orders">
                        Hello {{$detail->user->name}}
                        You have booked {{$detail->slots->count()}} tables with {{$detail->remaining_seats ?? 'No'}} extra seats on {{$detail->date}} for {{$detail->guests}} guests.
                        Items Which are Ordered In this slot is listed as below
                        <div class="row">
                        @foreach($detail->slots as $key => $slots)
                        <div class="col">

                        <table class="list-table table table-hover my">
                        <tr>
                            <th colspan="5">{{$slots->table->name}} - ID {{$slots->table_id}}</th>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Net Price</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Statement</th>
                        </tr>
                        @foreach($slots->slot_items as $slot_items)
                        <tr>
                            
                            <td>{{$slot_items->items->name}}</td>
                            <td>{{$slot_items->items->category->name}}</td>
                            <td>{{$slot_items->items->price}}</td>
                            <td>{{$slot_items->quantity}}</td>
                            <td>{{$slot_items->amount}}</td>
                        </tr>
                        @endforeach
                        </table>
                        <table class="list-table table table-hover my">
                        <tr>
                            <th>Slot ID</th>
                            <th>Table ID</th>
                            <th>Booked Slot</th>
                            <th>Duration</th>
                            <th>Stay Discount</th>
                            <th>Stay Charge</th>
                            <th>Net Amount</th>
                            <th>Total Amount</th>
                        </tr>
                        <tr>
                            <td>{{$slots->id}}</td>
                            <td>{{$slots->table_id}}</td>
                            <td>{{$slots->booked_slots}}</td>
                            <td>{{$slots->duration}}</td>
                            <td>{{$slots->stay_discount}}</td>
                            <td>{{$slots->stay_charge}}</td>
                            <td>{{$slots->net_amount}}</td>
                            <td>{{$slots->total_amount}}</td>
                        </tr>
                        </table>
                        </div>

                    @endforeach
                </div>
               
                    Total Billing of slots are as shown below

                    <table class="list-table table table-hover my">
                    <tr>
                        <th>Booking ID</th>
                        <th>Discount</th>
                        <th>Extra Seat Charge</th>
                        <th>Tax Charge</th>
                        <th>Gross Amount</th>
                        <th>Tax Amount</th>
                        <th>Net Amount</th>
                        <th>Tip</th>
                        <th>Total Amount</th>
                        <th>Payment Mode</th>
                    </tr>
                    <tr>
                        <td>{{$detail->id}}</td>
                        <td>{{$detail->discount}}</td>
                        <td>{{$detail->extra_seats}}</td>
                        <td>{{$detail->extra_seat_charge}}</td>
                        <td>{{$detail->extra_seat_charge}}</td>
                        <td>{{$detail->net_amount}}</td>
                        <td>${{array_sum(array_column($detail->slots->toArray(),"tip"))}}</td>
                        <td>{{$detail->total_amount}}</td>
                    </tr>
                    </table>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('bookings.create')
<div id="view_modal"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endsection