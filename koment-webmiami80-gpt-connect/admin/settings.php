// admin/settings.php

/**
 * Strona ustawień wtyczki Koment WebMiami80 GPT Connect.
 *
 * @package Koment_WebMiami80_GPT_Connect
 */

if (!defined('WPINC')) {
    die;
}

/**
 * Klasa obsługująca stronę ustawień wtyczki.
 */
class Koment_WebMiami80_GPT_Connect_Settings_Page {

    /**
     * Konstruktor klasy.
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Dodaj stronę ustawień w menu WordPressa.
     */
    public function add_plugin_page() {
        add_options_page(
            'Ustawienia Koment WebMiami80 GPT Connect',
            'Koment WebMiami80 GPT Connect',
            'manage_options',
            'koment-webmiami80-gpt-connect',
            array($this, 'create_admin_page')
        );
    }

    /**
     * Inicjalizacja strony ustawień.
     */
    public function page_init() {
        register_setting(
            'koment_webmiami80_gpt_connect_settings_group',
            'koment_webmiami80_gpt_connect_aiengine_provider'
        );

        // Dodaj pozostałe ustawienia, np. model, rate limit buffer, temperature, max tokens, api key
        add_settings_section(
            'koment_webmiami80_gpt_connect_aiengine_section',
            'AI Engine Settings for Koment WebMiami80 GPT Connect',
            array($this, 'print_section_info'),
            'koment-webmiami80-gpt-connect'
        );

        add_settings_field(
            'aiengine_provider',
            'Provider',
            function() {
                return 'OpenAI';
            },
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        add_settings_field(
            'aiengine_model',
            'Model',
            array($this, 'aiengine_model_callback'),
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        add_settings_field(
            'aiengine_rate_limit_buffer',
            'Rate Limit Buffer (in Seconds)',
            array($this, 'aiengine_rate_limit_buffer_callback'),
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        add_settings_field(
            'aiengine_temperature',
            'Temperature',
            array($this, 'aiengine_temperature_callback'),
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        add_settings_field(
            'aiengine_max_tokens',
            'Max Tokens',
            array($this, 'aiengine_max_tokens_callback'),
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        add_settings_field(
            'aiengine_api_key',
            'API Key',
            array($this, 'aiengine_api_key_callback'),
            'koment-webmiami80-gpt-connect',
            'koment_webmiami80_gpt_connect_aiengine_section'
        );

        // Dodaj pozostałe pola ustawień i ich funkcje callback
        // ...
    }
