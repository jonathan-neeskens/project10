<?php include "includes/head.php" ?>
<body>
<?php include "includes/menu.php" ?>
<div class="canvas bit-90">

    <div class="innerCanvas">
        <div class="inside_innerCanvas">
            <h2> Bestelling vandaag </h2>
        </div>
    </div>
    <a href="add_menu.php" class="addbutton">
        <i class="fa fa-send">  </i>
    </a>
    <div class="popup" style="display: none;"></div>
    <script>
        if (window.location.href.indexOf("add=success") != -1){
            alert('Toevoegen van menu was succesvol. Dit bericht moet binnenkort veranderd worden in een pop-up.');
            //addclass 'zichtbaar' aan <div class='popup'>
        }

        else if (window.location.href.indexOf("change=success") != -1){
            alert('Aanpassen van menu was succesvol. Dit bericht moet binnenkort veranderd worden in een pop-up.');
            //addclass 'zichtbaar' aan <div class='popup'>
        }
    </script>
</div>
</body>
</html>
