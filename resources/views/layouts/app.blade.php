<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Your Website Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="layout-river">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                searchProducts($(this).val());
            });

            function searchProducts(keyword) {
                $('.table-bordered').html('');
                $.ajax({
                    url: '{{ route('products.index') }}',
                    type: 'GET',
                    data: {
                        search: keyword
                    },
                    success: function(response) {
                        $('.table-bordered').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });

        function addUser() {
            let form = $('#userModal');
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": $('#name').val()
                },
                success: function(response) {
                    const obj = JSON.parse(response);
                    if (obj.status) {
                        $('#' + obj.key).parents('.form-group').find('.invalid-feedback').text(obj.mess).show;
                    } else {
                        // Handle the success response (e.g., display a message, close the modal)
                        $('#userModal').modal('hide');
                        // You can also redirect or update the page as needed.
                    }

                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log('e', e)
                    $('#blah').attr('src', e.target.result).width(300).height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function ImportCsv() {
            $('#image').click()
        }
        function uploadFile(){
            $('#file').click()
        }
        function removeFile(){
            console.log('aaaa',$('#file'))
            $('#file').val('');
            $('#blah').attr('src', '{{ asset('image/avatar.png') }}');
        }
        function changeFile(el) {
            var fileInput = $('#image')[0].files[0]; // Get the selected file
            if (fileInput) {
                var formData = new FormData(); // Create a FormData object

                // Append the file to the FormData object
                formData.append('file', fileInput);

                // Perform an AJAX request to upload the file
                $.ajax({
                    type: 'POST',
                    url: '/upload',
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting the content type
                    success: function(response) {
                        alert('File uploaded successfully');
                    },
                    error: function(xhr, status, error) {
                        alert('File upload failed');
                    }
                });
            } else {
                alert('Please select a file to upload');
            }

        }
        function showEdit(el){
            console.log('el',el)
            $(el).parent().siblings('td').each(function() {
                var content = $(this).html();
                console.log('e',content)
                $(this).html('<input value="' + content + '" />');
            });
        }
    </script>

</body>

</html>
