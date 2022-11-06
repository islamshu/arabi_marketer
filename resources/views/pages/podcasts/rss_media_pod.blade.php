<html xmlns="http://www.w3.org/1999/xhtml" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">

<head>
    <title>{{ $pod->manual->title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 14px;
            color: #1D2031;
            background: #FFFFFF;
            line-height: 1.666666;
            padding: 15px;
        }
        
        a,
        a:link,
        a:visited {
            color: #4AB2C5;
            text-decoration: none;
        }
        
        a:hover {
            color: #4AB2C5;
            text-decoration: underline;
        }
        
        h1 {
            line-height: 1.25em;
        }
        
        h1,
        h2,
        h3,
        p {
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        h2 {
            line-height: 1.25em;
            margin-bottom: 5px;
        }
        
        h3 {
            font-style: italic;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0px 4px 24px #00000029;
            border-radius: 13px;
        }
        
        .podcast-image {
            float: right;
            width: 160px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        
        .podcast-image img {
            width: 160px;
            height: auto;
            border-radius: 10px;
        }
        
        .podcast-header {
            margin-bottom: 20px;
        }
        
        .item {
            clear: both;
            border-top: 1px solid #e0e4e8;
            padding: 20px 0;
        }
        
        audio {
            width: 100%;
            border-radius: 4px;
        }
        
        audio:focus {
            outline: none;
        }
        
        .episode-image img {
            width: 100px;
            height: auto;
            margin: 0 30px 15px 0;
            border-radius: 5px;
        }
        
        .episode-time {
            font-size: 12px;
            color: #545d67;
            margin-bottom: 1em;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
      
       
        <div class="podcast-header">
            <h1>
                <div class="podcast-image">
                <img src="{{asset('public/uploads/'.$pod->manual->image) }}" title="{{ (string)$pod->manual->title}} ">
                </div>  {{ (string)$pod->manual->title}}   </h1>
            <p>
                {{ (string)$pod->manual->description }} 
            </p>
            @auth
            @if($pod->user_id == auth()->id())
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                اضف جديد
              </button>
            @endif
        @endauth
        </div>
        @if($pod->manual->sounds->count() == 0)
        <div class="item">
            <h2><a  >{{ 'لا تحتوي على اي ملف' }} </a></h2>
          
            @endif
        @foreach ($pod->manual->sounds as $item)
        <div class="item">
            <h2><a href="https://podeo.co" target="_blank">{{ (string)$item->title }} </a></h2>
            <div class="episode-time"><span>{{ $item->created_at }}</span> •
                </div>
            <p>
               {{ (string)$item->description }} 
            </p><audio controls="true" preload="none" src="{{ utf8_decode(asset('public/audio/'.$item->sound))}}"></audio></div>
        @endforeach
        
        
      
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"> اضف ملف صوتي جديد</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="row">
                      <div class="col">
                        <label for=""> العنوان</label>
                        <input type="text" name="title" class="form-control" placeholder="العنوان">
                      </div>
                      <div class="col">
                        <label for=""> الوصف</label>

                        <input type="text" name="description"  class="form-control" placeholder="الوصف">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <label for=""> المف الصوتي</label>
                          <input type="file" name="sound" class="form-control" placeholder="العنوان">
                        </div>
                        
                      </div>
                  </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
</body>

</html>