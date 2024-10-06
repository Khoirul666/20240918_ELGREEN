
$(document).ready(function () {
    console.log('document ready min max siap');
    // load data
    load_data();

    $('#sby').change(function () {
        var selectedValue = $(this).val();
        // console.log('Pilihan:', selectedValue);
        // console.log( $('#sby').val());
        load_data();
    });

    var slider = document.getElementById('slider-range');

    noUiSlider.create(slider, {
        start: [min, max], // Nilai awal (harga minimum dan maksimum)
        connect: true, // Warna track antara dua penggeser
        range: {
            'min': min, // Batas minimum
            'max': max // Batas maksimum
        },
        step: 1, // Langkah penggeseran
        // tooltips: true, // Tooltip untuk menampilkan nilai saat digeser
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
        } else {
            maxValue.innerHTML = values[1];
        }
    });

});

function load_data() {
    // Mengirim nilai yang dipilih ke server menggunakan AJAX
    var url_show_get_data = "{{route('shop_get_data')}}"
    $.ajax({
        url: "shop_get_data", // Ganti dengan URL endpoint Anda
        type: 'GET',
        data: {
            'sby': $('#sby').val()
        },
        success: function (response) {
            // console.log(response.sby);

            $('#show_data').empty()
            // console.log(response)
            // console.log(response.produk)
            var show_data_html = "";
            $.each(response.produk, function (key, value) {
                // console.log(JSON.parse(value.image)[0])
                // console.log(key,value);
                var s_img = JSON.parse(value.image)[0];
                show_data_html += `<div class="col-3">`

                show_data_html += `<a href="shop/` + value.id + `" style="text-decoration: none">`
                
                show_data_html += `<div class="bdr">`
                show_data_html += `<img src = "product_img/`+s_img+`" >`
                show_data_html += `<span>`+value.nama_produk+`</span>`
                show_data_html += `<br>`
                show_data_html += `<span style="color: black">Rp. `+value.hrg_produk+`</span>`
                
                show_data_html += `</div>`
                
                show_data_html += `</a>`

                show_data_html += `</div>`
            });
            $('#show_data').append(show_data_html);
            // console.log('Response dari server:', response);
            // $('#selectedValue').text('Response dari server: ' + response);
        },
        error: function (xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
    });
}