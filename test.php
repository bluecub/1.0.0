<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  

    <script type="text/javascript">
        function previewImages(input) {
            if (input.files.length) {
                for(var i =0; i<input.files.length; i++){
                    
                    const img = document.createElement("img");
                    img.src = URL.createObjectURL(input.files[i]);
                    img.height = 200;
                    img.height = 200;
                    img.onload = function() {
                        URL.revokeObjectURL(input.src);
                    }
                    document.getElementById('test').appendChild(img);
                }
            }
        }
    </script>

    <body>
        <form id="form1" runat="server">
            <input type="file" name="file[]" onchange="previewImages(this);" multiple/>

            <div id="test">

            </div>

        </form>
    </body>
    
</body>
</html>


