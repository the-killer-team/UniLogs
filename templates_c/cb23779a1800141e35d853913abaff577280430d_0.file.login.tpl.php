<?php
/* Smarty version 3.1.33, created on 2019-05-10 14:25:15
  from 'C:\UwAmp\www\template\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd56dab15db58_70301638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb23779a1800141e35d853913abaff577280430d' => 
    array (
      0 => 'C:\\UwAmp\\www\\template\\login.tpl',
      1 => 1557490968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd56dab15db58_70301638 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>uLogs</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <?php echo '<script'; ?>
 src='main.js'><?php echo '</script'; ?>
>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label for="username">Pseudonyme :</label><br />
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Mot de passe :</label><br />
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="email">Email :</label><br />
            <input type="text" id="email" name="email">
        </div>        
        <br />
        <button type="submit" name="register">S'inscrire</button>
    </form>
</body>
</html><?php }
}
