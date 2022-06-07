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
    
  }
}