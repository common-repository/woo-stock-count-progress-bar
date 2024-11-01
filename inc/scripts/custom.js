jQuery(document).ready(function(){
  'use strict';
  var wbpsSale = jQuery('#scfwc_total_sale').attr('total-sale');
  var wbpsStock = jQuery('#scfwc_total_sale').attr('total-stock');
  jQuery(".jqmeter-container").jQMeter({
    goal: wbpsStock,
    raised: wbpsSale,
    meterOrientation: "horizontal",
    width: "100%",
    height: progressbarOptions.progressbar_height + "px",
    bgColor: progressbarOptions.progressbar_bg_color,
    barColor: progressbarOptions.progessbar_fg_color,
    displayTotal: false,
  });
});
