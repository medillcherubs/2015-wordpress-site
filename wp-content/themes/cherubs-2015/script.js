// resize homepage video on load and resize
(function() {
  document.addEventListener("DOMContentLoaded", function(event) {
    var embed = document.querySelector(".homepage-video iframe");
    if (!embed) return;
    resize();
    function resize() {
      var width = embed.getBoundingClientRect().width;
      var height = (width * 9 / 16);
      embed.setAttribute("height", height);
      console.log(width, height);
    }
    window.addEventListener("resize", resize);
  });
})();