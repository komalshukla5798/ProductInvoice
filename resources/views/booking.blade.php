@extends('layouts.template')
@section('content')
 <div class="col-md-8 offset-2">
<div class="card">
  <div class="card-header">
    <h4 align="center">Book Slots</h4>
  </div>
    <div class="card-body">
    <div class="col-md-12">
      <form method="POST" id="form">
  @csrf
<input type="date" name="date"><br><br>
<div id="available_slots"></div>
<div class="text-center">
  <button type="submit" class="btn btn-success"> Save</button>
</div>
</form>
</div>
</div>
</div>
</div>
<style type="text/css">
  .check{
    background: #17a673;
    color: black;
  }
</style>
<script>

  $( function() {
    $( "#datepicker" ).datepicker();
  });

  var weekday = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

  function GetDate(date){
   var html = [];
  	$.ajax({
  		url:'{{route("CheckSlots")}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  		data:{date:date},
  		type:"POST",
  		success:function(response){
        $.each(response,function(key,val){
         $('#available_slots').html(val);
        });
       }
  	})
  }

    $(document).on('change', '[name="date"]', function() { 
       GetDate($(this).val());
    });

  $('#form').on('submit', function(e) { 
    e.preventDefault();
    $.ajax({
      url:'{{route("BookSlot")}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: $('#form').serialize(),
      type:"POST",
      cache : false,
      processData: false,
      dataType:'json',
      success:function(response){
           GetDate(response.date);
      }
    })
   });
  </script>
@endsection