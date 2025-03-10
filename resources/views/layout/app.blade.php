<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My site</title>

        <!-- Fonts -->
        <?php
       
        if (isset($_GET['color'])) {
            $maincolor= $_GET['color'];
            setcookie('Background',$maincolor,time()+3600,'/');
        }else{
            if (isset($_COOKIE['Background'])) {
                $maincolor=$_COOKIE['Background'];}
        }
        ?>
        
        <!-- Styles -->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body style="background-color: <?php echo $maincolor ?? ''; ?>">
  
   
    
     <!--include navbar -->
     @include('include.navbar')
     @include('include.message')
  
    <!--extend the class content in the pages and get here  -->
    @yield('content')

    


    <div class="footer-down">
      <a id="scroll-up" class="secondary-color">
       <i class="fa fa-angle-up"></i>
       </a>
</div>
<div class="footer text-center">
copyright &copy; <?php echo date('Y')?>  great by mahmoud hatem 
</div>
   <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
   <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
