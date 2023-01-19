@extends('dashboard')

@section('title', 'File Manager')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
  <title>Document</title>
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div id="fm" style="height: 600px;"></div>
    </div>
  </div>

  <!-- File manager -->
  <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

      fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
        window.opener.fmSetLink(fileUrl);
        window.close();
      });

      let ree = document.getElementsByClassName('btn-group');
      ree[6].setAttribute('style', 'display:none');
      console.log(ree);
    });
  </script>

</body>
</html>



@endsection