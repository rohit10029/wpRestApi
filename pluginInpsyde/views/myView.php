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
    </body>
</html>
<script>
      var promise=function () {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url:"https://jsonplaceholder.typicode.com/users/",
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
                  tab+=`<tr><td>${data[i].id}</td><td>${data[i].name}</td><td>${data[i].username}</td></tr>`;
                }
                tab+=`</table>`
                $("#app").html(tab)
            }
           
        )
        
</script>