<?php include "includes/head.php" ?>
<body>
<div class="layer"></div>
<div class="popup">
        <form action="index.php">
        <button onclick="invisible()">Sluiten</button>
    </form>
</div>
    <?php include "includes/menu.php" ?>
        <div class="canvas">
            <div class="innerCanvas">
               
            </div>
        </div>
        <script>
            function invisible(){
                $('.popup').removeClass('visible');
                $('.layer').removeClass('visible');
            }
        </script>
    </body>
</html>
