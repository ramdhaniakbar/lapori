<!DOCTYPE html>
<html lang="en">

<head>
   @include('includes.frontsite.meta')

   <title>@yield('title') | {{ config('app.name', 'lapor!') }}</title>


   @include('includes.frontsite.style')


</head>

<body>

   @yield('content')

   @include('includes.frontsite.script')

   @yield('scripts')
</body>

</html>