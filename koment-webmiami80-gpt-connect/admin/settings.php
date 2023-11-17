<?php
// settings.php

// Dodaj nagłówek strony
function koment_webmiami80_gpt_connect_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('koment_webmiami80_gpt_connect_settings');
                do_settings_sections('koment_webmiami80_gpt_connect');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Dodaj sekcje i pola ustawień
function koment_webmiami80_gpt_connect_settings_init() {
    register_setting('koment_webmiami80_gpt_connect_settings', 'koment_webmiami80_gpt_connect_settings');

    // Sekcja AIengine
    add_settings_section(
        'aiengine_section',
        'Ustawienia AIengine',
        'aiengine_section_callback',
        'koment_webmiami80_gpt_connect'
    );

    add_settings_field(
        'aiengine_provider',
        'Provider',
        'aiengine_provider_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    add_settings_field(
        'aiengine_model',
        'Model',
        'aiengine_model_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    add_settings_field(
        'aiengine_rate_limit',
        'Rate Limit Buffer (in Seconds)',
        'aiengine_rate_limit_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    add_settings_field(
        'aiengine_temperature',
        'Temperature',
        'aiengine_temperature_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    add_settings_field(
        'aiengine_max_tokens',
        'Max Tokens',
        'aiengine_max_tokens_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    add_settings_field(
        'aiengine_api_key',
        'API Key',
        'aiengine_api_key_callback',
        'koment_webmiami80_gpt_connect',
        'aiengine_section'
    );

    // Sekcja AutoGPT
    add_settings_section(
        'autogpt_section',
        'Ustawienia AutoGPT',
        'autogpt_section_callback',
        'koment_webmiami80_gpt_connect'
    );

    add_settings_field(
        'autogpt_cron_agents',
        'Konfiguracja Agentów Cron',
        'autogpt_cron_agents_callback',
        'koment_webmiami80_gpt_connect',
        'autogpt_section'
    );

    // Sekcja Kolejki
    add_settings_section(
        'queue_section',
        'Ustawienia Kolejki',
        'queue_section_callback',
        'koment_webmiami80_gpt_connect'
    );

    add_settings_field(
        'queue_progress_monitoring',
        'Monitorowanie Postępów Kolejki',
        'queue_progress_monitoring_callback',
        'koment_webmiami80_gpt_connect',
        'queue_section'
    );

    // Sekcja CRON
    add_settings_section(
        'cron_section',
        'Ustawienia CRON',
        'cron_section_callback',
        'koment_webmiami80_gpt_connect'
    );

    add_settings_field(
        'cron_tasks',
        'Kolejkowane Zadania CRON',
        'cron_tasks_callback',
        'koment_webmiami80_gpt_connect',
        'cron_section'
    );
}

// Callbacki dla pól AIengine
function aiengine_section_callback() {
    echo '<p>Skonfiguruj ustawienia AIengine.</p>';
}

function aiengine_provider_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $provider = isset($options['aiengine_provider']) ? esc_attr($options['aiengine_provider']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[aiengine_provider]" value="' . $provider . '" />';
}

function aiengine_model_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $model = isset($options['aiengine_model']) ? esc_attr($options['aiengine_model']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[aiengine_model]" value="' . $model . '" />';
}

function aiengine_rate_limit_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $rate_limit = isset($options['aiengine_rate_limit']) ? esc_attr($options['aiengine_rate_limit']) : '';
    echo '<input type="number" name="koment_webmiami80_gpt_connect_settings[aiengine_rate_limit]" value="' . $rate_limit . '" min="1" max="30" />';
}

function aiengine_temperature_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $temperature = isset($options['aiengine_temperature']) ? esc_attr($options['aiengine_temperature']) : '0.7';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[aiengine_temperature]" value="' . $temperature . '" />';
}

function aiengine_max_tokens_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $max_tokens = isset($options['aiengine_max_tokens']) ? esc_attr($options['aiengine_max_tokens']) : '1500';
    echo '<input type="number" name="koment_webmiami80_gpt_connect_settings[aiengine_max_tokens]" value="' . $max_tokens . '" />';
}

function aiengine_api_key_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $api_key = isset($options['aiengine_api_key']) ? esc_attr($options['aiengine_api_key']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[aiengine_api_key]" value="' . $api_key . '" />';
}

// Callbacki dla pól AutoGPT
function autogpt_section_callback() {
    echo '<p>Konfiguracja AutoGPT.</p>';
}

function autogpt_cron_agents_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $autogpt_cron_agents = isset($options['autogpt_cron_agents']) ? esc_attr($options['autogpt_cron_agents']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[autogpt_cron_agents]" value="' . $autogpt_cron_agents . '" />';
}

// Callbacki dla pól Kolejki
function queue_section_callback() {
    echo '<p>Ustawienia monitorowania kolejki.</p>';
}

function queue_progress_monitoring_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $queue_progress_monitoring = isset($options['queue_progress_monitoring']) ? esc_attr($options['queue_progress_monitoring']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[queue_progress_monitoring]" value="' . $queue_progress_monitoring . '" />';
}

// Callbacki dla pól CRON
function cron_section_callback() {
    echo '<p>Ustawienia CRON.</p>';
}

function cron_tasks_callback() {
    $options = get_option('koment_webmiami80_gpt_connect_settings');
    $cron_tasks = isset($options['cron_tasks']) ? esc_attr($options['cron_tasks']) : '';
    echo '<input type="text" name="koment_webmiami80_gpt_connect_settings[cron_tasks]" value="' . $cron_tasks . '" />';
}

// Zarejestruj strony ustawień
add_action('admin_menu', 'koment_webmiami80_gpt_connect_add_admin_menu');
add_action('admin_init', 'koment_webmiami80_gpt_connect_settings_init');

function koment_webmiami80_gpt_connect_add_admin_menu() {
    add_menu_page(
        'Koment WebMiami80 GPT Connect Settings',
        'Koment WebMiami80 GPT Connect',
        'manage_options',
        'koment_webmiami80_gpt_connect',
        'koment_webmiami80_gpt_connect_settings_page'
    );
}
