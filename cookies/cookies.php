		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#eb6c44",
              "text": "#ffffff"
            },
            "button": {
              "background": "#f5d948"
            }
          },
          "content": {
            "message": "<?php echo $lang["cook"]?>",
            "dismiss": "<?php echo $lang["Aceptar"]?>",
            "link": "<?php echo $lang["lems"]?>",
            "href": "cookies/politicacookies.php"
          }
        })});
        </script>