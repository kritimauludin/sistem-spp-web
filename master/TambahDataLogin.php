<html>
    <head>
        <title>Tugas Akhir</title>
        <style type="text/css">
            #password-ukur{ display: block;}
            div{ width: 300px; margin: 10px;}
            input, progress, button { font-size: 15px; width: 100%; height: 30px;}
        </style>
    </head>
    <body>
        <div>
            <input type="text" id="username" placeholder="Username"/>
            <input type="text" id="password" placeholder="Password"/>
            <progress id="password-ukur" value="0" max="100"></progress>
            <button id="masuk">Masuk</button>
        </div>
        <script>
            let password = document.querySelector('#password');
            let passwordUkur = document.querySelector( '#password-ukur');
            password.addEventListener("keyup", function(e){
                cekPassword(password.value);
            });
            function cekPassword(password){
                let strength = 0;
                if (password.match(/([a-z])/)){ strength += 1; }
                if (password.match(/([A-Z])/)){ strength += 1; }
                if (password.match(/([0-9])/)){ strength += 1; }
                if (password.length >= 6){ strength += 1; }
                passwordUkur.value = strength * 25;
            }
        </script>
    </body>
</html>