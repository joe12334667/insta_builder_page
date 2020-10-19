<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Suss</div>
    </body>

    <script>
        var getUrlString = location.href;
        var url = new URL(getUrlString);
        code = url.searchParams.get('code');
        alert(code);
        document.location.href = 'https://api.instagram.com/oauth/access_token?client_id=828605147630397&'
                + 'client_secret=57a6391539ecae81640aceb359143665&'
                + 'grant_type=authorization_code'
                + '&redirect_uri=https://localhost/insta_builder_page/instaLognIn/LoginSuss_2.php&'
                + 'code='+code;

//        $.ajax({
//        type:"POST",
//                cache: false,
//                url: 'https://api.instagram.com/oauth/access_token',
//                data:{
//                client_id:828605147630397,
//                        client_secret:57a6391539ecae81640aceb359143665,
//                        grant_type:grant_type,
//                        redirect_uri:
//                },
//                dataType: 'json',
//                success: function(response) {
//                    print response;
//                }
//        });
    </script>    
</html>

