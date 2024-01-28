<?php
/* Smarty version 4.3.4, created on 2024-01-28 19:09:45
  from 'C:\project\lotto\resources\views\smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65b6a679932fd9_16333582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd0153fdfc181920882c0da79cfd3cc7a03e6966' => 
    array (
      0 => 'C:\\project\\lotto\\resources\\views\\smarty\\templates\\index.tpl',
      1 => 1706468982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b6a679932fd9_16333582 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
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
                    console.error('Error:', error);
                }
            });
        });

    });
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
