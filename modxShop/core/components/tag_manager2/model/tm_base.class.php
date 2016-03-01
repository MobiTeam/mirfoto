<?php

/**
 * tagManager2
 *
 * tagManagerBase class
 *
 * @author Andchir <andchir@gmail.com>
 * @package tag_manager2
 * @version 2.2rc1
 */

class tagManagerBase {
    
    public $modx = null;
    public $config = array();
    
    /**
     * 
     * @param object $this->modx
     * @param array $config
     */
    function __construct(modX &$modx, $config = array()){
    
        $this->modx =& $modx;
        
        $this->config = array_merge(array(
            
            "className" => $this->modx->getOption('tag_mgr2.className',null,'modResource'),
            "packageName" => $this->modx->getOption('tag_mgr2.packageName',null,'modResource'),
            
            "categoryId" => $this->modx->resource ? $this->modx->resource->get('id') : 0,
            "context" => $this->modx->getoption('tag_mgr2.catalog_context', null, ''),
            "numericFields" => explode(',', $this->modx->getOption('tag_mgr2.numeric',null,'')),
            "multitagsFields" => $this->modx->getOption('tag_mgr2.multitags',null,''),
            "priceName" => $this->modx->getoption('tag_mgr2.priceName', null, 'price'),
            "className" => $this->modx->getOption('tag_mgr2.className',null,'modResource'),
            "packageName" => $this->modx->getOption('tag_mgr2.packageName',null,'modResource'),
            "jsMap" => false,
            
            "filterTpl" => "tm2_filterTpl",
            "filterNumericTpl" => "tm2_filterNumericTpl",
            "filterOuterTpl" => "tm2_filterOuterTpl",
            "filterNumericOuterTpl" => "tm2_filterOuterTpl"
            
        ),$config);
        
        if( $this->config[ 'multitagsFields' ] ){
            $this->config[ 'multitagsFields' ] = explode( ',', $this->config[ 'multitagsFields' ] );
        }
        
    }
    
    
    /**
     * getSnippetProperties
     *
     */
    public function getSnippetProperties( $resource_id = 0 ){
        
        $propertySetName = $this->modx->getOption('tag_mgr2.propertySetName',null,'filters');
        $propertySetSnippet = $this->modx->getOption('tag_mgr2.propertySetSnippet',null,'getPage');
        
        //Ищем имя набора параметров в параметрах шаблона
        if( $resource_id ){
            $resource = $this->modx->getObject('modResource',$resource_id);
            if( $resource ){
                $templateObj = $resource->getOne('Template');
            }
        }else{
            $templateObj = $this->modx->resource->getOne('Template');
        }
        
        $templateProps = $templateObj->getProperties();
        if(!empty($templateProps['prodPropertySetName'])) $propertySetName = $templateProps['prodPropertySetName'];
        
        $propSet = $this->modx->getObject('modPropertySet',array('name'=>$propertySetName));
        $propSetProperties = is_object($propSet) ? $propSet->getProperties() : array();
        
        //Смешиваем с параметрами по умолчанию сниппета
        $snippet = $this->modx->getObject('modSnippet',array('name'=>$propertySetSnippet));
        $defaultProperties = $snippet->getProperties();
        
        if( !empty($propSetProperties['className']) ) $this->config['className'] = $propSetProperties['className'];
        if( !empty($propSetProperties['packageName']) ) $this->config['packageName'] = $propSetProperties['packageName'];
        $properties = array_merge($defaultProperties, $propSetProperties, $this->config);
        
        //Определяем шаблон вывода. Если надо берём номер шаблона из кук
        $view_type = !empty($_COOKIE['tm_view']) ? (int) $_COOKIE['tm_view'] : 1;
        if($view_type && !empty($properties['tpl_list'])){
            $tpl_list = explode(',',$properties['tpl_list']);
            if(isset($tpl_list[$view_type-1])){
                $properties['tpl'] = trim($tpl_list[$view_type-1]);
            }
        }
        
        return $properties;
        
    }
    
    
}
