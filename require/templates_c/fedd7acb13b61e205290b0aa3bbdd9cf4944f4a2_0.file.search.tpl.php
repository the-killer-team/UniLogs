<?php
/* Smarty version 3.1.33, created on 2019-05-24 11:35:10
  from 'C:\UwAmp\www\template\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce7bace38eea7_92496610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fedd7acb13b61e205290b0aa3bbdd9cf4944f4a2' => 
    array (
      0 => 'C:\\UwAmp\\www\\template\\search.tpl',
      1 => 1558690509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../template/header.tpl' => 1,
  ),
),false)) {
function content_5ce7bace38eea7_92496610 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>uLogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/bootstrap.min.css'>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:../template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
        <h2 class="mb-3">Résultats de recherche</h2>
        <?php if (!empty($_smarty_tpl->tpl_vars['searchLogs']->value)) {?>
        <div class="h4">Logs:</div>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searchLogs']->value, 'logs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['logs']->value) {
?>
        <h6><a href="/logs/<?php echo $_smarty_tpl->tpl_vars['logs']->value['idLogs'];?>
"><?php echo $_smarty_tpl->tpl_vars['logs']->value['title'];?>
</a></h4>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <?php } else { ?>
        <div class="h4">Logs:</div>
        <p>Pas de logs à afficher.</p>
        <?php }?>
    </div>
  </div>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="assets/js/search.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
