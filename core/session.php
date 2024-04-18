<?php

function iniciar_sessao() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

?>
