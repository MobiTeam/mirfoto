<?php

/**
 * shkRenderOrderDataProcessor
 *
 * @package shopkeeper3
 * @subpackage processors
 */

class shkRenderOrderDataProcessor extends modProcessor {

    public function process() {
        
        $output = '';
        $scriptProperties = $this->getProperties();
        $orderOuterTpl = $this->modx->getOption( 'orderOuterTpl', $scriptProperties, 'orderOuterTpl' );
        $orderContactsTpl = $this->modx->getOption( 'orderContactsTpl', $scriptProperties, 'orderContactsTpl' );
        $orderPurchaseRowTpl = $this->modx->getOption( 'orderPurchaseRowTpl', $scriptProperties, 'orderPurchaseRowTpl' );
        $order_data = $this->modx->getOption( 'order_data', $scriptProperties, array() );
        $statuses = $this->modx->getOption( 'statuses', $scriptProperties, array() );
        
        $orderOutputData = '';
        
        //echo '<pre>' . print_r( $order_data, true ) . '</pre>';
        
        //purchases
        $purchasesOutput = '';
        if( !empty( $order_data['purchases'] ) ){
            
            foreach( $order_data['purchases'] as $purchase ){
                
                $purchase['addit_data'] = $this->getPurchasesOptionsData($purchase['options']);
                //if( empty( $purchase['addit_data'] ) ){ $purchase['addit_data'] = '&mdash;'; }
                unset($purchase['options']);
                $purchasesOutput .= $this->modx->getChunk( $orderPurchaseRowTpl, $purchase );
                
            }
            
        }
        
        //contacts
        $contactsOutput = '';
        if( !empty( $order_data['contacts'] ) ){
            foreach( $order_data['contacts'] as $contact ){
                //if( empty( $contact['value'] ) ){ $contact['value'] = '&mdash;'; }
                $contactsOutput .= $this->modx->getChunk( $orderContactsTpl, $contact );
            }
            
        }
        
        unset( $order_data['contacts'], $order_data['purchases'] );
        
        $order_data['status_name'] = !empty( $statuses[$order_data['status']] ) ? $statuses[$order_data['status']]['label'] : '';
        $order_data['status_color'] = !empty( $statuses[$order_data['status']] ) ? $statuses[$order_data['status']]['color'] : '';
        $order_data['order_id'] = $order_data['id'];
        $order_data['contacts'] = $contactsOutput;
        $order_data['purchases'] = $purchasesOutput;
        
        $output .= $this->modx->getChunk( $orderOuterTpl, $order_data );
        
        $output = array(
            'success' => true,
            'message' => '',
            'object' => $output
        );
        
        return $output;
        
    }
    
    
    /**
     * getPurchasesOptionsData
     *
     */
    public function getPurchasesOptionsData( $options ){
        
        $output = '';
        $data_arr = array();
        
        if( !empty( $options ) ){
            
            foreach( $options as $name => $opt ){
                
                $full_name = $opt[0];
                if( !empty( $opt[1] ) ){
                    $full_name .= ' (' . $opt[1] . ')';
                }
                array_push( $data_arr, $full_name );
                
            }
            
        }
        
        $output = implode( ', ', $data_arr );
        
        return $output;
        
    }
    
    
}

return 'shkRenderOrderDataProcessor';
