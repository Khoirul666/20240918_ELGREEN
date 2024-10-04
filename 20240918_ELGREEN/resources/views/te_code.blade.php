<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double Range Slider with noUiSlider</title>

    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- noUiSlider CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" rel="stylesheet">

    <style>
        .noUi-target {
            margin-top: 20px;
        }

        .value-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .value-labels span {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Filter Harga</h2>

    <div id="slider-range"></div>

    <div class="value-labels">
        <span>Harga Minimum: <span id="slider-range-value1"></span></span>
        <span>Harga Maksimum: <span id="slider-range-value2"></span></span>
    </div>

    <form>
        <input type="hidden" id="min-value" name="harga_min">
        <input type="hidden" id="max-value" name="harga_max">
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </form>
</div>

<!-- JS noUiSlider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>

<!-- Script untuk membuat slider -->
<script>
    // Inisialisasi slider
    var slider = document.getElementById('slider-range');

    noUiSlider.create(slider, {
        start: [100000, 500000], // Nilai awal (harga minimum dan maksimum)
        connect: true, // Warna track antara dua penggeser
        range: {
            'min': 100000, // Batas minimum
            'max': 1000000 // Batas maksimum
        },
        step: 1000, // Langkah penggeseran
        tooltips: true, // Tooltip untuk menampilkan nilai saat digeser
        format: {
            to: function (value) {
                return Math.round(value);
            },
            from: function (value) {
                return Number(value);
            }
        }
    });

    // Update nilai slider di tampilan
    var minValue = document.getElementById('slider-range-value1');
    var maxValue = document.getElementById('slider-range-value2');

    // Saat slider digeser
    slider.noUiSlider.on('update', function (values, handle) {
        if (handle == 0) {
            minValue.innerHTML = values[0];
            document.getElementById('min-value').value = values[0];
        } else {
            maxValue.innerHTML = values[1];
            document.getElementById('max-value').value = values[1];
        }
    });
</script>

<!-- JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
