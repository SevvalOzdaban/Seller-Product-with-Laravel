<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <style>
        .filter {
            border: 2px solid rgb(191, 236, 234);
            width: 20%;
            height: 300px;
            margin: 3%;
            display: inline-grid;
        }

    </style>
</head>

<body>
    <div id="sellersFilter" class="filter">
        <h5>SELLERS FILTERING</h5>
        @foreach ($allSeller as $elem)
            <div class="form-check m-2">
                <input id="{{ $elem->id }}" class="form-check-input" type="checkbox">
                <label class="form-check-label" for="flexCheckDefault">{{ $elem->name }}</label>
                <p style="color: royalblue" class="d-inline">{{ $elem->point }}</p>

            </div>
        @endforeach
    </div>

    <div id="productsFilter" , class="filter">
        <h5>PRODUCTS FILTERING</h5>
        @foreach ($allProduct as $elem)
            <div class="form-check m-2">
                <input id="{{ $elem->id }}" class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">{{ $elem->name }}</label>
            </div>
        @endforeach
    </div>
    <div id="sortProduct" class="filter">
        <h5>SORT PRODUCT</h5>
        <div class="form-check m-2">
            <input id="check1" class="form-check-input" type="checkbox">
            <label class="form-check-label" for="flexCheckDefault">To Product Price</label>
        </div>

    </div>
    <div class="row gap-5" id="allProducts">
        @foreach ($allProduct as $asd)
            <div class="card col-3" style="width: 16rem;">
                <img src="{{ $asd->image }}" class="card-img-top" style="height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $asd->name }}</h5>
                    <p class="card-text">Size: {{ $asd->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

</body>
<script>
    var arr = [];
    var array = [];
    var id, sellerId = 0;
    var check;

    $('div#sellersFilter input[type="checkbox"]').change(function() {
                if ($(this).is(":checked")) {
                        arr.push(this.id);
                    } 
                    else {
                        //remove unchecked element from arr list
                        var index = arr.indexOf(this.id);
                        arr.splice(index, 1);
                    }
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: "{{ url('deneme') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            "id": arr,
                        },
                        //first all product clear then list to seller 
                        success: function(response) {
                            var sortedArrayToPrice = [];
                            $("#allProducts").empty();
                            console.log("response", response);

                            for (var i = 0; i < response.length; i++) {
                                response[i].forEach(elem => {
                                    sortedArrayToPrice.push(elem);
                                });
                            }
                            //all product sorting to price
                            var x = sortedArrayToPrice.sort((a, b) => (a.pivot.price > b.pivot
                                .price) ? 1 : -1);
                            for (var i = 0; i < x.length; i++) {
                                var markup = '<div class="card col-3" style="width: 16rem;">' +
                                    '<img src=' + x[i].image +
                                    ' class="card-img-top" style="height: 15rem;">' +
                                    '<div class="card-body">' +
                                    '<h6 class="card-title">Name: ' + x[i].name + '</h6>' +
                                    '<h6 class="card-title">Description: ' + x[i].description +
                                    '</h6>' +
                                    '<h6 class="card-text">Price: ' + x[i].pivot.price +
                                    '</h6>' +
                                    '<h6 class="card-text">Stock: ' + x[i].pivot.stock +
                                    '</h6>' +
                                    '</div>' +
                                    '</div>';
                                $("#allProducts").append(markup);
                            }
                        }
                    });
                });

            $('input[type="radio"]').change(function() {
                array.push(this.id);
                $('input[type="checkbox"]').prop("checked", false);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ url('product') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        "id": array
                    },
                    success: function(response) {
                        $("#allProducts").empty();
                        console.log("seller", response[0]);
                        for (var i = 0; i < response.length; i++) {
                            var markup = '<div class="card col-3" style="width: 16rem;">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">Seller Name:   ' + response[i].name +
                                '</h5>' +
                                '<h5 class="card-title">Seller Point:  ' + response[i].point +
                                '</h5>' +
                                '<h6 class="card-text">Price: ' + response[i].pivot.price +
                                '</h6>' +
                                '<h6 class="card-text">Stock: ' + response[i].pivot.stock +
                                '</h6>' +
                                '</div>' +
                                '</div>';
                            $("#allProducts").append(markup);
                        }
                    }
                });
            });
</script>

</html>
