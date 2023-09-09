$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
});

$(document).on('change','#Product_Name,#Qty,#Disc_Percentage', function(){
    Calculate();
});

$(document).on('change','.Product_Name,.Qty,.Disc_Percentage', function(){
    var dataid = $(this).parent('td').parent('tr').data('id');
    var Product_Name = $('#Product_Name_'+dataid).val();
    var rate = parseFloat($('#Product_Name_'+dataid+' option:selected').data('rate')).toFixed(2);
    var unit = $('#Product_Name_'+dataid+' option:selected').data('unit');
    $('#Rate_'+dataid).html(rate +' ₹');
    $('#Unit_'+dataid).html(unit);
    var Disc_Percentage = $('#Disc_Percentage_'+dataid).val();
    var Qty = $('#Qty_'+dataid).val();
    if(Disc_Percentage && Qty){
        var NetAmount = parseFloat(rate - (rate * Disc_Percentage/100)).toFixed(2);
        var TotalAmount = parseFloat(NetAmount * Qty).toFixed(2);
        $('#NetAmount_'+dataid).html(NetAmount + ' ₹');
        $('#TotalAmount_'+dataid).html(TotalAmount + ' ₹');
        var FinalTotalAmount = getTotalAmount();
    } 
    var data = {id:dataid,Product_Name:Product_Name,Rate:rate,Qty:Qty,Disc_Percentage:Disc_Percentage,Unit:unit,NetAmount:NetAmount,TotalAmount:TotalAmount,FinalTotalAmount:FinalTotalAmount};
    UpdateOrder(data);
});

function getTotalAmount(){
    var FinalTotalAmount = 0;
    $('.TotalAmount').each(function () {
        FinalTotalAmount += parseFloat($(this).html());
    });
    $('#FinalTotalAmount').val(FinalTotalAmount);
    $('#FinalTotalAmount_text').html(FinalTotalAmount + ' ₹');
    return FinalTotalAmount;
}

function getAmount(){
    var FinalTotalAmount = 0;
    $('.TotalAmount').each(function () {
        FinalTotalAmount += parseFloat($(this).html());
    });
    if(FinalTotalAmount){
        $('.FinalTotalAmount').show();
        $('#FinalTotalAmount').val(FinalTotalAmount);
        $('#FinalTotalAmount_text').html(FinalTotalAmount + ' ₹');
    }
}

function UpdateOrder(data){
    $.ajax({
        type:'POST',
        url:$('#AddOrderFrm').attr('action'),
        data:data,
        success:function(){
            LoadTable();
        },error:function(){
            LoadTable();
        }
    });
}

function Calculate(){
    var product_value = $('#Product_Name').val();
    if(product_value){
        var rate = $('#Product_Name option:selected').data('rate');
        var rate = parseFloat(rate).toFixed(2);
        var unit = $('#Product_Name option:selected').data('unit');
        $('#Rate').val(rate);
        $('#Unit').val(unit);
        $('#Rate_text').html(rate +' ₹');
        $('#Unit_text').html(unit);
        $('.product_details').show();
        var Disc_Percentage = $('#Disc_Percentage').val();
        var Qty = $('#Qty').val();
        if(Disc_Percentage && Qty){
            var NetAmount = parseFloat(rate - (rate * Disc_Percentage/100)).toFixed(2);
            var TotalAmount = parseFloat(NetAmount * Qty).toFixed(2);
            $('#NetAmount').val(NetAmount);
            $('#TotalAmount').val(TotalAmount);
            $('#NetAmount_text').html(NetAmount + ' ₹');
            $('#TotalAmount_text').html(TotalAmount + ' ₹');
            getTotalAmount();
            $('.amount_details').show();
        }   
    }
}

function ClearForm(){
    $('#AddOrderFrm')[0].reset();
    $('#AddOrderFrm input').val('');
    $('#Product_Name').val('').trigger('change');
    $('#Rate_text,#Unit_text,#NetAmount_text,#TotalAmount_text').html('');
    $('label.error').hide();
    $('#Disc_Percentage').val(0);
}

function LoadTable(){
    $('#table_orders').html('<tr><td colspan="8"><center>Loading ...</center></td></tr>');
    $.ajax({
        type:'GET',
        url:orders,
        success:function(data){
            $('#table_orders').html('');
            $('#table_orders').html(data);
            $('button').attr('disabled',false);
            $('button[type="submit"]').html('Save');
            getAmount();
        }
    });
}

LoadTable();

$('#close').on('click', function(){
  ClearForm();
});

$('#AddOrderFrm').on('submit',function(e){
    e.preventDefault();
    if ($(this).valid()) {
        $('button').attr('disabled',true);
        $('button[type="submit"]').html('Waiting ... ');
        Swal.fire('Please wait');
        Swal.showLoading();
        var formData = $(this).serialize();
        formData.FinalTotalAmount = getTotalAmount();
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        $.ajax({
            type:method,
            url:action,
            data:formData,
            success:function(){
                $('#AddOrder').modal('hide');
                $('button').attr('disabled',false);
                ClearForm();
                LoadTable();
                Swal.fire(
                  'Good job!',
                  'Saved',
                  'success'
                );
            },error:function(){
                $('button').attr('disabled',false);
            }
        });
    }
});

$(document).on('click','#EditOrder', function(){
    var actualhtml = $(this).html();
    $(this).html('Wait');
    $('.card-title').html('Update Order');
    var url = $(this).data('action');
    $.ajax({
        type:'GET',
        url:url,
        success:function(data){
            $.each(data,function(index,value){
                if(index == 'Product_Name') { 
                    $('#Product_Name').val(value).prop('selected',true).trigger('change');
                } else if(index == 'Unit') { 
                    $('#'+index+'_text').html(value);
                } else if(index == 'Rate' || index == 'NetAmount' ||index == 'TotalAmount') { 
                    $('#'+index+'_text').html(value + ' ₹');
                    $('#'+index).val(value);
                } else { 
                    $('#'+index).val(value);
                }
            });
            $('#AddOrder').modal('show');
            $('#EditOrder').html(actualhtml);
            LoadTable();
        }
    });
});

$(document).on('click','#RemoveOrder' ,function(){
    var url = $(this).data('action');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-rose'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type:'DELETE',
            url:url,
            success:function(data){
                $('#AddOrder').modal('hide');
                LoadTable();
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your order has been deleted.',
                  'success'
                )
            }
        });
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your order is safe :)',
          'error'
        )
      }
    });   
});

$(document).on('click','#final_submit', function(){
    Swal.fire('Please wait');
    Swal.showLoading();
    $.ajax({
        type:'POST',
        url:$('#AddOrderFrm').attr('action'),
        data:{final_submit:true},
        success:function(data){
            if(data.success){
                Swal.fire(
                  'Good job!',
                   data.success,
                  'success'
                );
                LoadTable();
            }
        }
    });
});

$( "#AddOrderFrm" ).validate({
  rules: {
    CustomerName: {
      required: true,
      maxlength: 50
    },
    Product_Name: {
      required: true,
    },
    Qty: {
      required: true,
    },
    Disc_Percentage: {
      required: true,
      number: true,
      min: 0,
      max: 100
    },
  },
  messages: {
    CustomerName: {
        maxlength: "Maximum 50 Characters!",
        required: "Please Enter Name!"
    },
      Product_Name: {
      required: "Please Select Product!",
    },
    Qty: {
      required: "Please Enter Quantity!",
    },
    Disc_Percentage: {
        required: "Not Valid",
        number: "Not Valid",
        min: "Min 0 %",
        max: "Max 100%"
      }
    }
});