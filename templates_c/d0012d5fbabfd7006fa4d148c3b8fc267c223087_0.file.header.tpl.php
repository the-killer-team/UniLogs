<?php
/* Smarty version 3.1.33, created on 2019-05-24 12:34:15
  from 'C:\UwAmp\www\template\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce7c8a704e820_21134576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0012d5fbabfd7006fa4d148c3b8fc267c223087' => 
    array (
      0 => 'C:\\UwAmp\\www\\template\\header.tpl',
      1 => 1558694054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce7c8a704e820_21134576 (Smarty_Internal_Template $_smarty_tpl) {
?>    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="/index">uLogs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mr-auto"></div>

            <form action="/search" method="POST" class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" name="search"  id="search" value="" placeholder="Rechercher...">
                    
                <button class="btn btn-primary my-2 my-sm-0" data-live-search="true" type="submit">Rechercher</button>
                
            </form>
        </div>
    </nav><?php }
}
