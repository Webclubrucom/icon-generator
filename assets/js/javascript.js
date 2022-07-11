(function() {

   window.createElement = function(tag, attributes, value) {
      var element       = document.createElement(tag);
      element.innerText = value || '';
      for ( var i = 0; attributes && i < attributes.length; i += 2 ) {
         element.setAttribute(attributes[i], attributes[i + 1]);
      }
      return element;
   };

   window.appendChildren = function(element, children) {
      for ( var i = 0; i < children.length; i++ ) {
         element.appendChild(children[i]);
      }
      return element;
   };

   window.removeChildren = function(element) {
      while ( element.firstChild ) {
         element.removeChild(element.firstChild);
      }
   };

   window.findElementBy = function(elements, attribute, value) {
      for ( var i = 0; i < elements.length; i++ ) {
         if ( elements[i].getAttribute(attribute) == value ) {
            return elements[i];
            break;
         }
      }
   };

   window.getElementLabels = function(elements) {
      for ( var i = 0, labels = {}; i < elements.length; i++ ) {
         labels[elements[i].id] = window.findElementBy(document.getElementsByTagName('label'), 'for', elements[i].id);
      }
      return labels;
   };

   window.getElementValues = function(elements) {
      for ( var i = 0, values = {}; i < elements.length; i++ ) {
         values[elements[i].id] = {};
         switch ( elements[i].tagName.toLowerCase() ) {
            case 'select':
               values[elements[i].id].index = elements[i].selectedIndex;
               values[elements[i].id].value = elements[i].options[elements[i].selectedIndex].value;
            break;
            case 'input':
               values[elements[i].id].value = elements[i].value;
            break;
         }
      }
      return values;
   };

   window.sortBy = function(array, by, descending) {
      return array.sort(function(a, b) {
         var c = (descending ? [b, a] : [a, b]);
         switch ( typeof c['0'][by] ) {
            case 'string':
               return (c['0'][by] < c['1'][by] ? -1 : c['0'][by] > c['1'][by] ? 1 : 0);
            break;
            case 'number':
               return (c['0'][by] - c['1'][by]);
            break;
         }
      });
   };

   window.iconRenderer = function() {
      var self     = this;
      self.canvas  = false;
      self.context = false;
      self.setCanvas = function(canvas) {
         self.canvas  = canvas;
         self.context = canvas.getContext('2d');
      };
      self.clearCanvas = function() {
         self.context.clearRect(0, 0, self.canvas.width, self.canvas.height);
      };
      self.circle = function(x, y, radius, startAngle, endAngle) {
         self.context.arc(x, y, radius, startAngle, endAngle);
      };
      self.rectangle = function(x, y, width, height) {
         self.context.rect(x, y, width, height);
      };
      self.polygon = function(x, y, radius, sides, angle) {
         self.context.moveTo(x - (radius * Math.sin(angle)), y - (radius * Math.cos(angle)));
         for ( var i = 1, delta = Math.PI * 2 / sides; i < sides; i++ ) {
            angle += delta;
            self.context.lineTo(x - (radius * Math.sin(angle)), y - (radius * Math.cos(angle)));
         }
      };
      self.shape = function(shape, args, beginPath, closePath) {
         (beginPath && self.context.beginPath());
         self[shape].apply(self, args);
         (closePath && self.context.closePath());
      };
      self.style = function(args, save, restore) {
         (save && self.context.save());
         for ( var i = 0; i < args.length; i++ ) {
            switch ( args[i] ) {
               case 'alpha':
                  self.context.globalAlpha = args[i + 1];
                  i += 1;
               break;
               case 'clip':
                  self.context.clip();
               break;
               case 'fill':
                  self.context.fillStyle = args[i + 1];
                  self.context.fill();
                  i += 1;
               break;
               case 'font':
                  self.context.font = args[i + 1];
                  i += 1;
               break;
               case 'text':
                  self.context.textBaseline = 'middle';
                  self.context.textAlign    = 'center';
                  self.context.lineJoin     = 'round';
                  self.context.lineCap      = 'round';
                  self.context.fillStyle    = args[i + 1];
                  self.context.fillText(args[i + 2], args[i + 3], args[i + 4]);
                  i += 4;
               break;
               case 'stroke':
                  self.context.lineWidth   = args[i + 1];
                  self.context.strokeStyle = args[i + 2];
                  self.context.stroke();
                  i += 2;
               break;
               case 'image':
                  self.context.drawImage(args[i + 1], args[i + 2], args[i + 3]);
                  i += 3;
               break;
            }
         }
         (restore && self.context.restore());
      };
   };

   window.iconGenerator = function(canvas, font, icon, backgroundShape, backgroundDimensions, backgroundOpacity, backgroundColor, iconSize, iconOpacity, iconColor, shadowDepth, shadowAngle, shadowOpacity, shadowColor, borderSize, borderOpacity, borderColor) {
      var self                  = this;
      self.renderer             = new window.iconRenderer();
      self.temporary            = window.createElement('canvas');
      self.canvas               = canvas;
      self.font                 = font;
      self.icon                 = icon;
      self.backgroundShape      = backgroundShape;
      self.backgroundDimensions = backgroundDimensions;
      self.backgroundOpacity    = backgroundOpacity;
      self.backgroundColor      = backgroundColor;
      self.iconSize             = iconSize;
      self.iconOpacity          = iconOpacity;
      self.iconColor            = iconColor;
      self.shadowDepth          = shadowDepth;
      self.shadowAngle          = shadowAngle;
      self.shadowOpacity        = shadowOpacity;
      self.shadowColor          = shadowColor;
      self.borderSize           = borderSize;
      self.borderOpacity        = borderOpacity;
      self.borderColor          = borderColor;
      self.updateSettings = function(settings) {
         for ( var i = 0; i < settings.length; i += 2 ) {
            self[settings[i]] = settings[i + 1];
         }
         self.draw();
      };
      self.drawBackground = function(scale) {
         var dimensions = self.backgroundDimensions * scale;
         var center     = dimensions / 2;
         switch ( self.backgroundShape ) {
            case 'circle':
               self.renderer.shape('circle', [center, center, center, 0, Math.PI * 2], true, true);
            break;
            case 'square':
               self.renderer.shape('rectangle', [0, 0, dimensions, dimensions], true, true);
            break;
            case 'diamond':
               self.renderer.shape('polygon', [center, center, center, 4, 0], true, true);
            break;
            case 'hexagon':
               self.renderer.shape('polygon', [center, center, center, 6, 0], true, true);
            break;
            case 'octagon':
               self.renderer.shape('polygon', [center, center, center, 8, 0], true, true);
            break;
            case 'decagon':
               self.renderer.shape('polygon', [center, center, center, 10, 0], true, true);
            break;
         }
         self.renderer.style(['alpha', self.backgroundOpacity, 'fill', self.backgroundColor], true, true);
      };
      self.drawShadow = function(scale) {
         var dimensions        = self.backgroundDimensions * scale;
         var fontSize          = dimensions / 100 * self.iconSize;
         var depth             = (dimensions - fontSize) / 80 * self.shadowDepth;
         var cos               = Math.cos((Math.PI / 180) * self.shadowAngle);
         var sin               = Math.sin((Math.PI / 180) * self.shadowAngle);
         var center            = dimensions / 2;
         var previous          = self.renderer.canvas;
         self.temporary.width  = dimensions;
         self.temporary.height = dimensions;
         self.renderer.setCanvas(self.temporary);
         self.renderer.clearCanvas();
         for ( var i = 0; i < depth; i++ ) {
            self.renderer.style(['font', fontSize + 'px ' + self.font, 'text', self.shadowColor, self.icon, cos * i + center, sin * i + center], true, true);
         }
         self.renderer.setCanvas(previous);
         self.renderer.style(['clip', 'alpha', self.shadowOpacity, 'image', self.temporary, 0, 0], true, true);
      };
      self.drawIcon = function(scale) {
         var dimensions = self.backgroundDimensions * scale;
         var fontSize   = dimensions / 100 * self.iconSize;
         var center     = dimensions / 2;
         self.renderer.style(['clip', 'alpha', self.iconOpacity, 'font', fontSize + 'px ' + self.font, 'text', self.iconColor, self.icon, center, center], true, true);
      };
      self.drawBorder = function(scale) {
         var dimensions = (self.backgroundDimensions * scale);
         var borderSize = ((dimensions / 100) * self.borderSize) / 2;
         var center     = dimensions / 2;
         self.renderer.style(['clip'], true, false);
         switch ( self.backgroundShape ) {
            case 'circle':
               self.renderer.shape('circle', [center, center, center - (borderSize / 2), 0, Math.PI * 2], true, true);
            break;
            case 'square':
               self.renderer.shape('rectangle', [borderSize / 2, borderSize / 2, dimensions - borderSize, dimensions - borderSize], true, true);
            break;
            case 'diamond':
               self.renderer.shape('polygon', [center, center, center - (borderSize / 2), 4, 0], true, true);
            break;
            case 'hexagon':
               self.renderer.shape('polygon', [center, center, center - (borderSize / 2), 6, 0], true, true);
            break;
            case 'octagon':
               self.renderer.shape('polygon', [center, center, center - (borderSize / 2), 8, 0], true, true);
            break;
            case 'decagon':
               self.renderer.shape('polygon', [center, center, center - (borderSize / 2), 10, 0], true, true);
            break;
         }
         self.renderer.style(['alpha', self.borderOpacity, 'stroke', borderSize, self.borderColor], false, true);
      };
      self.draw = function() {
         var scale = self.canvas.width / self.backgroundDimensions;
         self.renderer.setCanvas(self.canvas);
         self.renderer.clearCanvas();
         self.drawBackground(scale);
         self.drawShadow(scale);
         self.drawIcon(scale);
         self.drawBorder(scale);
      };
   };


})();

(function() {
  'use strict';

  function trackScroll() {
    var scrolled = window.pageYOffset;
    var coords = document.documentElement.clientHeight;

    if (scrolled > coords) {
      goTopBtn.classList.add('back_to_top-show');
    }
    if (scrolled < coords) {
      goTopBtn.classList.remove('back_to_top-show');
    }
  }

  function backToTop() {
    if (window.pageYOffset > 0) {
      window.scrollBy(0, -80);
      setTimeout(backToTop, 0);
    }
  }

  var goTopBtn = document.querySelector('.back_to_top');

  window.addEventListener('scroll', trackScroll);
  goTopBtn.addEventListener('click', backToTop);
})();