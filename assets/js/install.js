(function() {

   var main     = document.getElementById('main');
   var selects  = main.getElementsByTagName('select');
   var inputs   = main.getElementsByTagName('input');
   var button1  = document.getElementById('rating-button');
   var button2  = document.getElementById('follow-button');
   var button3  = document.getElementById('install-button');
   var messages = document.getElementById('install-messages');
   var post     = [];

   var httpRequest = function(method, url, headers, post, callback) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
         (this.readyState == 4 && callback(this.responseText));
      };
      request.open(method, url, true);
      for ( var i = 0; i < headers.length; i += 2 ) {
         request.setRequestHeader(headers[i], headers[i + 1]);
      }
      request.send(post);
   };

   var install = function(post) {
      httpRequest('POST', window.location.href, ['content-type', 'application/x-www-form-urlencoded'], post, function(data) {
         data = JSON.parse(data);
         for ( var i = 0, elements = []; i < data.messages.length; i++ ) {
            elements.push(window.createElement('p', ['class', data.status], data.messages[i]));
         }
         button3.disabled       = false;
         messages.style.display = 'block';
         window.removeChildren(messages);
         window.appendChildren(messages, elements);
         if ( data.status == 'success' ) {
            window.setTimeout(function() {
               window.location.href = window.location.href + '/../';
            }, 10000);
         }
      });
   };

   button1.onclick = function() {
      window.open('https://vk.me/webcreature', '_blank');
   };

   button2.onclick = function() {
      window.open('https://vk.com/webcreature', '_blank');
   };

   button3.onclick = function() {
      button3.disabled = true;
      post             = [];
      for ( var i = 0; i < selects.length; i++ ) {
         post.push(selects[i].id + '=' + selects[i].options[selects[i].selectedIndex].value);
      }
      for ( var i = 0; i < inputs.length; i++ ) {
         post.push(inputs[i].id + '=' + inputs[i].value);
      }
      install(post.join('&'));
   };

})();