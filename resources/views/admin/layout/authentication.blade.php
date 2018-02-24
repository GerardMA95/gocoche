<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    @section('style')
        {{ Html::style('css/bootstrap/bootstrap.css') }}
        {{ Html::style('css/admin/admin.css') }}
    @show
    <!-- Favicon icon -->
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid">
      @yield('body')
    </div>
    @section('javascript')
        {{ Html::script('js/bootstrap/bootstrap.js') }}
        <!-- {{ Html::script('js/waves.js') }} -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.js"></script>
        {{ Html::script('js/admin/mdb.js') }}
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    @show
    
</body>
</html>