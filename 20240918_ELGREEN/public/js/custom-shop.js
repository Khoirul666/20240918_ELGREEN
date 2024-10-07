
$(document).ready(function () {

    console.log('document ready min max siap');
    // load data
    data_array['price_min'] = min;
    data_array['price_max'] = max;
    data_array['sby'] = $('#sby').val();
    load_data();

    $('#sby').change(function () {
        var selectedValue = $(this).val();
        // console.log('Pilihan:', selectedValue);
        // console.log( $('#sby').val());
        data_array['sby'] = selectedValue;
        load_data();
    });

    // slider
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
            min = values[0];
        } else {
            maxValue.innerHTML = values[1];
            max = values[1];
        }
        load_data()
    });

    // color
    const checkboxes = document.querySelectorAll('.custom_checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function () {
            // Toggle class 'selected' saat checkbox diklik
            const input = this.querySelector('.checkbox_input');
            input.checked = !input.checked;

            if (input.checked) {
                this.classList.add('selected');
            } else {
                this.classList.remove('selected');
            }

            // Menampilkan pilihan checkbox yang dipilih di console log
            const selectedValues = Array.from(checkboxes)
                .filter(cb => cb.querySelector('.checkbox_input').checked)
                .map(cb => cb.getAttribute('data-value'));
            data_array['color'] = selectedValues;
            data_array_color = selectedValues;
            // console.log('Checkbox yang dipilih:', selectedValues);
            load_data()
        });
    });

    // size
    const checkboxes_size = document.querySelectorAll('.custom_checkbox_size');
    checkboxes_size.forEach(checkbox => {
        checkbox.addEventListener('click', function () {
            const input = this.querySelector('.checkbox_size');
            input.checked = !input.checked;

            if (input.checked) {
                this.classList.add('selected');
            } else {
                this.classList.remove('selected');
            }
            // Menampilkan pilihan checkbox yang dipilih di console log
            const selectedValues = Array.from(checkboxes_size)
                .filter(cb => cb.querySelector('.checkbox_size').checked)
                .map(cb => cb.getAttribute('data-value'));
            data_array['size'] = selectedValues;
            data_array_size = selectedValues;
            // console.log('Checkbox Size yang dipilih:', selectedValues);
            load_data()
        });
    });

});

function load_data() {
    // console.log(url);
    // console.log("data array : ", data_array)
    // console.log(JSON.stringify(data_array));
    // Mengirim nilai yang dipilih ke server menggunakan AJAX
    $.ajax({
        url: url, // Ganti dengan URL endpoint Anda
        type: 'post',
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify({
            'min':min,
            'max':max,
            'color':data_array_color,
            'size':data_array_size,
            'sby':$('#sby').val(),
            'menu':menu_saat_ini
        }),
        success: function (response) {
            console.log(response);

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
                show_data_html += `<img src = "`+base+`/product_img/`+s_img+`" >`
                show_data_html += `<span>` + value.nama_produk + `</span>`
                show_data_html += `<br>`
                show_data_html += `<span style="color: black">Rp. ` + value.hrg_produk + `</span>`

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