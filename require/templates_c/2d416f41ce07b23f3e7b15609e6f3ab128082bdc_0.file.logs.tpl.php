<?php
/* Smarty version 3.1.33, created on 2019-05-24 11:20:37
  from 'C:\UwAmp\www\template\logs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce7b765596840_07730735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d416f41ce07b23f3e7b15609e6f3ab128082bdc' => 
    array (
      0 => 'C:\\UwAmp\\www\\template\\logs.tpl',
      1 => 1558689635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../template/header.tpl' => 1,
  ),
),false)) {
function content_5ce7b765596840_07730735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\UwAmp\\www\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>uLogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='/assets/css/bootstrap.min.css'>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:../template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logs']->value, 'myLogs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myLogs']->value) {
?>
        <article>
            <h3><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['title'];?>
</h3>
            <span>Le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['myLogs']->value['date'],"%d %B %Y à %H:%M");?>
 <br /><div class="badge badge-primary text-white">Auteur: <var><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['author'];?>
</var></div></span>
            <br />
            <br />
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLogsLink($_smarty_tpl->tpl_vars['myLogs']->value['image']);?>
"><img src="/upload/200-<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['myLogs']->value['title']);?>
.jpg" class="rounded img-fluid" alt="..."></a>
            <br />
            <br />
            <kbd><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['content'];?>
</kbd>
            <br />
            <br />
            
        </article>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <br />

        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Modifier</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Supprimer</button>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel"><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['title'];?>
</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                            
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="recipient-name"  class="col-form-label">Titre:</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['myLogs']->value['title'];?>
" disabled>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="content" ><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['content'];?>
</textarea>
                            </div>

                                                        <div class="form-group">
                                <label for="message-text" class="col-form-label">Auteur:</label>
                                <textarea class="form-control" name="author" ><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['author'];?>
</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text"  class="col-form-label">Catégorie:</label>
                                <select class="custom-select" name="idCategory" id="category">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['myCategory']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['idCategory'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="updateLogs" class="btn btn-primary">Modifier</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModallabel"><?php echo $_smarty_tpl->tpl_vars['myLogs']->value['title'];?>
</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Êtes-vous sur de vouloir supprimer ce logs ?</p>
                    </div>

                    <div class="modal-footer">
                        <form method="POST" enctype="multipart/form-data">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="deleteLogs" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
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
</body>
</html><?php }
}
