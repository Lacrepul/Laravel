<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/register.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/note.css">
    <script src="/js/noteFetch.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notebook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            createSaveChanges.saveChanges();
        });
</script>
</head>
<body>

    @section('logout')
    @show

    @section('profileButt')
    @show

    @section('profileHead')
    @show

    @section('header')
    @show

    <div class="alert alert-light" align="bottom" role="alert" id="footer">
		&copy;Copyright by Poul Vasenev, 2019 
        
	</div>
<div class="container">
    @yield('content')
</div>

</body>
</html>