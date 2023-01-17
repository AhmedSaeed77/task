<html>
<head>
    <title>Progress Bar</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

    <style>
        .progress{
            position: relative;
            width: 50%;
            background-color: #c9cfc9;
        }
        .bar{
            background-color: #00ff00;
            width: 0%;
            height: 20px;
        }
        .percent{
            position: absolute;
            display: inline-block;
            left : 50%;
            color: #040608;
            
        }
    </style>
</head>
<body>
<form action="{{route('progressbarshow')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="myfile" required ><br><br>

    <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div><br>
    
    <input type="submit" value="Upload File to Server">
</form>

<script type="text/javascript">

    $(document).ready(function(){

    var bar = $(".bar");
    var percent = $(".percent");

    $('form').ajaxForm({

        beforeSend:function(){
          var percentval = '0%';
          bar.width(percentval);
          percent.html(percentval);
        },
        uploadProgress:function(event,position,total,percentComplete){
          var percentval = percentComplete+'%' ;
          bar.width(percentval);
          percent.html(percentval);
        },
        complete:function(res){
            console.log(res);
          alert("file upload success");
        }
    });

  }) ;

</script>

</body>
</html>