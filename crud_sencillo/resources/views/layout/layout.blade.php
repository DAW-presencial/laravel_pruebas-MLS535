<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 CRUD Application</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>

</head>
<body>
<div class="text-right m-3">
    <select class="form-select p-3" name="language" style="width: 10%;">
        <option value="en" {{ Session::get('language') == 'en' ? 'selected' : '' }}>English</option>
        <option value="es" {{ Session::get('language') == 'es' ? 'selected' : '' }}>Español</option>
    </select>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name=language]').change(function() {
            var lang = $(this).val();
            window.location.href = "{{ route('changeLanguage') }}?language="+lang;
        });
    });
</script>

<div class="container">
    @yield('content')
</div>

</body>
</html>
