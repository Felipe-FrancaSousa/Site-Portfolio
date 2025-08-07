<?php

    /** Esse Helper cria um caminho padronizado para o local do servidor em que o projeto está */
    $BASE_URL = "https://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']. '?') . '/';