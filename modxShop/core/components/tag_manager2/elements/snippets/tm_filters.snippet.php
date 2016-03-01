<?php
/**
 * snippet tmFilters
 *
 */

ini_set('display_errors',1);
error_reporting(E_ALL);

$create = $modx->getOption('create',$scriptProperties,'');
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,'');

require_once MODX_CORE_PATH."components/tag_manager2/model/tm_filters.class.php";
$tm_filters = new tmFilters($modx, $scriptProperties);

if( $create ){
    $output = $tm_filters->createFilters( $create );
}else{
    $output = $tm_filters->getFiltersOutput();
}

if($toPlaceholder){
    $modx->setPlaceholder($toPlaceholder,$output);
    $output = '';
}

if( !isset($scriptProperties['style']) || !empty($scriptProperties['style']) ){
    $modx->regClientCSS($modx->config['assets_url']."components/tag_manager2/css/web/tm-style.css");
}

if( !isset($scriptProperties['jsScript']) || !empty($scriptProperties['jsScript']) ){
    
    $filtersType = $modx->getOption('filtersType',$scriptProperties,'filters');
    $shk_currency_default = $modx->getOption('shk.currency_default',$scriptProperties,'');
    
    $shk_currency_rate = $modx->getOption('shk.currency_rate',$scriptProperties,'');
    
    $headHtml = '
        <script type="text/javascript">var tmFiltersOptions = {type: "'.$filtersType.'",currency_default:"'.$shk_currency_default.'",currency_rate:"'.$shk_currency_rate.'"};</script>';
    
    $modx->regClientScript($headHtml,true);
    $modx->regClientScript($modx->config['assets_url']."components/tag_manager2/js/require.js");
    $modx->regClientScript($modx->config['assets_url']."components/tag_manager2/js/web/tm_loader.js");
    
}

return $output;