<?php
// admin/settings.php

// Funkcja generująca zawartość strony ustawień w panelu administracyjnym
function koment_webmiami80_gpt_connect_settings_page() {
    ?>
    <div class="wrap">
        <h2>Koment WebMiami80 GPT Connect Settings</h2>
        <form method="post" action="options.php">
            <?php
            // Ustawienia WordPress
            settings_fields('koment_webmiami80_gpt_connect_settings');
            do_settings_sections('koment_webmiami80_gpt_connect_settings');
            submit_button();
            ?>
        </form>

        <h2>AutoGPT Settings</h2>
        <form method="post" action="options.php">
            <?php
            // Ustawienia WordPress
            settings_fields('autogpt_settings');
            do_settings_sections('autogpt_settings');
            submit_button();
            ?>
        </form>

        <h2>Kolejka Settings</h2>
        <form method="post" action="options.php">
            <?php
            // Ustawienia WordPress
            settings_fields('kolejka_settings');
            do_settings_sections('kolejka_settings');
            submit_button();
            ?>
        </form>

        <h2>CRON Settings</h2>
        <form method="post" action="options.php">
            <?php
            // Ustawienia WordPress
            settings_fields('cron_settings');
            do_settings_sections('cron_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Funkcja inicjująca ustawienia
function koment_webmiami80_gpt_connect_settings_init() {
    // Sekcja ustawień AIengine
    add_settings_section(
        'aiengine_section',
        'AIengine Settings',
        'aiengine_section_callback',
        'koment_webmiami80_gpt_connect_settings'
    );

    // Pole Provider w sekcji AIengine
    add_settings_field(
        'provider',
        'Provider',
        'provider_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Pole Model w sekcji AIengine
    add_settings_field(
        'model',
        'Model',
        'model_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Pole Rate Limit Buffer w sekcji AIengine
    add_settings_field(
        'rate_limit_buffer',
        'Rate Limit Buffer (in Seconds)',
        'rate_limit_buffer_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Pole Temperature w sekcji AIengine
    add_settings_field(
        'temperature',
        'Temperature',
        'temperature_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Pole Max Tokens w sekcji AIengine
    add_settings_field(
        'max_tokens',
        'Max Tokens',
        'max_tokens_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Pole API Key w sekcji AIengine
    add_settings_field(
        'api_key',
        'API Key',
        'api_key_callback',
        'koment_webmiami80_gpt_connect_settings',
        'aiengine_section'
    );

    // Rejestracja ustawień
    register_setting('koment_webmiami80_gpt_connect_settings', 'koment_webmiami80_gpt_connect_settings');
}
add_action('admin_init', 'koment_webmiami80_gpt_connect_settings_init');

// Sekcja ustawień AutoGPT
function autogpt_settings_section_callback() {
    echo '<p>Tutaj możesz skonfigurować ustawienia AutoGPT.</p>';
}

// Funkcja inicjująca ustawienia AutoGPT
function autogpt_settings_init() {
    // Rejestracja ustawień
    register_setting('autogpt_settings', 'autogpt_settings');
}
add_action('admin_init', 'autogpt_settings_init');

// Sekcja ustawień Kolejki
function kolejka_settings_section_callback() {
    echo '<p>Tutaj możesz skonfigurować ustawienia Kolejki.</p>';
}

// Funkcja inicjująca ustawienia Kolejki
function kolejka_settings_init() {
    // Rejestracja ustawień
    register_setting('kolejka_settings', 'kolejka_settings');
}
add_action('admin_init', 'kolejka_settings_init');

// Sekcja ustawień CRON
function cron_settings_section_callback() {
    echo '<p>Tutaj możesz skonfigurować ustawienia CRON.</p>';
}

// Funkcja inicjująca ustawienia CRON
function cron_settings_init() {
    // Rejestracja ustawień
    register_setting('cron_settings', 'cron_settings');
}
add_action('admin_init', 'cron_settings_init');
