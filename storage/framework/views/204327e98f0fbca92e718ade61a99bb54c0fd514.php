<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>



    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    







    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }


        body {
  padding: 1em 3em;
}

.dataTables_filter {
  float:right;
  margin-bottom: 1em;
  
  &:after {
    clear:both;
  }
}

.dt-buttons a .glyphicon {
  visibility: hidden;
}
.dt-buttons a:hover .glyphicon {
  visibility: visible;
}
    </style>

 


</head>

<body>

    <div class="container mt-5">
        <form action="<?php echo e(route('document.store')); ?>" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
            <?php echo csrf_field(); ?>
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <strong><?php echo e($message); ?></strong>
            </div>
          <?php endif; ?>

          <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="email">Document Name :</label>
            <input type="text" class="form-control" placeholder="Enter Document Name" name="document_name" id="email">
          </div>



          <div class="form-group">
            <input type="file" class="form-control" name="file_name">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>










        
    </div>




    <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Image Name</th>
                <th>Thumb Image</th>
                <th>date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $n=0;
            ?>
            <?php $__currentLoopData = $document_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_document_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($n++); ?></td>
                <td><?php echo e($all_document_data->document_name); ?></td>
                <td><?php echo e($all_document_data->document_image); ?></td>
                <td><?php echo e($all_document_data->document_image); ?></td>
                <td>Action</td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>

    </table>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
</body>
</html><?php /**PATH D:\wamp64\www\laravel8_test\resources\views/template/document.blade.php ENDPATH**/ ?>