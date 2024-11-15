<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('admin-assets/css/toast.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/invoice-template/templatedemo.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <h2 style="font-size:25px;">Templates</h2>
        <div class="demo" >
            @foreach ($template as $tem)
                <div class="template-container" style="height:400px;">
                    <div class="template_name" style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                        {{ $tem->template_name }}
                    </div>
                    <div class="template_html" style="border-top: 1px solid #ddd; padding-top: 10px;  position:relative;">
                        {!! $tem->template_html !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
