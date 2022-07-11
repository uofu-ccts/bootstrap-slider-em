<?php

namespace Utah\BootstrapSliderEM;

class BootstrapSliderEM extends \ExternalModules\AbstractExternalModule
{

  protected $styleSheetURL = "";
  protected $jsFileURL = "";

  // variables to store settings
  // this is where slider variables and settings are configured

  protected $configuredVariables = [];

  function __construct()
  {
    parent::__construct(); // run the AbstractExternalModule constructor

    // this will resolve to the URL for the stylesheet, taking into account the version directory etc
    $this->styleSheetURL = $this->getUrl("css/bootstrap-slider.css");

    // this will resolve to the URL for the JS file, taking into account the version directory etc
    $this->jsFileURL = $this->getUrl("js/bootstrap-slider.js");

  } // __construct

  function redcap_survey_page_top($project_id, $record, $instrument)
  {
    $this->bootstrapSliderHook($project_id);
    $this->bootstrapSlider($project_id);
  }

  function redcap_data_entry_form_top($project_id, $record, $instrument)
  {
    $this->bootstrapSliderHook($project_id);
    $this->bootstrapSlider($project_id);
  }

  // this is the function that pulls out the configured variables and 
  // uses that list to construct sliders
  function bootstrapSlider()
  { 
    // access EM project settings and return array of variables set
    $this->configuredVariables = $this->getProjectSettings();

    $sliderDivClass  = 'rangeslider';

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

    //===========================================================

    ?>
    <script>
      // attach the style sheet to this page
      $('head').append("<link rel='stylesheet' type='text/css' href='<?php echo $this->styleSheetURL ?>'>");

      // attach the js file to this page
      $('head').append("<script type='text/javascript' src='<?php echo $this->jsFileURL ?>'>");

      // save configured variables in JS to extract information we want
      const JSconfiguredVariables = <?php echo json_encode($this->configuredVariables) ?>;

      const descriptiveTextLoc = JSconfiguredVariables["descriptive-text-loc"]["value"];
      const leftDataLoc = JSconfiguredVariables["left-data-loc"]["value"];
      const leftDataText = JSconfiguredVariables["left-data-text"]["value"];
      const rightDataLoc = JSconfiguredVariables["right-data-loc"]["value"];
      const rightDataText = JSconfiguredVariables["right-data-text"]["value"];
      
    </script>
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
          background: <?php echo $colorCenter ?>;
      }

      .ui-slider-range-low {
          background: blue;
      }


      .testslider {
        background: purple;
      }

      .rangeslider {
        width: <?php echo $sliderWidth ?>;
        height: <?php echo $sliderHeight ?>;
      }

      .ui-slider .ui-slider-handle {
          width: <?php echo $handleWidth ?>;
          text-decoration: none;
          text-align: center;
      }
              
      .rangeslider {
        background-image: -webkit-linear-gradient(left, red 50%, blue 50%);     
      }
      
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
    <script type="text/javascript">

