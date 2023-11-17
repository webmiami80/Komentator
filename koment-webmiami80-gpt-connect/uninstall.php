<?php
// uninstall.php

/**
 * Skrypt dezinstalacyjny dla wtyczki Koment WebMiami80 GPT Connect.
 *
 * Ten plik definiuje działania, które mają zostać wykonane podczas dezaktywacji wtyczki.
 *
 * @package Koment_WebMiami80_GPT_Connect
 */

// Sprawdź, czy skrypt jest bezpośrednio wywoływany przez WordPress
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Wykonaj działania podczas dezaktywacji wtyczki
function koment_webmiami80_gpt_connect_uninstall() {
    // Usuń opcje z bazy danych
    delete_option('koment_webmiami80_gpt_connect_aiengine_provider');
    delete_option('koment_webmiami80_gpt_connect_aiengine_model');
    delete_option('koment_webmiami80_gpt_connect_aiengine_rate_limit_buffer');
    delete_option('koment_webmiami80_gpt_connect_aiengine_temperature');
    delete_option('koment_webmiami80_gpt_connect_aiengine_max_tokens');
    delete_option('koment_webmiami80_gpt_connect_aiengine_api_key');
    
    // Dodaj więcej kodu do usunięcia danych, jeśli to konieczne
}

// Wywołaj funkcję dezinstalacyjną
koment_webmiami80_gpt_connect_uninstall();
