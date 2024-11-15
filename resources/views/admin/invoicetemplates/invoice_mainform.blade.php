
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin-assets/css/invoice-template/templatemain.css')}}">
    <title>Document</title>
  

<body>
   

<div class="main">
   
   @foreach ($template as $tem)
   
  
   <div class="template_html">
      {!! $tem->template_html !!}
      </div>
   @endforeach
   
   </div></div>
   <div class="mainbody"></div>
</body>
</html>



