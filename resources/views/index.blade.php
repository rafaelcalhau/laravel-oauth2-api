<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calhau.me - Laravel app with Secure REST API using Passport (oAuth2 protocol)</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">

    <!-- Semantic-UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css" />

    <!-- Application's Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
</head>
<body>

    <div id="wrapper" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-8 col-xs-12">
        <form id="uploadform" action="" method="POST" class="ui fluid card">
            <div class="content">
                <div class="header">
                    Calhau.me - Laravel App with Secure REST API <a href="https://calhau.me" target="_blank" class="author">by Rafael Calhau</a>
                </div>
            </div>
            <div class="content">
                <h4 class="ui sub header">
                    Upload your XML file by dragging it to box below or click on it.<br>
                    <small>Note: First send your people xml file, then the shiporders xml file.</small>
                </h4>
                <label class="drop-area">
                    <p>Drag and drop your XML file here.</p>
                    <input type="file" id="file" name="file">
                </label>
            </div>

            {{ csrf_field() }}

            <div class="extra content">
                <button id="btnUpload" class="ui fluid labeled icon button">
                    <i class="upload icon"></i> Upload
                </button>
            </div>
        </form>
    </div>

    <!-- jQuery 2.2.4 -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

    <!-- Uploader developed using ES6, compiled with Laravel Elixir -->
    <script src="{{ asset('js/uploader.min.js') }}"></script>
</body>
</html>