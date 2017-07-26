<div>
    <?php foreach ($$targetObject as $row):?>                                              
        <div class='square-action'>
		
		<?php if(
			$row['sku_missin_inside_product'] != 'sku_missin_inside_product' and 
			$row['sku_misin_squ_woo_pro_variable'] != 'sku_misin_squ_woo_pro_variable'
		){ ?>
			
            <input name='woo_square_product' type='checkbox' value='<?php echo $row['checkbox_val']; ?>' checked />
	
		<?php } ?>
		
            
                <a target='_blank' href='<?php echo admin_url(); ?>post.php?post=<?php echo $row['woo_id']; ?>&action=edit'><?php echo $row['name']; ?></a>

<?php if ( !empty($row['woo_id'])):
				$_product = wc_get_product( $row['woo_id'] );
					if( $_product->is_type( 'variable' ) ) {
						$product_attr = get_post_meta( $row['woo_id'], '_product_attributes' );
						if(count($product_attr[0]) > 1){
							echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;"><b>To synchronize multiple attributes you would require WooSquare Pro</b></span>';
						}
				} 

				?>
            <?php else:?>
                <?php echo $row['name']; ?>
            <?php endif;?>

        </div>                        
    <?php endforeach; ?>
</div>