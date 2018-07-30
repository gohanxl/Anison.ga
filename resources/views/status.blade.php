<head>
    <title>Status - {{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, shrink-to-fit=no' name='viewport'>
    <meta content="Status - {{config('app.name')}}" property='og:title'>
    <meta content='Anison.ga' property='og:site_name'>
    <link rel=icon href='{{url('/')}}/favicon.ico'>
    <style type="text/css">
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        #content {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0px;
        }
    </style>
</head>

<body>
    <div id="content">
        <iframe width="100%" height="100%" frameborder="0" src="https://p.datadoghq.com/sb/9fadb591a-7df16ce271aa2954e5105a0a9f88d48f?tv_mode=true"></iframe>
    </div>
</body>
