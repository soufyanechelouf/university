<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Summer-Note With Bootstrap </title>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container">

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h2>Bootstrap with Summernote Note Editor Multiple Row Content</h2>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <button type="button" onclick="addContent();" data-toggle="tooltip" data-placement="top" title="Add Content" class="btn btn-primary"><i class="fa fa-plus-circle"></i> And New Content To Page</button>
    </div>
  </div>

  <?php $content_row=0 ; ?>
  <div id="content-row">

    <div class="form-group">
      <label class="col-sm-2">Page Content</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="code_preview0" name="" style="height: 300px;"></textarea>
      </div>
    </div>
  </div>
  <?php $content_row++; ?>
</div>
<!-- Page - Content End -->
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#code_preview0').summernote({height: 300});
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js'></script>



</body>
