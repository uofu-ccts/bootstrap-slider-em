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
    $this->bootstrapSlider($project_id);
  }

  function redcap_data_entry_form_top($project_id, $record, $instrument)
  {
    $this->bootstrapSlider($project_id);
  }

  // this is the function that pulls out the configured variables and 
  // uses that list to construct sliders
  function bootstrapSlider()
  { 
    // access EM project settings and return array of variables set
    $this->configuredVariables = $this->getProjectSettings();

    $sliderHeight = '10px';
    $handleWidth  = '8px';

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
      const leftDataMin = JSconfiguredVariables["left-data-min"]["value"];
      const rightDataLoc = JSconfiguredVariables["right-data-loc"]["value"];
      const rightDataMax = JSconfiguredVariables["right-data-max"]["value"];
      
    </script>
    <style>
      .ui-slider-range {
          background: <?php echo $colorCenter ?>;
      }

      .ui-slider-range-low {
          background: blue;
      }

      .rangeslider {
        /* width: <?php //echo $sliderWidth ?>; */
        height: <?php echo $sliderHeight ?>;
        /* background-image: -webkit-linear-gradient(left, red 50%, blue 50%);  */
      }

      .ui-slider .ui-slider-handle {
          width: <?php echo $handleWidth ?>;
          text-decoration: none;
          text-align: center;
      }
      
      .rangeslider_text_container {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
      }

      .rangeslider_text_left {
        flex: none;
        order: 0;
        color: blue;
      }
      
      .rangeslider_text_right {
        flex: none;
        order: 1;
        color: red;
      }

    </style>
    <script type="text/javascript">

      $(document).ready( function(){
        
        // iterate over configured elements to insert required div elements,
        // then set up the slider element within the inserted div elements
        descriptiveTextLoc.forEach(function(fieldvar, index) {

          var fieldvar_1 = leftDataLoc[index];
          var fieldvar_2 = rightDataLoc[index];

          var leftText = $('[data-mlm-field="' + fieldvar_1 + '"]').text();
          var rightText = $('[data-mlm-field="' + fieldvar_2 + '"]').text();

          const html = `
            <br>
            <br>
            <div class="rangeslider" id="${fieldvar}"></div>
            <br>
            <div class="rangeslider_text_container">
              <div class="rangeslider_text_left">${leftText}</div>
              <div class="rangeslider_text_right">${rightText}</div>
            </div>
          `

          $(`div[data-mlm-field="${fieldvar}"]`).append(html);

          var minValue = (leftDataMin[index] == 0) ? 0 : leftDataMin[index];
          var maxValue = (rightDataMax[index] == 0) ? 100 : rightDataMax[index];

          var presetMin = Math.floor(maxValue * 0.1);
          var presetMax = Math.floor(maxValue * 0.9);

          var tmpVal1 = $('[name="' + fieldvar_1 + '"]').val();
          var tmpVal2 = $('[name="' + fieldvar_2 + '"]').val();

          var minSelected = (tmpVal1 == '') ? presetMin : tmpVal1;
          var maxSelected = (tmpVal2 == '') ? presetMax : tmpVal2;

          var leftStart = 100 * (minSelected - minValue) / (maxValue - minValue);
          var rightStart = 100 * (maxSelected - minValue) / (maxValue - minValue);
          $('#'+fieldvar).css('background-image', '-webkit-linear-gradient(left, blue ' + leftStart + '%, red ' + rightStart + '%)');

          $('#'+fieldvar).slider({
            id: "myslider",
            classes: { "rangeslider": "testslider" },
            range: true,
            min: minValue,
            max: maxValue,
            values: [ minSelected, maxSelected ],

            slide: function( event, ui ) {
              $('[name="' + fieldvar_1 + '"]').val(ui.values[0]);
              $('[name="' + fieldvar_2 + '"]').val(ui.values[1]);

              var left = 100 * (ui.values[0] - minValue) / (maxValue - minValue);
              var right = 100 * (ui.values[1] - minValue) / (maxValue - minValue);
              $(this).css('background-image', '-webkit-linear-gradient(left, blue ' + left + '%, red ' + right + '%)');
            }

          });
        });
      });
    </script>
    <?php
  }
}
