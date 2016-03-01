<?php /* Smarty version Smarty-3.0.4, created on 2016-02-26 20:08:54
         compiled from "C:/OpenServer/domains/modxShop/manager/templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2809256d086a6242ce9-40559702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92ea1d69a9da4480789843f1d1710334176c5a20' => 
    array (
      0 => 'C:/OpenServer/domains/modxShop/manager/templates/default/header.tpl',
      1 => 1455154042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2809256d086a6242ce9-40559702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:/OpenServer/domains/modxShop/core/model/smarty/plugins\modifier.escape.php';
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_direction']) ? $_smarty_tpl->getVariable('_config')->value['manager_direction'] : null);?>
" lang="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_lang_attribute']) ? $_smarty_tpl->getVariable('_config')->value['manager_lang_attribute'] : null);?>
" xml:lang="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_lang_attribute']) ? $_smarty_tpl->getVariable('_config')->value['manager_lang_attribute'] : null);?>
"<?php if ((isset($_smarty_tpl->getVariable('_config')->value['manager_html5_cache']) ? $_smarty_tpl->getVariable('_config')->value['manager_html5_cache'] : null)==1){?> manifest="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
cache.manifest.php"<?php }?>>
<head>
<title><?php if ($_smarty_tpl->getVariable('_pagetitle')->value){?><?php echo $_smarty_tpl->getVariable('_pagetitle')->value;?>
 | <?php }?><?php echo smarty_modifier_escape(preg_replace('!<[^>]*?>!', ' ', (isset($_smarty_tpl->getVariable('_config')->value['site_name']) ? $_smarty_tpl->getVariable('_config')->value['site_name'] : null)));?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo (isset($_smarty_tpl->getVariable('_config')->value['modx_charset']) ? $_smarty_tpl->getVariable('_config')->value['modx_charset'] : null);?>
" />

<?php if ((isset($_smarty_tpl->getVariable('_config')->value['manager_favicon_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_favicon_url'] : null)){?><link rel="shortcut icon" href="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_favicon_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_favicon_url'] : null);?>
" /><?php }?>

<link rel="stylesheet" type="text/css" href="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/ext3/resources/css/ext-all-notheme-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('indexCss')->value;?>
?v=<?php echo $_smarty_tpl->getVariable('versionToken')->value;?>
" />

<?php if ((isset($_smarty_tpl->getVariable('_config')->value['ext_debug']) ? $_smarty_tpl->getVariable('_config')->value['ext_debug'] : null)){?>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/ext3/adapter/ext/ext-base-debug.js" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/ext3/ext-all-debug.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/ext3/adapter/ext/ext-base.js" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/ext3/ext-all.js" type="text/javascript"></script>
<?php }?>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
assets/modext/core/modx.js?v=<?php echo $_smarty_tpl->getVariable('versionToken')->value;?>
" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['connectors_url']) ? $_smarty_tpl->getVariable('_config')->value['connectors_url'] : null);?>
lang.js.php?ctx=mgr&topic=topmenu,file,resource,<?php echo $_smarty_tpl->getVariable('_lang_topics')->value;?>
&action=<?php echo htmlspecialchars((isset($_GET['a'])? $_GET['a'] : null));?>
" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['connectors_url']) ? $_smarty_tpl->getVariable('_config')->value['connectors_url'] : null);?>
modx.config.js.php?action=<?php echo htmlspecialchars((isset($_GET['a'])? $_GET['a'] : null));?>
<?php if ($_smarty_tpl->getVariable('_ctx')->value){?>&wctx=<?php echo $_smarty_tpl->getVariable('_ctx')->value;?>
<?php }?>" type="text/javascript"></script>

<?php if ((isset($_smarty_tpl->getVariable('_config')->value['compress_js']) ? $_smarty_tpl->getVariable('_config')->value['compress_js'] : null)&&(isset($_smarty_tpl->getVariable('_config')->value['compress_js_groups']) ? $_smarty_tpl->getVariable('_config')->value['compress_js_groups'] : null)){?>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
min/index.php?g=coreJs1" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
min/index.php?g=coreJs2" type="text/javascript"></script>
<script src="<?php echo (isset($_smarty_tpl->getVariable('_config')->value['manager_url']) ? $_smarty_tpl->getVariable('_config')->value['manager_url'] : null);?>
min/index.php?g=coreJs3" type="text/javascript"></script>
<?php }?>

<?php echo $_smarty_tpl->getVariable('maincssjs')->value;?>

<?php  $_smarty_tpl->tpl_vars['scr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssjs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['scr']->key => $_smarty_tpl->tpl_vars['scr']->value){
?>
<?php echo (isset($_smarty_tpl->tpl_vars['scr']->value) ? $_smarty_tpl->tpl_vars['scr']->value : null);?>

<?php }} ?>

<script type="text/javascript">
    Ext.onReady(function() {
        // Enable site name tooltip (on overflow only)
        if( Ext.get('site_name').dom.scrollWidth > Ext.get('site_name').dom.clientWidth ){
          new Ext.ToolTip({
              title: Ext.get('site_name').dom.title
              ,target: Ext.get('site_name')
          });
        }
        <?php if ($_smarty_tpl->getVariable('_search')->value){?>
        new MODx.SearchBar;
        <?php }?>
    });
</script>

</head>
<body id="modx-body-tag">

<div id="modx-browser"></div>
<div id="modx-container">
    <div id="modx-header">
        <div id="modx-navbar">
            <ul id="modx-user-menu">
                <?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->getVariable('userNav')->value, $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->getRenderedTemplate(); ?>
            </ul>

            <ul id="modx-topnav">
                <li id="modx-home-dashboard">
                    <a href="?" title="MODX <?php echo (isset($_smarty_tpl->getVariable('_config')->value['settings_version']) ? $_smarty_tpl->getVariable('_config')->value['settings_version'] : null);?>
 (<?php echo (isset($_smarty_tpl->getVariable('_config')->value['settings_distro']) ? $_smarty_tpl->getVariable('_config')->value['settings_distro'] : null);?>
)
<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['dashboard']) ? $_smarty_tpl->getVariable('_lang')->value['dashboard'] : null);?>
"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['dashboard']) ? $_smarty_tpl->getVariable('_lang')->value['dashboard'] : null);?>
</a>
                </li>
                <li id="modx-site-info">
                    <div id="site_name" class="info-item site_name" title="<?php echo smarty_modifier_escape(preg_replace('!<[^>]*?>!', ' ', (isset($_smarty_tpl->getVariable('_config')->value['site_name']) ? $_smarty_tpl->getVariable('_config')->value['site_name'] : null)));?>
"><?php echo smarty_modifier_escape(preg_replace('!<[^>]*?>!', ' ', (isset($_smarty_tpl->getVariable('_config')->value['site_name']) ? $_smarty_tpl->getVariable('_config')->value['site_name'] : null)));?>
</div>
                    <div class="info-item full_appname">MODX Revolution <?php echo (isset($_smarty_tpl->getVariable('_config')->value['settings_version']) ? $_smarty_tpl->getVariable('_config')->value['settings_version'] : null);?>
</div>
                </li>
                <?php if ($_smarty_tpl->getVariable('_search')->value){?>
                <li id="modx-manager-search-icon">
                    <a href="javascript:;" onclick="Ext.getCmp('modx-uberbar').toggle()" title="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['search']) ? $_smarty_tpl->getVariable('_lang')->value['search'] : null);?>
">
                        <span class="icon-stack icon-lg">
                          <i class="icon icon-square icon-stack-2x"></i>
                          <i class="icon icon-search icon-stack-1x"></i>
                        </span>
                    </a>
                </li>
                <?php }?>
                <?php echo $_smarty_tpl->getVariable('navb')->value;?>

            </ul>
            <?php if ($_smarty_tpl->getVariable('_search')->value){?>
            <div id="modx-manager-search"></div>
            <?php }?>
        </div>
    </div>
        <div id="modAB"></div>
        <div id="modx-leftbar"></div>
        <div id="modx-content">
            <div id="modx-panel-holder"></div>
