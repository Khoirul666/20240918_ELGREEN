<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Form</title>
    <style>
        /* Style untuk checkbox yang dipilih */
        .custom-checkbox {
            padding: 10px;
            display: inline-block;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-checkbox.selected {
            background-color: lightgreen; /* Warna saat dipilih */
            border-color: green;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        @csrf
        <div id="checkboxContainer">
            <div class="custom-checkbox" data-value="a">
                <input type="checkbox" name="options[]" value="a" class="checkbox-input" hidden>
                <span>a</span>
            </div>
            <div class="custom-checkbox" data-value="b">
                <input type="checkbox" name="options[]" value="b" class="checkbox-input" hidden>
                <span>a</span>
            </div>
            <div class="custom-checkbox" data-value="c">
                <input type="checkbox" name="options[]" value="c" class="checkbox-input" hidden>
                <span>a</span>
            </div>
            <div class="custom-checkbox" data-value="d">
                <input type="checkbox" name="options[]" value="d" class="checkbox-input" hidden>
                <span>a</span>
            </div>
            <div class="custom-checkbox" data-value="e">
                <input type="checkbox" name="options[]" value="e" class="checkbox-input" hidden>
                <span>a</span>
            </div>
            <div class="custom-checkbox" data-value="f">
                <input type="checkbox" name="options[]" value="f" class="checkbox-input" hidden>
                <span>a</span>
            </div>
        </div>
        <button type="submit" id="submitBtn" disabled>Submit</button>
    </form>

    @if (session('selected'))
        <div>
            <h3>Checkbox yang dipilih:</h3>
            <ul>
                @foreach (session('selected') as $selected)
                    <li>{{ $selected }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        const checkboxes = document.querySelectorAll('.custom-checkbox');
        const submitButton = document.getElementById('submitBtn');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                // Toggle class 'selected' saat checkbox diklik
                const input = this.querySelector('.checkbox-input');
                input.checked = !input.checked;

                if (input.checked) {
                    this.classList.add('selected');
                } else {
                    this.classList.remove('selected');
                }

                // Aktifkan tombol submit jika ada yang dipilih
                const anyChecked = Array.from(checkboxes).some(cb => cb.querySelector('.checkbox-input').checked);
                const selectedValues = Array.from(checkboxes)
                .filter(cb => cb.querySelector('.checkbox-input').checked)
                .map(cb => cb.getAttribute('data-value'));
                console.log(anyChecked);
                console.log(selectedValues);

                submitButton.disabled = !anyChecked;
            });
        });
    </script>
</body>
</html>
