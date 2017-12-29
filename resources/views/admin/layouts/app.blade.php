<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IBEES | ADMIN') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
<div id="app"></div>
@yield('body')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="{{ asset('/js/app.js') }}"></script>

<script src="{{ asset('/js/Chart.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
<script src="{{ asset('/js/ajax.js') }}"></script>


<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<!-- #endregion -->
<script>$(document).ready(function() {
        $('#example').DataTable();
    } );</script>
<script src="{{url('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{url('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script src="{{url('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
   //var editor1= CKEDITOR.replace('my-editor', options);
	//editor1.config.allowedContent = true;
    var editor2=CKEDITOR.replace('my-editor-short', options);
	editor2.config.allowedContent = true;
    
    var domain = "{{url('/laravel-filemanager/')}}";
	
    //$('#lfm').filemanager('image',{prefix: domain});
    //$('#lfm2').filemanager('image',{prefix: domain});

    $('[class*="lfm"]').each(function() {
        $(this).filemanager('image', {prefix: domain});
    });
</script>
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>var jq = $.noConflict();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  jq( function() {
    jq( "#post_date" ).datepicker({ dateFormat:'yy-mm-dd' });
	jq( "#expiry_date" ).datepicker({ dateFormat:'yy-mm-dd' });
	jq('#datetimepicker1').datetimepicker({
                    format: 'LT'
                });
	jq('#datetimepicker2').datetimepicker({
                    format: 'LT'
                });
	jq('#cp2').colorpicker();
	jq( "#wedding_date" ).datepicker({ dateFormat:'yy-mm-dd' });
    jq( "#baby_date" ).datepicker({ dateFormat:'yy-mm-dd' });
  } );
  </script>
</body>
</html>