      $(document).ready( function(){

        // insert required elements into the designated div elements
        console.log(JSconfiguredVariables["descriptive-text-loc"]["value"]);
        console.log(descriptiveTextLoc);
        
        descriptiveTextLoc.forEach(function(fieldvar, index) {
          console.log(fieldvar);
          console.log(leftDataLoc[index]);
          console.log(leftDataText[index]);
          console.log(rightDataLoc[index]);
          console.log(rightDataText[index]);

          const html = `
            <br>
            <br>
            <div class="rangeslider" id="${fieldvar}"></div>
            <br>
            <span class="rangeslider_text_left">${leftDataText[index]}</span>
            <span class="rangeslider_text_right">${rightDataText[index]}</span>
          `

          $(`div[data-mlm-field="${fieldvar}"]`).append(html);

          var fieldvar_1 = leftDataLoc[index];
          var fieldvar_2 = rightDataLoc[index];

          var tmpMinVal1 = $('[name="' + fieldvar_1 + '"]').val();
          var tmpMinVal2 = $('[name="' + fieldvar_2 + '"]').val();

          var minVal = (tmpMinVal1 == '') ? <?php echo $presetMinValue ?> : tmpMinVal1;
          var maxVal = (tmpMinVal2 == '') ? <?php echo $presetMaxValue ?> : tmpMinVal2;

          var myMin = <?php echo $minValue ?>;
          var myMax = <?php echo $maxValue ?>;

          //var leftColor = {$colorLeftside};
          //var rightcolor = {$colorRightside};

          $('#'+fieldvar).slider({
            id: "myslider",
            classes: { "rangeslider": "testslider" },
            range: true,
            min: myMin,
            max: myMax,
            values: [ minVal, maxVal ],

            slide: function( event, ui ) {
              $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
              $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);

              var left = 100 * (ui.values[0] - myMin) / (myMax - myMin);
              var right = 100 * (ui.values[1] - myMin) / (myMax - myMin);
              $(this).css('background-image', '-webkit-linear-gradient(left, red ' + left + '%, blue ' + right + '%)');
            }

          });
        });
      });
    </script>
    <?php
  }

  function bootstrapSliderHook()
  { 
    // access EM project settings and return array of variables set
    $this->configuredVariables = $this->getProjectSettings();

    $sliderDivClass  = 'rangeslider';

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

    //===========================================================

    ?>
    <script>
      // attach the style sheet to this page
      $('head').append("<link rel='stylesheet' type='text/css' href='<?php echo $this->styleSheetURL ?>'>");

      // attach the js file to this page
      $('head').append("<script type='text/javascript' src='<?php echo $this->jsFileURL ?>'>");

      // print to console the configured variables
      console.log(<?php echo json_encode($this->configuredVariables) ?>);
      
    </script>
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
          background: <?php echo $colorCenter ?>;
      }

      .ui-slider-range-low {
          background: blue;
      }


      .testslider {
        background: purple;
      }

      .rangeslider {
        width: <?php echo $sliderWidth ?>;
        height: <?php echo $sliderHeight ?>;
      }

      .ui-slider .ui-slider-handle {
          width: <?php echo $handleWidth ?>;
          text-decoration: none;
          text-align: center;
      }
              
      .rangeslider {
        background-image: -webkit-linear-gradient(left, red 50%, blue 50%);     
      }
      
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
    <script type="text/javascript">

      $(document).ready( function(){

        $(".<?php echo $sliderDivClass ?>").each(function( i ) {

          var fieldvar = $(this).closest('tr').attr('sq_id');

          var fieldvar_1 = fieldvar + '<?php echo $leftMarkerFieldnameSuffix ?>';
          var fieldvar_2 = fieldvar + '<?php echo $rightMarkerFieldnameSuffix ?>';

          var tmpMinVal1 = $('[name="' + fieldvar_1 + '"]').val();
          var tmpMinVal2 = $('[name="' + fieldvar_2 + '"]').val();

          var minVal = (tmpMinVal1 == '') ? <?php echo $presetMinValue ?> : tmpMinVal1;
          var maxVal = (tmpMinVal2 == '') ? <?php echo $presetMaxValue ?> : tmpMinVal2;

          var myMin = <?php echo $minValue ?>;
          var myMax = <?php echo $maxValue ?>;

          //var leftColor = {$colorLeftside};
          //var rightcolor = {$colorRightside};

          $('#'+fieldvar).slider({
            id: "myslider",
            classes: { "rangeslider": "testslider" },
            range: true,
            min: myMin,
            max: myMax,
            values: [ minVal, maxVal ],

            slide: function( event, ui ) {
              $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
              $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);

              var left = 100 * (ui.values[0] - myMin) / (myMax - myMin);
              var right = 100 * (ui.values[1] - myMin) / (myMax - myMin);
              $(this).css('background-image', '-webkit-linear-gradient(left, red ' + left + '%, blue ' + right + '%)');
            }

          });
        });
      });
    </script>
    <?php
  }
}
