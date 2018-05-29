<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Bordered Table</h2>
  <a href="DeleteAll" class="btn btn-danger">Delete All</a>
  <a href="importExport" class="btn btn-primary">Import (.csv)</a>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($item as $item)
	      <tr>
	        <td>{{$item->id}}</td>
	        <td>{{$item->title}}</td>
	        <td>{{$item->description}}</td>
	      </tr>
	     @endforeach
      
    </tbody>
  </table>
</div>

</body>
</html>
