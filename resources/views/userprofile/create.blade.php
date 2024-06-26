<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazing Bootstrap Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <br><br><br>
  <div class="container shadow">

    <center><h2>CREAT POST</h2></center>
    <form action="{{isset($userprofile) ? route('userprofile.update',$userprofile->id) :route('userprofile.save')}}" method="post" enctype="multipart/form-data">
    @csrf
    
      <div class="form-group">
        <label for="post">post:</label>
        <input type="file" class="form-control " name="image"  required>
      </div>
      
      <button type="submit" class="btn form-control  custom-btn">Submit</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
