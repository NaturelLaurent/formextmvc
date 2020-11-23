<?php
require 'base.php';
?>

        <article>
            <form method="post" action="/contact">
                email :<input type="email" name="email" value="">
                sujet :<input type="text" name="sujet" value="">
                message :<textarea rows="5" name="content" value=""></textarea>
                <input type="submit">
            </form>
        </article>
    </body>
</html>