$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}

$(document).ready(function() {
    $('select').select2({ width: '100%', placeholder: "Select Category", allowClear: true });
});

function LoadTable(page = 1){
    $('#table_orders').html('<table class="list-table table"><tr><td colspan="9"><center>Loading ...</center></td></tr></table>');
    $.ajax({
        type:'GET',
        data:{page:page},
        url:products,
        success:function(data){
            $('#table_orders').html('');
            $('#table_orders').html(data);
            $('button').attr('disabled',false);
            $('button[type="submit"]').html('Save');
        }
    });
}

LoadTable();

function readURL(input) {
  if (input.files && input.files[0]) {
    if(input.files[0].size > ini_limit.replace('M','000000') || input.files[0].size > 2000000){
      toastr.error('File is too large');
      return;
    }
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#image_preview').attr('src', e.target.result).attr('width','200px');
        $('#image_preview').parents().find('a').attr('href',e.target.result);
        $('#image-error').hide();
      }
      reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function(){
  readURL(this);
});

$("#category_id").change(function(){
  $('#category_id-error').hide();
});

$.validator.setDefaults({ 
  ignore: [],
});

$.validator.addMethod("ImageValidate", function(value, element, params) {
  if($('#hidden_image').val()){
    return false;
  }else{
    return true;
  }
}, $.validator.format("Please enter the correct value for {0} + {1}"));

$("#AddProductFrm").validate({
  rules: {
    name: {
      required: true,
      maxlength: 50
    },
    category_id: {
      required: true,
    },
    price: {
      required: true,
      number: true,
      min: 100,
      max: 10000
    },
    image: {
      required: function () {
        return $("#hidden_image").val().length === 0;
      },
      accept: 'image/*',
    },
  },
  messages: {
    name: {
      maxlength: "Maximum 50 Characters!",
      required: "Please Enter Name!"
    },
    category_id: {
      required: "Please Select Category!",
    },
    price: {
      required: "Please Enter Price!",
    },
    image: {
      required: "Please Select Image!",
      accept: 'Only Image files allowed',
    }
  }
});

$("#AddProductFrm").on('submit',function(e){
  e.preventDefault();
  var data = new FormData(this);
  // data.append('image',document.getElementById('image').files[0]);
  if($('#AddProductFrm').valid()){
    $.ajax({
      type:'POST',
      url:product_store,
      data:data,
      contentType:false,
      cache:false,
      processData:false,
      dataType:"json",
      success:function(data){
        if(data.error){
          toastr.error(data.error);
        }else{
          $('#AddProduct').modal('hide');
          $('button').attr('disabled',false);
          ClearForm();
          LoadTable();
          Swal.fire(
             data.msg,
             'Saved',
             data.status
          );
        }
      },error:function(){
          $('button').attr('disabled',false);
      }
    });
  }
});

$('#close').on('click', function(){
  ClearForm();
});

function ClearForm(){
    $('#AddProductFrm')[0].reset();
    $('#AddProductFrm input').val('');
    $('#category_id').val('').trigger('change');
    $('#image_preview').attr('src',default_image);
    $('label.error').hide();
}

$(document).on('click','.pagination a',function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    LoadTable(page);
    $('body,html').animate({
        scrollTop: 100
    }, 600);
});

$(document).on('change','.switch_check',function(){
  var url = $(this).data('url');
  var id = $(this).data('id');
  var value = $(this).prop('checked');
  if($(this).prop('checked') == true){
    value = 1;
  }else{
    value = 0;
  }
  $.ajax({
    type:'PUT',
    url:url,
    data:{id:id,value:value},
    success:function(data){
      toastr.success(data.msg);
    },error:function(){
      
      toastr.error('Something went wrong');
    }
  });
});

$(document).on('click','.edit',function(){
  var url = $(this).data('action');
  var id = $(this).data('id');
  $.ajax({
    type:'GET',
    url:url,
    data:{id:id},
    success:function(data){
      $('#id').val(data.id);
      $('#name').val(data.name);
      $('#price').val(data.price);
      $('#description').val(data.description);
      if($('#image_preview').parent().find('a').length == 0){
        $('#image_preview').attr('src',data.image).wrap('<a data-fancybox="gallery" href="'+data.image+'">');
      }else{
        $('#image_preview').parents().find('a').attr('href',e.target.result); 
      }      
      $('#hidden_image').val(data.image);
      $('#category_id').val(data.category_id).trigger('change');
      $('#AddProduct').modal('show');
    }
  });
});

$(document).on('click','.view',function(){
  var url = $(this).data('action');
  var id = $(this).data('id');
  $.ajax({
    type:'GET',
    url:url,
    data:{id:id},
    success:function(data){
      $('#view_modal').html('');
      $('#view_modal').html(data);
      $('#viewProduct').modal('show');
    }
  });
});

$(document).on('click','.delete' ,function(){
    var url = $(this).data('action');
    var id = $(this).data('id');
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
            data:{id:id},
            success:function(data){
                LoadTable();
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                   data.msg,
                  'success'
                )
            }
        });
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your Product is safe :)',
          'error'
        )
      }
    });   
});

