<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Import</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">    

    <h1 class="my-4">post Listing</h1>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medias as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td><img src="{{ $value->getFirstMediaUrl('post_image', 'thumb') }}" alt="Post Image" height="100px" width="140px"></td>
                <td><a href="{{route('media.edit',$value->id)}}"><button>edit</button></a>
               <a href="{{route('media.delete',$value->id)}}"><button>delete</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>