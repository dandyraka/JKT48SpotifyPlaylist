<!DOCTYPE html>
<html>

<head>
    <title>JKT48 Members Playlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://developer.spotify.com/images/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .link-class:hover {
            background-color: #f1f1f1;
        }

        a {
            color: inherit; /* blue colors for links too */
            text-decoration: inherit; /* no underline */
        }

        footer {
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: white;
        }
    </style>
</head>

<body>
    <br /><br />
    <div class="container">
        <h2 align="center">JKT48 Members Playlist</h2>
        <h4 align="center">Find out what JKT48 members listen to</h4>
        <div align="center">
            <small>Source : <a href="https://open.spotify.com/user/jkt48-official?si=810f3a93f49d48f7" target="_blank">JKT48 Spotify</a> | Updated on 29/08/2021</small>
            <br /><br />
            <input type="text" name="search" id="search" placeholder="Song title / artist name" class="form-control" />
        </div>
        <ul class="list-group" id="result"></ul>
        <br />
    </div>
    <footer>
        Made with <span style="color: #8B64FF;">&#128156;</span> by <a href="https://twitter.com/xtrvts" target="_blank">xtrvts</a>
    </footer>
</body>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            cache: false
        });
        $('#search').keyup(function () {
            $('#result').html('');
            $('#state').val('');
            let searchField = $('#search').val();
            let expression = new RegExp(searchField, "i");
            $.getJSON('playlist4.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.track.search(expression) != -1 || value.member.search(expression) != -1) {
                        $('#result').append(
                            '<a href="'+value.link+'" target="_blank"><li class="list-group-item link-class"><b>' + value
                            .track + '</b> is on <b>' + value.member +
                            '</b> playlist</li></a>');
                    }
                });
            });
        });

        $('#result').on('click', 'li', function () {
            let click_text = $(this).text().split('|');
            $('#search').val('');
            $("#result").html('');
        });
    });
</script>
</html>
