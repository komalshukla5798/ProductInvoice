Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(document.querySelector('#my-dropzone'), {
    url: url,
    acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
    maxFiles: 50,
    maxFilesize: 20,
    autoProcessQueue: false,
    addRemoveLinks: true,
    parallelUploads:50,
    uploadMultiple:true,
    init: function () {
        this.on(
            "addedfile", function(file) {
                console.log(file);

                var path = file.upload.filename;
                var split = path.split(".");
                var caption = split.slice(0, split.length-1).join(".");

                // caption = file.upload.filename;
                file._captionLabel = Dropzone.createElement("<p style='width:80%'>Document Name</p>")
                file._captionBox = Dropzone.createElement("<input style='width:80%' type='text' value='"+caption+"' >");
                file.previewElement.appendChild(file._captionLabel);
                file.previewElement.appendChild(file._captionBox);
        }),
        this.on(
            "sending", function(file, xhr, formData){
                var data = $('#add_document').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
                if(typeof (file._captionBox) !== "undefined")
                    formData.append('new_file_names[]',file._captionBox.value);
        });
        this.on("success", function (file,response) {
            console.log(response);
            if(response.success == 1)
            {
                // window.location.reload();
                window.location.href = baseUrl+'document';
            }
            else
            {
                toastr.error(response.message);
            }
        });
    }
});

$("#btnSubmit").click(function (e) {
    $("#fileSelectedError").html("");
    $("#fileSelectedError").hide();
    $('#btnSubmit').prop('disabled', true);
    $('#btnSubmit').val('Submitting');
    e.preventDefault();

    var is_error = 0;
    if($("#is_edit").val() == 1)
    {
        if($(".docLink").length <= 0 && myDropzone.getAcceptedFiles().length <= 0)
        {
            $("#fileSelectedError").html("Please select document.333");
            $("#fileSelectedError").show();
            is_error = 1;
        }

        if($("#add_document").valid() && !is_error){
            if(myDropzone.getAcceptedFiles().length <= 0 && $(".docLink").length > 0)
            {
                var blob = new Blob();
                blob.upload = { 'chunked': myDropzone.defaultOptions.chunking };
                myDropzone.uploadFile(blob);
            }
            else
                myDropzone.processQueue();
        }
    }
    else
    {
        if(myDropzone.getAcceptedFiles().length <= 0)
        {
            $("#fileSelectedError").html("Please select document.");
            $("#fileSelectedError").show();
        }
        if($("#add_document").valid() && myDropzone.getAcceptedFiles().length > 0){
            myDropzone.processQueue();
        }
    }
});

$("#add_document").validate({
    rules: {
        "departments[]": {"required":true},
        company: {"required":true},
        department_name: {"required":true},
        // name: {"required":true},
        // file: {"required":true},
    },
    messages: {
        "departments[]": {"required":"Please select department."},
        company: {"required":"Please select company."},
        department_name: {"required":"Please enter department name."},
        // name: {"required":"Please enter name."},
        // file: {"required":"Please enter file."},
    },
});

$('#company').change(function(){
    var company_ids = $(this).val();

    // $('.department').find('option').not('.select').remove();
    $("#div_departments").html("");
    if(company_ids != "")
    {
        $.ajax({
            url: baseUrl+'getDocsDepts/'+company_ids,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var dept = 0;
                var doc = 0;

                if(response['data']['dept'] != null){
                    dept = response['data']['dept'].length;
                }

                if(response['data']['doc'] != null){
                    doc = response['data']['doc'].length;
                }

                // $('.company').find('.select').val('all').html('ALL');


                if(dept > 0)
                {
                    // departments = '<option id="" value="all" class="all">ALL</option>';
                    // $('.department').find('.select').remove();

                    var departmentHtml = "";
                    departmentHtml += '<div class="row all-select custome-check"><input type="checkbox" id="checkAllDepartments" name=""><span class="custome-checkbox">All</span></div>';
                    for(var i=0; i<dept; i++){
                        var id = response['data']['dept'][i].id;
                        var name = response['data']['dept'][i].name;
                        departmentHtml += '<div class="row custome-check"><input name="departments[]" type="checkbox" id="'+id+'" value="'+id+'" class="chkDepartment"><span class="custome-checkbox">'+name+'</span></div>';
                    }
                    $("#div_departments").html(departmentHtml);
                }else{
                    var departmentHtml = '<div class="row"><input type="text" name="department_name" id="department_name" class="chkDepartment"></div>';
                    $("#div_departments").html(departmentHtml);
                }
            }
        });
    }
});

$(document).on("change","#checkAllDepartments",function() {
    if( $(this).is(":checked") )
    {
        $(".chkDepartment").attr("checked", true);
        $(".chkDepartment").prop("checked", true);
    }
    else
    {
        $(".chkDepartment").attr("checked", false);
        $(".chkDepartment").prop("checked", false);
    }
});

$(document).on('click',"#btnCancel",function(){
    window.location.href=baseUrl+'document';
})

$(document).on('click',".removeDoc",function(){
    var id = $(this).data('id');
    var company_id = $(this).data('company_id');
    var doc_name = $(this).data('doc_name');
    var doc_file_name = $(this).data('doc_file_name');

    var token = $('input[name="_token"]').val();
    $.prompt("Document will be delete if you click yes.", {
        title: "Do you want to delete document ?",
        buttons: { "No": false, "Yes": true },
        // persistent: false,
        focus : 1,
        submit: function(e,v,m,f){
            if(v)
            {
                $(".loader").show();
                e.preventDefault();
                $.ajax({
                    headers: {
                      'X-CSRF-Token': token
                    },
                    type: "DELETE",
                    url: baseUrl+'document/detail/delete',
                    data: {company_id:company_id,doc_name:doc_name,doc_file_name:doc_file_name},
                    success: function(data){
                        $(".loader").hide();
                        if(data == 1)
                        {
                            $("#"+id).remove();
                            toastr.success("Document deleted successfully.!");
                        }
                        else
                        {
                            toastr.error("Something went wrong!");
                        }
                    }
                });
            }
            $.prompt.close();
        }
    });
})
