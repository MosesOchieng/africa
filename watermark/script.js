const watermark = document.querySelector("#watermark");

      function uploadFile(target) {
         var image = document.getElementById('output');
         var width = image.clientWidth;
         image.style.height = "50vh";
	     image.src = URL.createObjectURL(event.target.files[0])
       };
       function watermarkText() {
         var mark = document.getElementById("mark").value;
         watermark.innerHTML = mark;
       }
       function sizeFonts() {
         var size = document.getElementById("size").value;
         watermark.style.fontSize = size + "px";
       }
       function colorFonts() {
         var colour = document.getElementById("colour").value;
         watermark.style.color = colour;
       }
       function moveLeft() {
         var right = document.getElementById("posright");
         watermark.style.right = right.value + "%";
       }
       function moveDown() {
         var down = document.getElementById("postop");
         watermark.style.top = down.value + "%";
       }
       function seeThrough() {
         var opacity = document.getElementById("opacity");
         watermark.style.opacity = opacity.value;
       }
       function rotateMark() {
         var turn = document.getElementById("turn");
         watermark.style.transform = "rotate(" + turn.value + "deg)";
       }
       function highlighter() {
         var high = document.getElementById("background");
         watermark.style.backgroundColor = high.value;
         watermark.style.padding = "0 5px 0 5px";
       }