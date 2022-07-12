# Bootstrap Slider

## Introduction

This REDCap external module provides a packaged way to render [`bootstrap-slider`](https://github.com/seiyria/bootstrap-slider) within REDCap data entry forms and surveys.

The current version only renders [the third slider from Example 12](https://seiyria.com/bootstrap-slider/#example-12), with hardcoded colors, slider sizes, and slider values.

Colors on the slider are in this order: red, yellow, and blue.

The slider can store two values, ranging between 0 and 100,

## How to use

In order to render a slider, a data entry form or survey must have three fields:
1. a descriptive text field, for the slider to be rendered
2. a text field, to store the low value
3. another text field, to store the high value

Once these fields exists, they must be selected within the external module project configuration page for the sliders to be rendered.

Here is what a configuration should look like:
1. Location of Slider
  1. Descriptive text field to place slider: field 1 from above
  1. Left (low value) data point for this slider: field 2 from above
  1. Text to show on left (low value) side of slider: any text
  1. Right (high value) data point for this slider: field 3 from above
  1. Text to show on right (high value) side of slider: any text


## Changelog

**2022/07/12**: 1st working version
