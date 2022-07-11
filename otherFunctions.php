<?php

function bootstrapSlider()
  {
    ?>
    <script>
      // attach the style sheet to this page
      console.log(`attaching stylesheet from <?php echo $this->styleSheetURL ?>`)
      $('head').append("<link rel='stylesheet' type='text/css' href='<?php echo $this->styleSheetURL ?>'>");

      // attach the js file to this page
      console.log(`attaching JS file from <?php echo $this->jsFileURL ?>`)
      $('head').append("<script type='text/javascript' src='<?php echo $this->jsFileURL ?>'>");

      // jQuery doc load callback function
      $(document).ready(function() {
        // add div where bootstrapSlider will reside
        console.log(`creating bootstrapSlider div`)
        $('#slider_descriptive-tr').after("<div id='bootstrapSlider'></div>");

        console.log(`creating p tag`)
        $('#bootstrapSlider').load("<p>this is here as a test</p>");
      });
    </script>
    <?php

  } // bootstrapSlider

