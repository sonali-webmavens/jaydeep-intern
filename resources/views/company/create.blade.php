<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create company</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <br><br><br>
  <div class="container shadow">

    <center><h2>CREAT COMPANY</h2></center>
    <form action="{{isset($company) ? route('company.update',$company->id):route('company.save')}}" method="post" enctype="multipart/form-data">
    @csrf
    
      <div class="form-group">
        <label for="title">Name:</label>
        <input type="text" class="form-control custom-input" name="name" value="{{isset($company) ? $company->name:''}}" placeholder="Enter your title" required>
      </div>
      <div class="form-group">
        <label for="title">Address:</label>
        <input type="text" class="form-control custom-input" name="address" value="{{isset($company) ? $company->address:''}}" placeholder="Enter your title" required>
      </div>
      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      <button type="submit" class="btn form-control  custom-btn">Submit</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
