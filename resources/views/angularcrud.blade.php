<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script>

var app = angular.module("myPost", []);

app.controller("Post", function($scope,$http) {
    $scope.post={};
    $scope.comb = "1";
     $scope.Books = [{
        Id: 1,
        Name: "Yes"
      },
      {
        Id: 2,
        Name: "No"
      }
    ];
   
   $scope.save = function() {
      var checkedBooks = [];
      for (var k in $scope.bookModel) {
        if ($scope.bookModel.hasOwnProperty(k) && $scope.bookModel[k]) {
          checkedBooks.push(k);
        }
      }

      //do your stuff with the ids in `checkedBooks`
      alert(checkedBooks);
    }


    $scope.getListPost=function(){
         $http.get("{{route('post.getlistpost')}}")
         .then(function(e,data) {
            $scope.getpostitems = e.data.getposts;
            
    });
    };
    $scope.getListPost();
    $scope.postPost=function(){
             var fd = new FormData();
         
               if($scope.post.id!=""){
                   fd.append('id',$scope.post.id);
               }
            fd.append('title',$scope.post.title);
            
        fd.append('description',$scope.post.description);
        
        fd.append('publish',$scope.post.publish);
        
        fd.append('status',$scope.post.status);
 
        
            $http({
              url: "{{route('post.store')}}",
              method: "POST",
               data: fd,
                headers: {
                     'Content-Type': undefined
              }
            }).then(function(data){
                    $scope.post={};
                document.getElementById("add-post").reset();
                 $('#myModal').modal('hide');
                 $scope.getListPost();
             });
    };
    $scope.postDelete=function(id){
             var d=confirm('Are you sure want to delete record??');
            if(d==true){
          $http({
              url: "{{route('post.destroy')}}",
              method: "POST",
               data:{id:id}
            }).then(function(data){
                    $scope.post={};
                    $scope.getListPost();
             });
            }
    };
    $scope.getEditPost=function(id){
        
        $('#myModal').modal('show');
        
         $http({
              url: "{{route('post.show')}}",
              method: "POST",
               data:{id:id}
            }).then(function(e,data){
             $scope.post=e.data.post;
                 $scope.post.id = data.id;
                 $scope.post.title= data.title;
                 $scope.post.description= data.description;
                 
             });
        
         };
   
});


</script>
</head>
<body ng-app="myPost" ng-controller="Post">
  @{{Books}}
<div class="container">
  <!--<h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>    -->     
    <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Post</h4>
        </div>
        <div class="modal-body">
          <form name='add-post' id='add-post' enctype="multipart/form-data" ng-submit="postPost();" >
               <input type="hidden" class="form-control" id="post_id" ng-model="post.id">
          <div class="form-group">
            <label for="Title">Post Name:</label>
            <input type="text" class="form-control" id="title" ng-model="post.title">
          </div>
          <div class="form-group">
            <label for="Description">Post Description:</label>
            <input type="text" class="form-control" id="description" ng-model="post.description">
          </div>
         
              
               <div ng-repeat="bk in Books">

  <input type="checkbox" ng-model="bookModel[bk.Id]" ng-init="bookModel[bk.Id] = $first"/>@{{bk.Name}}

</div><br/>
          <div class="form-group">
            <label for="status">Status</label>
              <input type="radio" id="status" ng-model="post.status" ng-value="1">Active 
              <input type="radio" id="status" ng-model="post.status" ng-value="0">Inactive 
          </div>
            <input type="button" id="save" class="btn btn-success" value="Save" ng-click="save()" />
  
          <button type="submit" class="btn btn-default" >Submit</button>
        </form>

        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
      
    </div>
  </div>
   
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Publish</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <tr ng-repeat="(index, getitem) in getpostitems">
          <td>@{{index+1}}</td>
        <td>@{{getitem.title}}</td>
        <td>@{{getitem.description}}</td>
          <td>@{{getitem.publish}}</td>
          <td><div ng-if="getitem.status == 1">
        <button class="btn btn-success">Active</button>
      </div>
      <div ng-if="getitem.status == 0">
      <button class="btn btn-danger">Inactive</button>
      </div></td>
          
        <td><button type="button" class="btn btn-primary" ng-click="getEditPost(getitem.id);">Edit</button>
          <button type="button" class="btn btn-danger" ng-click="postDelete(getitem.id);">Delete</button>
          </td>
        
      </tr>
    </tbody>
  </table>

</div>
</body>
</html>
