<?php 


/*
 * references:
 *    http://seiyria.com/bootstrap-slider/
 *    https://github.com/seiyria/bootstrap-slider
 *    http://jsfiddle.net/6hyVP/2/
 *    https://www.tutorialspoint.com/jqueryui/jqueryui_slider.htm
 *    http://api.jqueryui.com/slider
 *    http://www.w3schools.com/jquery/jquery_ref_selectors.asp
 *    http://learn.jquery.com/jquery-ui/
 *    http://learn.jquery.com/jquery-ui/widget-factory/classes-option/
 */

$enableRangeSlider  = 1;
$enableRangeSlider2 = 1;

$sliderDivClass  = 'rangeslider';
$prependToIdName = '';
$appendToIdName  = '';

//redcap_info();

$sliderWidth  = '500px';
$sliderHeight = '10px';
$handleWidth  = '8px';

$leftMarkerFieldnameSuffix = '_1';
$rightMarkerFieldnameSuffix = '_2';

$minValue = 0;
$maxValue = 100;

$presetMinValue = 10;
$presetMaxValue = 90;

$thisHookCssFile1 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/css/bootstrap.min.css';
$thisHookCssFile2 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/css/bootstrap-slider.css';

$bootstrapFile1 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/lib/bootstrap-slider.min.js';
$bootstrapFile2 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/lib/bootstrap-slider.js';
$bootstrapFile3 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/lib/bootstrap-slider.min.css';
$bootstrapFile4 = APP_PATH_WEBROOT_FULL . 'hooks/pid27/lib/bootstrap-slider.css';

//==================================================================================
//                        No edits needed below this point.
//==================================================================================

// echo<<<EOT
// <link rel="stylesheet" type="text/css" media="all" href="{$thisHookCssFile2}">
// EOT;

echo<<<EOT
<script type="text/javascript" src="{$bootstrapFile1}"></script>
<script type="text/javascript" src="{$bootstrapFile2}"></script>
<link rel="stylesheet" type="text/css" media="all" href="{$bootstrapFile3}">
<link rel="stylesheet" type="text/css" media="all" href="{$bootstrapFile4}">
EOT;



// echo<<<EOT
// <style>

// ;.rangeslider
// ;{
// ;    position:absolute;
// ;    height:100%;
// ;    top: 0;
// ;}

// #pain .slider-track-high {
// 	background: orange;
// }

// div.rangeslider.ui-slider-track-low, div.rangesliderx, .slider-track-low {
// 	background: red;
// }

// div.rangeslider, .ui-slider-track-low {
// 	background: green;
// }

// .ui-slider-range {
//     background: yellow;
// }

// .ui-slider .ui-slider-handle {
//     width: 6px;
// ;    text-decoration:none;
// ;    text-align:center;
// }

// .rangeslider {
//     background: aqua;
// }
 
// .ui-slider-track-high {
//     background: orange;
// }



// .slider-track-high, .rangeslider .slider-track-high {
// 	background: green;
// }

// .slider-track-low {
// 	background: red;
// }

//  .rangeslider .slider-selection {
// 	background: red;
// }

// .rangeslider {
//    width: {$sliderWidth};
//    height: {$sliderHeight};
// }
    
// </style>
// EOT;


echo<<<EOT
<style>
#slider12a .slider-track-high, #slider12c .slider-track-high {
	background: green;
}

#slider12b .slider-track-low, #slider12c .slider-track-low {
	background: red;
}

.slider-selection {
	background: orange;
}

.ui-slider-range {
    background: yellow;
}

.ui-slider-range-low {
    background: blue;
}


.testslider {
   background: purple;
}

.rangeslider {
   width: {$sliderWidth};
   height: {$sliderHeight};
}

.ui-slider .ui-slider-handle {
    width: {$handleWidth};
;    text-decoration:none;
;    text-align:center;
}
</style>
EOT;


if ( $enableRangeSlider == 1 ) {
echo<<<EOT
<script type="text/javascript">

$(document).ready( function(){

   $(".{$sliderDivClass}").each(function( i ) {
    
      var fieldvar = $(this).closest('tr').attr('sq_id');

      var idSelector = '{$prependToIdName}' + fieldvar + '{$appendToIdName}';
            
      var fieldvar_1 = fieldvar + '{$leftMarkerFieldnameSuffix}';
      var fieldvar_2 = fieldvar + '{$rightMarkerFieldnameSuffix}';

      var tmpMinVal1 = $('[name="' + fieldvar_1 + '"]').val();
      var tmpMinVal2 = $('[name="' + fieldvar_2 + '"]').val();

      var minVal = (tmpMinVal1 == '') ? {$presetMinValue} : tmpMinVal1;
      var maxVal = (tmpMinVal2 == '') ? {$presetMaxValue} : tmpMinVal2;

      //$('#'+idSelector).bootstrapSlider({
      $('#'+idSelector).slider({
         id: "myslider",
         classes: { "rangeslider": "testslider" },
         range: true,
         min: ($minValue),
         max: {$maxValue},
         values: [ minVal, maxVal ],
         slide: function( event, ui ) {
            $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
            $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);
         }
      });
   });
});
</script>
EOT;
} //end if: enableRangeSlider

if ( $enableRangeSlider2 == 1 ) {

echo<<<EOT

EOT;

echo<<<EOT

EOT;

 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
} // end if: enableRangeSlider2



















