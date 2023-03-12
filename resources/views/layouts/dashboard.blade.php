<!DOCTYPE html>
<html lang="en">

<head>
   @include('includes.frontsite.meta')

   <title>@yield('title') | Dashboard</title>


   @include('includes.frontsite.style')
</head>

<body>

   @yield('content')

   @include('includes.frontsite.script')

</body>

</html>