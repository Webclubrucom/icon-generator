/*
   Script Made By ThemeFairy, 2017 @https://goo.gl/D2U1nT
*/
(function() {


   /*
      ELEMENTS & VARIABLES
   */
   var mainCanvas           = null;
   var downloadForm         = null;
   var previewCanvas        = document.getElementById('ig-preview-canvas');
   var resetButton          = document.getElementById('ig-reset-button');
   var downloadButton       = document.getElementById('ig-download-button');
   var backgroundSettings   = document.getElementById('ig-background-settings');
   var iconSettings         = document.getElementById('ig-icon-settings');
   var shadowSettings       = document.getElementById('ig-shadow-settings');
   var borderSettings       = document.getElementById('ig-border-settings');
   var backgroundShape      = document.getElementById('ig-background-shape');
   var backgroundDimensions = document.getElementById('ig-background-dimensions');
   var backgroundOpacity    = document.getElementById('ig-background-opacity');
   var backgroundColor      = document.getElementById('ig-background-color');
   var iconSize             = document.getElementById('ig-icon-size');
   var iconOpacity          = document.getElementById('ig-icon-opacity');
   var iconColor            = document.getElementById('ig-icon-color');
   var shadowDepth          = document.getElementById('ig-shadow-depth');
   var shadowAngle          = document.getElementById('ig-shadow-angle');
   var shadowOpacity        = document.getElementById('ig-shadow-opacity');
   var shadowColor          = document.getElementById('ig-shadow-color');
   var borderSize           = document.getElementById('ig-border-size');
   var borderOpacity        = document.getElementById('ig-border-opacity');
   var borderColor          = document.getElementById('ig-border-color');
   var iconData             = JSON.parse(document.getElementById('ig-icon-data').innerText);
   var labels               = window.getElementLabels([backgroundShape, backgroundDimensions, backgroundOpacity, backgroundColor, iconSize, iconOpacity, iconColor, shadowDepth, shadowAngle, shadowOpacity, shadowColor, borderSize, borderOpacity, borderColor]);
   var values               = window.getElementValues([backgroundShape, backgroundDimensions, backgroundOpacity, backgroundColor, iconSize, iconOpacity, iconColor, shadowDepth, shadowAngle, shadowOpacity, shadowColor, borderSize, borderOpacity, borderColor]);
   var generator            = new window.iconGenerator(previewCanvas, 'FontAwesome', iconData.icon, values[backgroundShape.id].value, values[backgroundDimensions.id].value, values[backgroundOpacity.id].value, values[backgroundColor.id].value, values[iconSize.id].value, values[iconOpacity.id].value, values[iconColor.id].value, values[shadowDepth.id].value, values[shadowAngle.id].value, values[shadowOpacity.id].value, values[shadowColor.id].value, values[borderSize.id].value, values[borderOpacity.id].value, values[borderColor.id].value);


   /*
      EVENTS
   */
   window.onload = window.onresize = function() {
      previewCanvas.width  = previewCanvas.offsetWidth;
      previewCanvas.height = previewCanvas.offsetWidth;
      generator.draw();
   };

   backgroundSettings.onclick = iconSettings.onclick = shadowSettings.onclick = borderSettings.onclick = function() {
      if ( this.parentNode.className !== 'active' ) {
         backgroundSettings.parentNode.className = (this == backgroundSettings ? 'active' : '');
         iconSettings.parentNode.className       = (this == iconSettings       ? 'active' : '');
         shadowSettings.parentNode.className     = (this == shadowSettings     ? 'active' : '');
         borderSettings.parentNode.className     = (this == borderSettings     ? 'active' : '');
      }
      else {
         this.parentNode.removeAttribute('class');
      }
   };

   backgroundShape.onchange = function() {
      labels[this.id].setAttribute('data-value', this.options[this.selectedIndex].innerText);
      generator.updateSettings(['backgroundShape', this.options[this.selectedIndex].value]);
   };

   backgroundDimensions.oninput = backgroundDimensions.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value + 'px');
      generator.updateSettings(['backgroundDimensions', this.value]);
   };

   backgroundOpacity.oninput = backgroundOpacity.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['backgroundOpacity', this.value]);
   };

   backgroundColor.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['backgroundColor', this.value]);
   };

   iconSize.oninput = iconSize.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value + '%');
      generator.updateSettings(['iconSize', this.value]);
   };

   iconOpacity.oninput = iconOpacity.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['iconOpacity', this.value]);
   };

   iconColor.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['iconColor', this.value]);
   };

   shadowDepth.oninput = shadowDepth.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value + '%');
      generator.updateSettings(['shadowDepth', this.value]);
   };

   shadowAngle.oninput = shadowAngle.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value + '°');
      generator.updateSettings(['shadowAngle', this.value]);
   };

   shadowOpacity.oninput = shadowOpacity.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['shadowOpacity', this.value]);
   };

   shadowColor.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['shadowColor', this.value]);
   };

   borderSize.oninput = borderSize.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value + '%');
      generator.updateSettings(['borderSize', this.value]);
   };

   borderOpacity.oninput = borderOpacity.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['borderOpacity', this.value]);
   };

   borderColor.onchange = function() {
      labels[this.id].setAttribute('data-value', this.value);
      generator.updateSettings(['borderColor', this.value]);
   };

   resetButton.onclick = function() {
      backgroundShape.selectedIndex = values[backgroundShape.id].index;
      backgroundDimensions.value    = values[backgroundDimensions.id].value;
      backgroundOpacity.value       = values[backgroundOpacity.id].value;
      backgroundColor.value         = values[backgroundColor.id].value;
      iconSize.value                = values[iconSize.id].value;
      iconOpacity.value             = values[iconOpacity.id].value;
      iconColor.value               = values[iconColor.id].value;
      shadowDepth.value             = values[shadowDepth.id].value;
      shadowAngle.value             = values[shadowAngle.id].value;
      shadowOpacity.value           = values[shadowOpacity.id].value;
      shadowColor.value             = values[shadowColor.id].value;
      borderSize.value              = values[borderSize.id].value;
      borderOpacity.value           = values[borderOpacity.id].value;
      borderColor.value             = values[borderColor.id].value;
      backgroundShape.onchange();
      backgroundDimensions.onchange();
      backgroundOpacity.onchange();
      backgroundColor.onchange();
      iconSize.onchange();
      iconOpacity.onchange();
      iconColor.onchange();
      shadowDepth.onchange();
      shadowAngle.onchange();
      shadowOpacity.onchange();
      shadowColor.onchange();
      borderSize.onchange();
      borderOpacity.onchange();
      borderColor.onchange();
   };

   downloadButton.onclick = function() {
      if ( !mainCanvas || !downloadForm ) {
         mainCanvas   = window.createElement('canvas');
         downloadForm = window.appendChildren(window.createElement('form', ['method', 'POST', 'action', iconData.url + '/download', 'style', 'display: none']), [
            window.createElement('input',  ['type', 'text', 'name', 'data', 'value', '']),
            window.createElement('button', ['type', 'submit'])
         ]);
         document.body.appendChild(downloadForm);
      }
      mainCanvas.width  = backgroundDimensions.value;
      mainCanvas.height = backgroundDimensions.value;
      generator.updateSettings(['canvas', mainCanvas]);
      downloadForm.children['0'].value = mainCanvas.toDataURL('image/png').split('base64,')['1'];
      downloadForm.submit();
      generator.updateSettings(['canvas', previewCanvas]);
   };


})();