/*! =========================================================
 * bootstrap-slider.js
 *
 * Maintainers:
 *		Kyle Kemp
 *			- Twitter: @seiyria
 *			- Github:  seiyria
 *		Rohit Kalkur
 *			- Twitter: @Rovolutionary
 *			- Github:  rovolution
 *
 * =========================================================
 *
 * bootstrap-slider is released under the MIT License
 * Copyright (c) 2016 Kyle Kemp, Rohit Kalkur, and contributors
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * ========================================================= */

.slider {
    display: inline-block;
    vertical-align: middle;
    position: relative;
}
.slider.slider-horizontal {
    width: 210px;
    height: 20px;
}
.slider.slider-horizontal .slider-track {
    height: 10px;
    width: 100%;
    margin-top: -5px;
    top: 50%;
    left: 0;
}
.slider.slider-horizontal .slider-selection,
.slider.slider-horizontal .slider-track-low,
.slider.slider-horizontal .slider-track-high {
    height: 100%;
    top: 0;
    bottom: 0;
}
.slider.slider-horizontal .slider-tick,
.slider.slider-horizontal .slider-handle {
    margin-left: -10px;
}
.slider.slider-horizontal .slider-tick.triangle,
.slider.slider-horizontal .slider-handle.triangle {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    border-width: 0 10px 10px 10px;
    width: 0;
    height: 0;
    border-bottom-color: #0480be;
    margin-top: 0;
}
.slider.slider-horizontal .slider-tick-container {
    white-space: nowrap;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}
.slider.slider-horizontal .slider-tick-label-container {
    white-space: nowrap;
    margin-top: 20px;
}
.slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
    padding-top: 4px;
    display: inline-block;
    text-align: center;
}
.slider.slider-vertical {
    height: 210px;
    width: 20px;
}
.slider.slider-vertical .slider-track {
    width: 10px;
    height: 100%;
    left: 25%;
    top: 0;
}
.slider.slider-vertical .slider-selection {
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
}
.slider.slider-vertical .slider-track-low,
.slider.slider-vertical .slider-track-high {
    width: 100%;
    left: 0;
    right: 0;
}
.slider.slider-vertical .slider-tick,
.slider.slider-vertical .slider-handle {
    margin-top: -10px;
}
.slider.slider-vertical .slider-tick.triangle,
.slider.slider-vertical .slider-handle.triangle {
    border-width: 10px 0 10px 10px;
    width: 1px;
    height: 1px;
    border-left-color: #0480be;
    margin-left: 0;
}
.slider.slider-vertical .slider-tick-label-container {
    white-space: nowrap;
}
.slider.slider-vertical .slider-tick-label-container .slider-tick-label {
    padding-left: 4px;
}
.slider.slider-disabled .slider-handle {
    background-image: -webkit-linear-gradient(top, #dfdfdf 0%, #bebebe 100%);
        background-image: -o-linear-gradient(top, #dfdfdf 0%, #bebebe 100%);
            background-image: linear-gradient(to bottom, #dfdfdf 0%, #bebebe 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffdfdfdf', endColorstr='#ffbebebe', GradientType=0);
}
.slider.slider-disabled .slider-track {
    background-image: -webkit-linear-gradient(top, #e5e5e5 0%, #e9e9e9 100%);
        background-image: -o-linear-gradient(top, #e5e5e5 0%, #e9e9e9 100%);
            background-image: linear-gradient(to bottom, #e5e5e5 0%, #e9e9e9 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffe5e5e5', endColorstr='#ffe9e9e9', GradientType=0);
                cursor: not-allowed;
}
.slider input {
    display: none;
}
.slider .tooltip.top {
    margin-top: -36px;
}
.slider .tooltip-inner {
    white-space: nowrap;
    max-width: none;
}
.slider .hide {
    display: none;
}
.slider-track {
    position: absolute;
    cursor: pointer;
    background-image: -webkit-linear-gradient(top, #f5f5f5 0%, #f9f9f9 100%);
        background-image: -o-linear-gradient(top, #f5f5f5 0%, #f9f9f9 100%);
            background-image: linear-gradient(to bottom, #f5f5f5 0%, #f9f9f9 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
}
.slider-selection {
    position: absolute;
    background-image: -webkit-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
        background-image: -o-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
            background-image: linear-gradient(to bottom, #f9f9f9 0%, #f5f5f5 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff9f9f9', endColorstr='#fff5f5f5', GradientType=0);
                -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border-radius: 4px;
}
.slider-selection.tick-slider-selection {
    background-image: -webkit-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: -o-linear-gradient(top, #89cdef 0%, #81bfde 100%);
            background-image: linear-gradient(to bottom, #89cdef 0%, #81bfde 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff89cdef', endColorstr='#ff81bfde', GradientType=0);
}
.slider-track-low,
.slider-track-high {
    position: absolute;
    background: transparent;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border-radius: 4px;
}
.slider-handle {
    position: absolute;
    top: 0;
    width: 20px;
    height: 20px;
    background-color: #337ab7;
    background-image: -webkit-linear-gradient(top, #149bdf 0%, #0480be 100%);
        background-image: -o-linear-gradient(top, #149bdf 0%, #0480be 100%);
            background-image: linear-gradient(to bottom, #149bdf 0%, #0480be 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff149bdf', endColorstr='#ff0480be', GradientType=0);
                filter: none;
                -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.2), 0 1px 2px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 0 rgba(255,255,255,.2), 0 1px 2px rgba(0,0,0,.05);
                border: 0px solid transparent;
}
.slider-handle.round {
    border-radius: 50%;
}
.slider-handle.triangle {
    background: transparent none;
}
.slider-handle.custom {
    background: transparent none;
}
.slider-handle.custom::before {
    line-height: 20px;
    font-size: 20px;
    content: '\2605';
    color: #726204;
}
.slider-tick {
    position: absolute;
    width: 20px;
    height: 20px;
    background-image: -webkit-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
        background-image: -o-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
            background-image: linear-gradient(to bottom, #f9f9f9 0%, #f5f5f5 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff9f9f9', endColorstr='#fff5f5f5', GradientType=0);
                -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                filter: none;
                opacity: 0.8;
                border: 0px solid transparent;
}
.slider-tick.round {
    border-radius: 50%;
}
.slider-tick.triangle {
    background: transparent none;
}
.slider-tick.custom {
    background: transparent none;
}
.slider-tick.custom::before {
    line-height: 20px;
    font-size: 20px;
    content: '\2605';
    color: #726204;
}
.slider-tick.in-selection {
    background-image: -webkit-linear-gradient(top, #89cdef 0%, #81bfde 100%);
        background-image: -o-linear-gradient(top, #89cdef 0%, #81bfde 100%);
            background-image: linear-gradient(to bottom, #89cdef 0%, #81bfde 100%);
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff89cdef', endColorstr='#ff81bfde', GradientType=0);
                opacity: 1;
}
