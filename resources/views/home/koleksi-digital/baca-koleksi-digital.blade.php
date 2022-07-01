{{-- <h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> {{ $koleksidigital->title }} </span></h1> --}}
<embed src="{{ asset('storage/' . $koleksidigital->filekatalog) }}#toolbar=0" id="myFrame" width="100%" height="100%"></canvas>
{{-- <script>
    window.addEventListener("contextmenu", e => e.preventDefault());
    const noRightClick = document.getElementId("myFrame");
    
    noRightClick.addEventListener("contextmenu", e => e.preventDefault());
    </script>

<body >
    <canvas oncontextmenu="return false;">
    <embed src="{{ asset('storage/' . $koleksidigital->filekatalog) }}#toolbar=0" id="myFrame" width="100%" height="100%"></canvas>
    
</body>  --}}
{{-- <script>

<script type="text/javascript">

    function disableContextMenu() {
        window.frames["myFrame"].contentDocument.oncontextmenu = function(){return false;};   
            var myFrame = document.getElementById('myFrame');
        if (document.addEventListener) {
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault();
            }, false);
        } else {
            document.attachEvent('oncontextmenu', function () {
                window.event.returnValue = false;
            });
        }
    }
</script>
<body onload="disableContextMenu();" oncontextmenu="return false">
    <embed src="{{ asset('storage/' . $koleksidigital->filekatalog) }}#toolbar=0" id="myFrame" width="100%" height="100%" onload="document.oncontextmenu = function() { return true; }">
    
</body> --}}

{{-- <script>
    jQuery('#iframe').load(function(){
    jQuery('#iframe').contents().find("#toolbarViewerRight").hide();
});

'document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
    }, false);'
    var myFrame = document.getElementById('myFrame');

myFrame.window.eval('document.addEventListener("contextmenu", function (e) {e.preventDefault();}, false)');
</script> --}}

 {{-- <html>
<head>
    <style>
        .embed-cover {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          
          
          /* Just for demonstration, remove this part */
          opacity: 0.25;
        }
        
        .wrapper {
          position: relative;
          overflow: hidden;
        }

    </style>
    <script type="text/javascript">
        function disableContextMenu() {
            window.frames["pdfframe"].contentDocument.oncontextmenu = function(){return false;};   
            var myFrame = document.getElementById('pdfframe');
            myFrame.window.eval('document.addEventListener("contextmenu", function (e) {e.preventDefault();}, false)');
        }

    </script>
</head>
<body onload="disableContextMenu();" oncontextmenu="return false">
    <div class="wrapper">
        <embed id="pdfframe" src="{{ asset('storage/' . $koleksidigital->filekatalog) }}#toolbar=0" width="100%" height="100%" ></embed>
        <div class="embed-cover"></div>
    </div>
   
</body> 
 </html> --}}