<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Spinner</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<header>
    <h1>Lottery</h1>
</header>

<div class="lottery-spinner">
    <p>Click the button to spin the lottery!</p>
    <button class="buttonload" id="spin-button">
        <i style="display: none" class="fa fa-spinner fa-spin"></i>
        <span class="button-text">Spin</span>
    </button>
</div>
<br>
<div class="result"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Attach click event handler to the button with id "myButton"
        $("#spin-button").click(function () {
            $('.fa-spinner').css({
                'display': 'inline-block'
            })
            $('.button-text').text('Loading');
            $.ajax({
                type: 'POST',
                url: '/api/spin',
                success: function (response) {
                    $('.result').html('');
                    $(".result").append(response);
                    $('.fa-spinner').css({
                        'display': 'none'
                    })
                    $('.button-text').text('Spin');
                },
                error: function (error) {
                    $('.fa-spinner').css({
                        'display': 'none'
                    })
                    $('.button-text').text('Spin');
                }
            });
        });

    });
</script>

</body>
</html>
