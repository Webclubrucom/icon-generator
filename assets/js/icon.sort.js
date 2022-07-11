/*
   Script Made By ThemeFairy, 2017 @https://goo.gl/D2U1nT
*/
(function() {


   /*
      ELEMENTS & VARIABLES
   */
   var sortByTerm        = document.getElementById('ig-sort-by-term');
   var sortByNames       = document.getElementById('ig-sort-by-names');
   var sortByViews       = document.getElementById('ig-sort-by-views');
   var sortByDownloads   = document.getElementById('ig-sort-by-downloads');
   var sortByPopular     = document.getElementById('ig-sort-by-popular');
   var iconsParent       = document.getElementById('ig-icons-parent');
   var iconDataAttribute = 'data-json';
   var icons             = [];


   /*
      FUNCTIONS
   */
   var getIconData = function() {
      for ( var i = 0, elements = iconsParent.children, data = false; i < elements.length; i++ ) {
         data         = JSON.parse(elements[i].getAttribute(iconDataAttribute));
         data.element = elements[i];
         data.element.removeAttribute(iconDataAttribute);
         icons.push(data);
      }
   };

   var searchByTerm = function(term) {
      for ( var i = 0, icon = false, results = []; i < icons.length; i++ ) {
         icon       = icons[i];
         icon.index = icon.name.indexOf(term.toLowerCase());
         if ( icon.index >= 0 ) {
            results.push(icon);
         }
      }
      return results;
   };

   var appendIconElements = function(icons) {
      for ( var i = 0, elements = []; i < icons.length; i++ ) {
         elements.push(icons[i].element);
      }
      window.removeChildren(iconsParent);
      window.appendChildren(iconsParent, elements);
   };


   /*
      EVENTS
      notes: oninput event doesn't fire in IE so use onchange event as fallback.
   */
   window.onload = function() {
      getIconData();
   };

   sortByTerm.oninput = sortByTerm.onchange = function() {
      appendIconElements(window.sortBy(searchByTerm(this.value), 'index'));
   };

   sortByNames.onclick = function() {
      appendIconElements(window.sortBy(icons, 'name'));
   };

   sortByViews.onclick = function() {
      appendIconElements(window.sortBy(icons, 'views', true));
   };

   sortByDownloads.onclick = function() {
      appendIconElements(window.sortBy(icons, 'downloads', true));
   };

   sortByPopular.onclick = function() {
      appendIconElements(window.sortBy(icons, 'total', true));
   };


})();