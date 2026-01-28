define('DEBUG_MODE', true); // Altere para false para desligar o debug

<?php
/**
 * ============================================================
 * DEBUG.PHP — Sistema central de debug para o site Maia GYM
 *
 * OBJETIVO:
 * - Permitir ativar/desativar a exibição de erros em todas as páginas
 * - Facilitar o desenvolvimento e troubleshooting
 * ============================================================
 */

define('DEBUG_MODE', true); // Altere para false para desligar o debug

if (DEBUG_MODE) {
    // Ativar exibição de erros
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    // Desativar exibição de erros
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}
