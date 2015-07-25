// resize homepage video on load and resize
(function() {

  var ratios = {
    vimeo: 9 / 16
  };

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
    var ratio = 1;
    if (src.indexOf("vimeo.com") > -1) ratio = ratios.vimeo;
    var height = (width * ratio);
    console.log(embed, width, height);
    embed.setAttribute("height", height);
  }

  function forEach(array, callback, scope) {
    for (var i = 0; i < array.length; i++) {
      callback.call(scope, array[i], i); // passes back stuff we need
    }
  }

})();