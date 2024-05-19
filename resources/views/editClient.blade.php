<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875em;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

@include('include.nav')

<div class="container form-container">
    <h2>Edit Client</h2>
    <form action="{{ route('updateClient', $client->id) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="clientname">Client Name:</label>
            <input type="text" class="form-control" id="clientname" name="clientname" value="{{ old('clientname', $client->clientname) }}">
            @error('clientname')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}">
            @error('phone')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}">
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $client->website) }}">
            @error('website')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('clients') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
