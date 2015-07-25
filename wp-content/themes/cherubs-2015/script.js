// resize homepage video on load and resize
(function() {

  document.addEventListener("DOMContentLoaded", function(event) {
    resizeAllEmbeds();
    window.addEventListener("resize", resizeAllEmbeds);
  });

  function resizeAllEmbeds() {
    var embeds = document.querySelectorAll(".homepage-video iframe, .single-post iframe");
    forEach(embeds, resizeEmbed);
  }

  function resizeEmbed(embed) {
    var width = embed.getBoundingClientRect().width;
    var src = embed.src;
    var height = embed.getBoundingClientRect().height;
    if (src.indexOf("vimeo.com") > -1) height = width * 9 / 16;
    else if (src.indexOf("soundcloud.com") > -1) height = 250;
    embed.setAttribute("height", height);
  }

  function forEach(array, callback, scope) {
    for (var i = 0; i < array.length; i++) {
      callback.call(scope, array[i], i); // passes back stuff we need
    }
  }

})();