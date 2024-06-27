<!-- resources/views/userprofile/lists.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Pictures</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="my-4">Profile Pictures</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userProfiles as $profile)
            <tr>
                <td>{{ $profile->id }}</td>
                <td>
                @if($profile->image)
                        @foreach(json_decode($profile->image, true) as $file)
                                <img src="{{Storage::disk('s3')->url('jaydeep-test/files/'.$file) }}" alt="Profile Picture" width="100" height="100"><br>                       
                         @endforeach
                    @endif
                </td>
                
                <td><a href="{{route('userprofile.edit',$profile->id)}}"><button>edit</button></a>
                <a href="{{route('userprofile.delete',$profile->id)}}"><button>delete</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
