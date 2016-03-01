<?php /* Smarty version Smarty-3.0.4, created on 2016-02-29 19:59:43
         compiled from "C:/OpenServer/domains/modxShop/manager/templates/default/element/tv/renders/properties/image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:606156d478ff5763d4-19210774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e5c82dd49eefaa540bc3225c6f93eedb9dc7cff' => 
    array (
      0 => 'C:/OpenServer/domains/modxShop/manager/templates/default/element/tv/renders/properties/image.tpl',
      1 => 1455154042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '606156d478ff5763d4-19210774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:/OpenServer/domains/modxShop/core/model/smarty/plugins\modifier.escape.php';
?><div id="tv-wprops-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
"></div>


<script type="text/javascript">
// <![CDATA[
var params = {
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('params')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
if ($_smarty_tpl->tpl_vars['v']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['p']['last'] = $_smarty_tpl->tpl_vars['v']->last;
?>
 '<?php echo (isset($_smarty_tpl->tpl_vars['k']->value) ? $_smarty_tpl->tpl_vars['k']->value : null);?>
': '<?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['v']->value) ? $_smarty_tpl->tpl_vars['v']->value : null),"javascript");?>
'<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['p']['last']){?>,<?php }?>
<?php }} ?>
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,labelAlign: 'top'
    ,cls: 'form-with-labels'
    ,border: false
    ,items: [{
        xtype: 'textfield'
        ,fieldLabel: _('image_alt')
        ,name: 'prop_alttext'
        ,id: 'prop_alttext<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['alttext'] || ''
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'numberfield'
        ,fieldLabel: _('image_hspace')
        ,name: 'prop_hspace'
        ,id: 'prop_hspace<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['hspace'] || ''
        ,width: 200
        ,listeners: oc
    },{
        xtype: 'numberfield'
        ,fieldLabel: _('image_vspace')
        ,name: 'prop_vspace'
        ,id: 'prop_vspace<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['vspace'] || ''
        ,width: 200
        ,listeners: oc
    },{
        xtype: 'numberfield'
        ,fieldLabel: _('image_border_size')
        ,name: 'prop_borsize'
        ,id: 'prop_borsize<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['borsize'] || ''
        ,width: 200
        ,listeners: oc
    },{
        xtype: 'combo'
        ,name: 'prop_align'
        ,hiddenName: 'prop_align'
        ,id: 'prop_align<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,fieldLabel: _('image_align')
        ,store: new Ext.data.SimpleStore({
            fields: ['v']
            ,data: [['none'],['baseline'],['top'],['middle'],['bottom'],['texttop'],['absmiddle'],['absbottom'],['left'],['right']]
        })
        ,displayField: 'v'
        ,valueField: 'v'
        ,mode: 'local'
        ,editable: true
        ,forceSelection: false
        ,typeAhead: false
        ,triggerAction: 'all'
        ,value: params['align'] || 'none'
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('name')
        ,name: 'prop_name'
        ,id: 'prop_name<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['name'] || ''
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('class')
        ,name: 'prop_class'
        ,id: 'prop_class<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['class'] || ''
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('id')
        ,name: 'prop_id'
        ,id: 'prop_id<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['id'] || ''
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('style')
        ,name: 'prop_style'
        ,id: 'prop_style<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['style'] || ''
        ,anchor: '100%'
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('attributes')
        ,name: 'prop_attributes'
        ,id: 'prop_attributes<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['attributes'] || ''
        ,anchor: '100%'
        ,listeners: oc
    }]
    ,renderTo: 'tv-wprops-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
});
// ]]>
</script>

