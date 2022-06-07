<?php
namespace Utah\BootstrapSliderEM;

class BootstrapSliderEM extends \ExternalModules\AbstractExternalModule {

  function redcap_survey_page_top($project_id, $record, $instrument)
  {
    $this->bootstrapSlider();
  }

  function redcap_data_entry_form_top($project_id, $record, $instrument)
  {
    $this->bootstrapSlider();
  }

  function bootstrapSlider()
  {
    /*
    * adapted from filename: pid5505_hook_script.php
    */

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
    * ** http://stackoverflow.com/questions/27235057/jquery-ui-slider-range-styling-left-and-right-as-well   ( http://jsfiddle.net/lebolo/86js5pp6/ )
    */

        $enableRangeSlider  = 1;

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

        $colorCenter    = 'yellow';

        $thisHookCssFile1 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/css/bootstrap.min.css';
        $thisHookCssFile2 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/css/bootstrap-slider.css';

        $bootstrapFile1 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/lib/bootstrap-slider.min.js';
        $bootstrapFile2 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/lib/bootstrap-slider.js';
        $bootstrapFile3 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/lib/bootstrap-slider.min.css';
        $bootstrapFile4 = APP_PATH_WEBROOT_FULL . 'hooks/pid5505/lib/bootstrap-slider.css';

        //==================================================================================
        //                        No edits needed below this point.
        //==================================================================================

        // echo<<<EOT
        // <link rel="stylesheet" type="text/css" media="all" href="{$thisHookCssFile2}">
        // EOT;

        echo <<<EOT
        <script type="text/javascript" src="{$bootstrapFile1}"></script>
        <script type="text/javascript" src="{$bootstrapFile2}"></script>
        <link rel="stylesheet" type="text/css" media="all" href="{$bootstrapFile3}">
        <link rel="stylesheet" type="text/css" media="all" href="{$bootstrapFile4}">
        EOT;

        echo <<<EOT
    <style>
    #slider12a .slider-track-high, #slider12c .slider-track-high {
      background: green;
    }

    #slider12b .slider-track-low, #slider12c .slider-track-low {
      background: red;
    }

    .slider-selection {
      background: yellow;
    }

    .ui-slider-range {
        background: {$colorCenter};
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
            
    .rangeslider {
      background-image: -webkit-linear-gradient(left, red 50%, blue 50%);     
    }
          
    </style>
    EOT;

        echo <<<EOT
    <style>
    .rangeslider_text_left {
      color: red;
      position: relative;
      right: 30px;
    }
    .rangeslider_text_right {
      color: blue;
      position: relative;
      left: 280px;
    }    
    </style>
    EOT;


        if ($enableRangeSlider == 1) {
          echo <<<EOT
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

          var myMin = ($minValue);
          var myMax = {$maxValue};
          
          //var leftColor  = {$colorLeftside};
          //var rightcolor = {$colorRightside};
          
          //$('#'+idSelector).bootstrapSlider({
          $('#'+idSelector).slider({
            id: "myslider",
            classes: { "rangeslider": "testslider" },
            range: true,
            min: myMin,
            max: myMax,
            values: [ minVal, maxVal ],
            
            slide: function( event, ui ) {
                $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
                $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);
                
                var left  = 100 * (ui.values[0] - myMin) / (myMax - myMin);
                var right = 100 * (ui.values[1] - myMin) / (myMax - myMin);
                $(this).css('background-image', '-webkit-linear-gradient(left, red ' + left + '%, blue ' + right + '%)');
            } 
              
          });
      });
    });
    </script>
    EOT;
        } //end if: enableRangeSlider
  }
}