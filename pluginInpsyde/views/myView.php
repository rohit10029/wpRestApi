<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    </head>
    <body>
        
    <div id="app"></div>

<div id="userModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Detail</h4>
      </div>
      <div id="userModalBody" class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </body>
</html>
<script>
      var promise=function () {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url:"<?= get_rest_url().'inpsyde/v1/users/'?>",
                    data:{},
                    method:"GET",
                    success: function(data) {
                        resolve(data)
                    },
                    error: function(error) {
                        reject(error)
                    },
                })


            })
        }    
        var promiseLink=function (s) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url:"<?= get_rest_url().'inpsyde/v1/users-detail/'?>"+s,
                    data:{},
                    method:"GET",
                    success: function(data) {
                        resolve(data)
                    },
                    error: function(error) {
                        reject(error)
                    },
                })


            })
        } 
        promise().then(
            function(data)
            {
                 var tab=`<table class="table"><tr><th>ID</th><th>name</th><th>username</th></tr>`

                for(var i=0;i<data.length;i++)
                {
                    var link='<a href="javascript:void(0);" data-id="'+data[i].id+'" onclick="gotolink($(this))">link</a>';
                  tab+=`<tr><td>${data[i].id}</td><td>${data[i].name}</td><td>${data[i].username}</td><td>${link}</td></tr>`;
                }
                tab+=`</table>`
                $("#app").html(tab)
            }
           
        )
       let gotolink=function(obj)
       {
           var id=obj.data("id")
           promiseLink(id).then(function(res)
           {
               var add=res.address.street+" "+res.address.suite+" "+res.address.city+" "+res.address.zipcode
    
               var tab=`<table><tr><td>EMAIL:</td><td> ${res.email}</td></tr><tr><td>ADDRESS:</td><td> ${add}</td></tr><tr><td>phone:</td><td>${res.phone}</td></tr></table>`
               $("#userModalBody").html(tab);
                $("#userModal").modal("show");
           })
       }
</script>