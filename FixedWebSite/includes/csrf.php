<?php
    $_SESSION['csrf_token'] = bin2hex(random_bytes(30));
?>