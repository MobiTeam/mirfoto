<?php
/**
 * Shopkeeper
 * 
 * Shopping cart for MODx Revolution
 *
 * @package shopkeeper3
 * @category 	   snippet
 * @version 	   3.x
 * @license 	   http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal	   @properties
 * @internal	   @modx_category Shop
 */

if(isset($hideOn) && preg_match('/(^|\s|,)'.$modx->resource->get('id').'(,|$)/',$hideOn)) return '';

$modx->placeholders['SHK_callCount'] = isset($modx->placeholders['SHK_callCount']) ? $modx->placeholders['SHK_callCount']+1 : 1;
$SHK_callCount = $modx->placeholders['SHK_callCount'];
if( !defined( 'SHOPKEEPER_URL' ) ) define( 'SHOPKEEPER_URL', $modx->getOption('assets_url') . "components/shopkeeper3/" );

$output = '';

require_once $modx->getOption('core_path') . "components/shopkeeper3/model/shopkeeper.class.php";

$shopCart = new Shopkeeper($modx, $scriptProperties);

if( $SHK_callCount === 1 ){
    
    if( !empty( $scriptProperties['style'] ) ){
        $modx->regClientCSS( SHOPKEEPER_URL . "web/css/".$modx->getOption( 'style', $scriptProperties, 'default' ) . "/style.css" );
    }
    
    if( !$modx->getOption( 'noJavaScript', $scriptProperties, false ) ){
        
        if(!$modx->getOption( 'noJQuery', $scriptProperties, false ) ){
            $modx->regClientStartupScript( SHOPKEEPER_URL . "web/js/jquery-1.11.1.min.js" );
        }
        
        $modx->regClientStartupScript( SHOPKEEPER_URL . "web/js/lang/" . $modx->getOption( 'lang', $scriptProperties, 'ru' ) . ".js?v=" . $shopCart->getVersion() );
        $modx->regClientStartupScript( SHOPKEEPER_URL . "web/js/shopkeeper.js?v=" . $shopCart->getVersion() );
        
        $shk_opts = array(
            'prodCont' => $modx->getOption( 'prodCont', $scriptProperties, 'div.shk-item' ),
            'site_base_url' => $modx->config['base_url'],
            'counterField' => $modx->getOption( 'counterField', $scriptProperties, false ),
            'counterFieldCart' => $modx->getOption( 'counterFieldCart', $scriptProperties, true ),
            'changePrice' => $modx->getOption( 'changePrice', $scriptProperties, true ),
            'flyToCart' => $modx->getOption( 'flyToCart', $scriptProperties, 'helper' ),
            'noLoader' => $modx->getOption( 'noLoader', $scriptProperties, false ),
            'allowFloatCount' => $modx->getOption( 'allowFloatCount', $scriptProperties, false ),
            'animCart' => $modx->getOption( 'animCart', $scriptProperties, true ),
            'goToOrderFormPage' => $modx->getOption( 'goToOrderFormPage', $scriptProperties, false ),
            //'orderFormPage' => $modx->getOption('orderFormPage',$scriptProperties,0),
            'orderFormPageUrl' => $modx->makeUrl($modx->getOption('orderFormPageId',$scriptProperties,1),'','','abs'),
            'debug' => $modx->getOption( 'debug', $scriptProperties, false )
        );
        
        if( defined('JSON_UNESCAPED_SLASHES') && defined('JSON_FORCE_OBJECT') ){
            $options_obj_str = json_encode( $shk_opts, JSON_FORCE_OBJECT | JSON_UNESCAPED_SLASHES );
        }else{
            $options_obj_str = json_encode( $shk_opts );
        }
        
        $delivery_price = !empty( $shopCart->delivery['price'] ) ? $shopCart->delivery['price'] : 0;
        $delivery_name = !empty( $shopCart->delivery['label'] ) ? $shopCart->delivery['label'] : 0;
        
        //create script
        $headHtml = "\t<script type=\"text/javascript\">";
        $headHtml .= "
        SHK.data = {price_total:".Shopkeeper::$price_total.",items_total:".Shopkeeper::$items_total.",items_unique_total:".Shopkeeper::$items_unique_total.",delivery_price:{$delivery_price},delivery_name:'{$delivery_name}',ids:[".$shopCart->getProdIds('string')."]};
        jQuery(document).bind( 'ready', function(){
            SHK.init( " . $options_obj_str . " );
        });" . PHP_EOL;
        
        $headHtml .= "\t</script>" . PHP_EOL;
        
        $modx->regClientStartupHTMLBlock( $headHtml );
        
    }
    
}

//вывод корзины
$output .= $shopCart->getCartContent();

return $output;