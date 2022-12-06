<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    #loading{
position: fixed;
width: 20%;
height: 20%;
z-index: 99999;
font-weight: bold;
background:url('{{asset('/')}}public/loader/loader7.gif') no-repeat center center;
}

</style>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <div id="loading">

  </div>
  <button class="btn btn-primary" id="data_view">Fetch DataView</button>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table" id="records_table">
  
  </table>


</div>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script type="text/javascript">
        $('#loading').hide();
      $(document).on("click", "#data_view", function() {
        $('#loading').show();
            var url = '{{ route('BigdataNormalViewAjax') }}';
            url = url;
            $.ajax({
            type: 'get',
            url:url,
            success: function (response) {
                //alert(response);
                $('#loading').hide();
              var JsonResponse=JSON.stringify(response);
              var response = $.parseJSON(JsonResponse);
              var trHTML='';
              $.each(JSON.parse(response), function(key, val) {
             trHTML += '<tr><td>' + val.id +'</td><td>' + val.name + '</td><td>' + val.email + '</td></tr>';
            });
                var table_data='<tbody>'+
                                '<tr>'+
                                  '<th>ID</th>'+
                                  '<th>Name</th>'+
                                  '<th>Email</th>'+
                                '</tr>'+
                              '</tbody>';
            $('#records_table').html(table_data+trHTML);
          }

        });


        });
</script>
</body>
</html>
