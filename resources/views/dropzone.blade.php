<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Image Upload in Laravel using Dropzone</title>
  <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
  <link href="{{URL::asset('css/dropzone.css')}}" rel="stylesheet"/>
  <link href="{{URL::asset('css/drop.css')}}" rel="stylesheet"/>
  <link href="{{URL::asset('css/cropper.css')}}" rel="stylesheet"/>
  <script src="{{URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery-ui.js')}}"></script>
  <script src="{{URL::asset('js/drop.js')}}"></script>
  <script src="{{URL::asset('js/cropper.js')}}"></script>
  <script src="{{URL::asset('js/dropzone.js')}}"></script>
 </head>
 <body>
  <div class="container-fluid">
      <br />
    <h3 align="center">Multiple Image Upload in Laravel using Dropzone</h3>
    <br />
        
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Select Image</h3>
        </div>
        <div class="panel-body">
          <form id="myDropzone" class="dropzone" action="{{ route('dropzone.upload') }}">
           {{csrf_field()}}
          </form>
          <div align="center">
            <button type="button" class="btn btn-info" id="submit-all">Upload</button>
          </div>
        </div>
      </div>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Uploaded Image</h3>
        </div>
        <div class="panel-body" id="uploaded_image">
          
        </div>
      </div>
    </div>
 </body>
</html>

<script type="text/javascript">


  Dropzone.options.myDropzone = {
    url : '{{ route('dropzone.upload') }}',
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    autoProcessQueue: false,
    acceptedFiles : ".png,.jpg,.jpeg",
    parallelUploads: 10, // Number of files process at a time
    addRemoveLinks : true,
    init:function(file,done){
      var submitButton = document.querySelector("#submit-all");
      myDropzone = this;
      submitButton.addEventListener('click', function(){
         myDropzone.processQueue(); 
      });
        
       this.on("addedfile", function(){
       this.options.transformFile = function(file,done){       
 // Create Dropzone reference for use in confirm button click handler
  var myDropZone = this;
  // Create the image editor overlay
  var editor = document.createElement('div');
  editor.style.position = 'fixed';
  editor.style.left = 0;
  editor.style.right = 0;
  editor.style.top = 0;
  editor.style.bottom = 0;
  editor.style.zIndex = 9999;
  editor.style.backgroundColor = '#000';
  document.body.prepend(editor);
  // Create confirm button at the top left of the viewport
  var buttonConfirm = document.createElement('button');
  buttonConfirm.style.position = 'absolute';
  buttonConfirm.style.left = '10px';
  buttonConfirm.style.top = '10px';
  buttonConfirm.style.zIndex = 9999;
  buttonConfirm.textContent = 'Confirm';
  buttonConfirm.className = 'patch btn btn-primary';
  editor.appendChild(buttonConfirm);
  buttonConfirm.addEventListener('click', function() {
  // Get the canvas with image data from Cropper.js
  var canvas = cropper.getCroppedCanvas({
    width: 256,
    height: 256
  });
  // Turn the canvas into a Blob (file object without a name)
  canvas.toBlob(function(blob) {
   // Create a new Dropzone file thumbnail
      myDropZone.createThumbnail(
        blob,
        myDropZone.options.thumbnailWidth,
        myDropZone.options.thumbnailHeight,
        myDropZone.options.thumbnailMethod,
        false, 
        function(dataURL) {
          // Update the Dropzone file thumbnail
          myDropZone.emit('thumbnail', file, dataURL);    
    // Return the file to Dropzone
    done(blob);
     });
    });
    // Remove the editor from the view
    document.body.removeChild(editor);
  });
// Create an image node for Cropper.js
  var image = new Image();
  image.src = URL.createObjectURL(file);
  editor.appendChild(image);
  // Create Cropper.js
  var cropper = new Cropper(image, { aspectRatio: 1 });
};
});
    
      this.on("complete", function(){
        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        {
          var _this = this;
          _this.removeAllFiles();
        }
        load_images();
      });

       this.on('sending', function(file, xhr, formData) {
    // Append all form inputs to the formData Dropzone will POST
    var data = $('form').serializeArray();
    $.each(data, function(key, el) {
        formData.append(el.name, el.value);
    });
}); 
    },
  };

  $(".patch").click(function(){
   alert();
  });

  load_images();

  function load_images()
  {
    $.ajax({
      url:"{{ route('dropzone.fetch') }}",
      success:function(data)
      {
        $('#uploaded_image').html(data);
      }
    })
  }

  $(document).on('click', '.remove_image', function(){
    var id = $(this).attr('id');
    var name = $(this).attr('name');
    $.ajax({
      url:"{{ route('dropzone.delete') }}",
      data:{id:id,name : name},
      success:function(data){
        load_images();
      }
    })
  });

   $(".dropzone").sortable({
        items:'.dz-preview',
        cursor: 'move',
        opacity: 0.5,
        containment: '.dropzone',
        distance: 20,
        tolerance: 'pointer',
        stop: function () {
        var queue = myDropzone.getAcceptedFiles();
        newQueue = [];
        $('#myDropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {           
          var name = el.innerHTML;
          queue.forEach(function(file) {
            if (file.name === name) {
                newQueue.push(file);
              }
            });
          });
      myDropzone.files = newQueue;
          }
        });
</script>
