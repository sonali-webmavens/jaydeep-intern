
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Total Companies: {{ $companyCount + $deletedCompanyCount}}</h2>
    <h5>Total Deleted Companies: {{ $deletedCompanyCount }}</h5>
   <a href="{{route('company.lists')}}" style="color:black;text-decoration:none;"><h5 >Total Active Companies: {{ $companyCount }}</h5></a>


    <center><h2>Deleted Companies</h2></center>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deletedCompanies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>
                   <a href="{{ route('company.restore', $company->id) }}">
                        <button type="submit" class="btn btn-success">Restore</button></a>
                   <a href="{{ route('company.forceDelete', $company->id) }}">
                        <button type="submit" class="btn btn-danger">Force Delete</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https
