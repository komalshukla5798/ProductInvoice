@extends('layouts.template')
@section('content')
<?php $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; ?>
 <div class="col-md-8 offset-2">
   <div class="card">
 	<div class="card-header">
    <h4 align="center">Available Slots</h4>
  </div>
  <div class="card-body">
  	<div class="col-md-12">
  		<form method="POST" id="form">
 	<?php foreach ($loop as $slot) { ?>
    <?php if(is_string($slot)){  ?>
          <div class="row">
 		  <div class="col-md-3"><input type="hidden" name="day[]" value="<?= $slot; ?>"><?= $slot; ?></div>
 		  <div class="col-md-4"><?php Fnc($slot,'start[]'); ?></div>
 	    <div class="col-md-4"><?php Fnc($slot,'end[]'); ?></div>
    </div><br>
 <?php }else{ ?>
   <div class="row">
      <input type="hidden" name="id[]" value="<?= @$slot['id'] ?? '' ?>">
      <div class="col-md-3"><input type="hidden" name="day[]"><?= $slot->day; ?></div>
      <div class="col-md-4"><?php Fnc($slot->start,'start[]'); ?></div>
      <div class="col-md-4"><?php Fnc($slot->end,'end[]'); ?></div>
    </div><br>
 <?php } }  ?>
  
 	<div class="text-center">
  <button type="submit" class="btn btn-success"> Save</button></div>
 </form>
 	</div>
 </div>
 </div>
</div>

<?php function Fnc($day,$type){ ?>
	<select class="form-control" value="<?= $day ?>" name="<?= $type ?>">
		<option value="">HH:MM</option>
    <?php for ($x = "00"; $x <= "24"; $x++) { ?>
 	 <option value="<?php CheckNum($x); ?>" <?php if(($x) == $day){ echo 'selected' ; } ?>><?php CheckNum($x); ?></option>
 <?php } ?> 
 </select>
<?php } ?>

<script type="text/javascript">
   $('#form').on('submit', function(e) { 
    e.preventDefault();
    $.ajax({
      url:'{{route("BookDays")}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data:$('#form').serialize(),
      type:"POST",
      success:function(response){
        $.each(response,function(key,val){
         $('#available_slots').html(val);
        });
       }
    })
      });
</script>
@endsection

