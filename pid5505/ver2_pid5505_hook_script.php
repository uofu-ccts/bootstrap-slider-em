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
 *    https://medium.com/@radekqwerty/styling-html-range-input-and-jquery-ui-angular-ui-slider-with-range-css-26568bd33910
 *    http://danielstern.ca/range.css/#/
 *    https://www.webcodegeeks.com/javascript/jquery/jquery-ui-slider-example/
 *    http://www.jqueryrain.com/demo/jquery-range-slider/
 *    http://www.jqueryrain.com/?OOpWqwuU
 *    http://www.jqueryrain.com/?jpubA5it
 *  * http://stackoverflow.com/questions/27235057/jquery-ui-slider-range-styling-left-and-right-as-well
 *  * http://stackoverflow.com/questions/9336846/css3-gradients-by-pixel-instead-of-percentage
 */




//if ( array_key_exists( $_POST))


$enableRangeSlider  = 1;
$enableRangeSlider2 = 1;

$sliderDivClass  = 'rangeslider';
$prependToIdName = '';
$appendToIdName  = '';

//redcap_info();

$sliderWidth  = '600px';
$sliderHeight = '10px';
$handleWidth  = '8px';

$leftMarkerFieldnameSuffix = '_1';
$rightMarkerFieldnameSuffix = '_2';

$minValue = 0;
$maxValue = 100;

$pxPerUnit = $sliderWidth / $maxValue;

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
    background: orange;
;    text-decoration:none;
;    text-align:center;
}

.ui-slider-range-min {
   background: red;     
}

;.ui-widget-overlay {
;   background: red;
;}
   

        
;.ui-slider-handle {
; box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d !important;
; border: 0px solid #000000 !important;
; height: 50px !important;
; width: 50px !important;
; border-radius: 50px;
; background: #ffffff !important;
; cursor: pointer;
; -webkit-appearance: none;
; margin-top: -21px;
;}
        
        
.ui-slider-horizontal {
 width: 400px;
 height: 2.4px;
 cursor: pointer;
 box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
 background: red;
 border-radius: 25px;
 border: 0.01px solid #010101;
}

        
        
;   .ui-slider-horizontal {
;        background: aqua;
;        }
        
        
;.ui-slider {
;   background-image: -webkit-linear-gradient(left, blue 50%, red 50%);     
;}        
        
        
        
        
        
        
        
        
        
;.ui-slider { position: relative; text-align: left; }
;.ui-slider .ui-slider-handle { position: absolute; z-index: 2; width: 1.2em; height: 1.2em; cursor: default; }
;.ui-slider .ui-slider-range { position: absolute; z-index: 1; font-size: .7em; display: block; border: 0; background-position: 0 0; }

.ui-slider-horizontal { height: .8em; }
.ui-slider-horizontal .ui-slider-handle { top: -.3em; margin-left: -.6em; }
.ui-slider-horizontal .ui-slider-range { top: 0; height: 100%; }
.ui-slider-horizontal .ui-slider-range-min { left: 0; }
.ui-slider-horizontal .ui-slider-range-max { right: 0; background: blue; }

        
 
        
        
        
        
        
input[type=range] {
  -webkit-appearance: none;
  width: 100%;
  margin: 13.8px 0;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 8px 8px 13.4px rgba(112, 180, 56, 0.48), 0px 0px 8px rgba(124, 196, 65, 0.48);
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #72a8d7;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 8px 8px 13.4px rgba(112, 180, 56, 0.48), 0px 0px 8px rgba(124, 196, 65, 0.48);
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #173752;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 8px 8px 13.4px rgba(112, 180, 56, 0.48), 0px 0px 8px rgba(124, 196, 65, 0.48);
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  height: 8.4px;
}
input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;
}
input[type=range]:focus::-ms-fill-upper {
  background: #72a8d7;
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

      
      
      var leftSection;
      var middleSection;
      var rightSection;
      
      
      
      
      //$('#'+idSelector).bootstrapSlider({
      $('#'+idSelector).slider({
        // id: "slider12c",
        // classes: { "rangeslider": "testslider" },
         range: true,
         step: 1,
         min: ($minValue),
         max: {$maxValue},
         values: [ minVal, maxVal ],
         create: function( event, ui ) {
            $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
            $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);
            
         leftSection   = ({$pxPerUnit} * ui.values[0]);
         middleSection = ({$pxPerUnit} * ( ui.values[1] - ui.values[0] ));
         rightSection  = ({$pxPerUnit} * ( {$maxValue} - ui.values[1] ));
         },
         slide: function( event, ui ) {
            $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
            $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);
            
         leftSection   = ({$pxPerUnit} * ui.values[0]);
         middleSection = ({$pxPerUnit} * ( ui.values[1] - ui.values[0] ));
         rightSection  = ({$pxPerUnit} * ( {$maxValue} - ui.values[1] ));
         }
         
         
         
         
         
         
         
               });    

//       // Update left/right color
  //       var leftSection   = {$pxPerUnit} * ui.values[0];
  //       var middleSection = {$pxPerUnit} * ( maxVal - minVal );
  //       var rightSection  = {$pxPerUnit} * ( {$maxValue} - maxVal );
      
             
           
   //    $('#'+idSelector).css('background-image', '-webkit-linear-gradient(left, blue 50%, red 50%)');
  
 //  alert( rightSection );
    
//   $('#'+idSelector).css('background-image',
  //    '-webkit-linear-gradient(left, blue ' + leftSection + 'px, orange ' + middleSection + 'px, red ' + rightSection + 'px)');    
         
             
             
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



















