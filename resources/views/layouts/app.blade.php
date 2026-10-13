<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

```
<title>@yield('title', 'LITTLE SHOP')</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])
```

</head>

<body>
    @include('layouts.navigation')

```
<main>
    @yield('content')
</main>
```

</body>
</html>
