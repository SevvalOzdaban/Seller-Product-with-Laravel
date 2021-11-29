<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <div id="sellers">
        @foreach ($allSeller as $elem)
            <a href={{ route('getProductsBySeller', $elem->id) }}
                class="btn btn-outline-info m-2">{{ $elem->name }}</a>
            {{-- <a class="btn btn-primary">{{ $elem ->point }}> --}}
        @endforeach
    </div>
    <div class="row gap-5">
        @foreach ($bySeller as $item)
            <div class="card col-3" style="width: 16rem;">
                <img src="{{ $item->image }}" class="card-img-top" style="height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Size: {{ $item->description }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $item->pivot->price }}  <strong>Stock:</strong> {{ $item->pivot->stock }}</p>
                    {{-- <p class="card-text">Stock: {{ $item->pivot->stock }}</p> --}}
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
