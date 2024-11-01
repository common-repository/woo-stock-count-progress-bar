<div class="scfwc-stock-counter">

    <div id="scfwc_total_sale" total-sale="<?php echo esc_attr( $scfwcSale ); ?>" total-stock="<?php echo esc_attr($scfwcTotalStock) ?>"></div>

    <p class="stock-progressbar-status"><span class="total-sold"> <?php echo esc_html__("Sold: {$scfwcSale}",'scfwc'); ?></span><span class="instock"><?php echo  esc_html__("Instock: ". round($stock) ." ",'scfwc'); ?> </span></p>

    <div class="jqmeter-container"></div>
    
</div>