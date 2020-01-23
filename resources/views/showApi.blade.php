<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

    <title>Document</title>
</head>
<body>

    <!-- <table id="data-table">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>description</td>
            <td>time</td>
            <a href="" id="tes">tes</a>
        </tr>
    </table>
    <ul id="result"></ul> -->
    <div class="container">  
                <h1 align="center">Show JSON Data in Jquery Datatables</h3><br />  
                <h3 align="center">Employee Database</h3><br />  
                <table id="data-table" class="table table-bordered">  
                     <thead>  
                          <tr>  
                               <th>Id</th>  
                               <th>Title</th>  
                               <th>Description</th>
                               <th>Time</th>  
                          </tr> 
                     </thead>  
                     <tbody class="show-data">
                        <th id="show-data-id"></th>
                        <th id="show-data-title"></th>
                        <th id="show-data-description"></th>
                        <th id="show-data-time"></th>
                     </tbody>
                </table>  


                <!-- <div id="show">

                </div>
                <div id="show1">

                </div>
                <div id="show2">

                </div>
                <div id="show3">

                </div>
                <div id="show4">

                </div>
                <div id="show5">

                </div> -->
           </div> 
</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
//masuk ke json
    $.ajax({
        url : '/api/v1/meeting',
        dataType : 'json',
        success : function (data) {
            console.log(data.meetings);
            $.each(data.meetings,function(index,obj){
                document.write("array ke "+index+" : nilainya = "+obj.id+" : nilainya = "+obj.title+" : nilainya = "+obj.description+" : nilainya = "+obj.time);
                document.write("<br>");


            // $('#show-data-id').html(obj.id);
            // $('#show-data-title').html(obj.title);
            // $('#show-data-description').html(obj.description);
            // $('#show-data-time').html(obj.time);
            });
            
        }
    });
</script>

<!-- <script type="text/javascript">
//masuk ke json
    $.ajax({
        url : '/api/v1/meeting',
        dataType : 'json',
        success : function (data) {
            console.log(data.meetings);
            $('#show').html(data.meetings[0].id);
            // $('#show1').html(data.meetings[1].id);
            // $('#show2').html(data.meetings[2].id);
            // $('#show3').html(data.meetings[3].id);
            // $('#show4').html(data.meetings[4].id);
            // $('#show5').html(data.meetings[5].id);
            // console.log(data.meetings[0]);
        }
    });

    // $.getJSON('/api/v1/meeting', function(response) {
    //     $(#show).html(response.meetings[0]);
    // });
</script> -->