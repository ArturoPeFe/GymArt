<?php
// Verificar si la sesión ha expirado al recargar la página, si no refrescar tiempo expiración
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();
} else {
    $_SESSION['timeout'] = time() + 600;
}

