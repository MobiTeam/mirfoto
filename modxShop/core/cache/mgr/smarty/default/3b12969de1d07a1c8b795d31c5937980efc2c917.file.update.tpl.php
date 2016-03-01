<?php /* Smarty version Smarty-3.0.4, created on 2016-03-01 08:06:55
         compiled from "C:/OpenServer/domains/modxShop/manager/templates/default/resource/staticresource/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2473656d5236f9a07c6-28466839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b12969de1d07a1c8b795d31c5937980efc2c917' => 
    array (
      0 => 'C:/OpenServer/domains/modxShop/manager/templates/default/resource/staticresource/update.tpl',
      1 => 1455154042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2473656d5236f9a07c6-28466839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="modx-panel-static-div"></div>
<div id="modx-resource-tvs-div" class="modx-resource-tab x-form-label-left x-panel"><?php echo $_smarty_tpl->getVariable('tvOutput')->value;?>
</div>

<?php echo $_smarty_tpl->getVariable('onDocFormPrerender')->value;?>

<?php if ($_smarty_tpl->getVariable('resource')->value->richtext&&(isset($_smarty_tpl->getVariable('_config')->value['use_editor']) ? $_smarty_tpl->getVariable('_config')->value['use_editor'] : null)){?>
    <?php echo $_smarty_tpl->getVariable('onRichTextEditorInit')->value;?>

<?php }?>
