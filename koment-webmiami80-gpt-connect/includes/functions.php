/**
 * Funkcje pomocnicze dla wtyczki Koment WebMiami80 GPT Connect.
 *
 * @package Koment_WebMiami80_GPT_Connect
 */

// Funkcja do generowania unikalnych komentarzy przy użyciu cheatGPT.
function koment_webmiami80_gpt_generate_comments($post_id, $user_id, $comment_count) {
    // Pobierz ustawienia AIengine, AutoGPT itp. z bazy danych
    $aiengine_provider = get_option('koment_webmiami80_gpt_connect_aiengine_provider', 'OpenAI');
    $aiengine_model = get_option('koment_webmiami80_gpt_connect_aiengine_model', 'gpt-3.5-turbo-16k');
    $rate_limit_buffer = get_option('koment_webmiami80_gpt_connect_aiengine_rate_limit_buffer', 10);
    $temperature = get_option('koment_webmiami80_gpt_connect_aiengine_temperature', 0.7);
    $max_tokens = get_option('koment_webmiami80_gpt_connect_aiengine_max_tokens', 1500);
    $api_key = get_option('koment_webmiami80_gpt_connect_aiengine_api_key', '');

    // Tutaj umieść kod do generowania komentarzy z użyciem cheatGPT i ustawień z bazy danych
    for ($i = 0; $i < $comment_count; $i++) {
        $comment_content = generate_comment_with_cheatGPT($aiengine_provider, $aiengine_model, $rate_limit_buffer, $temperature, $max_tokens, $api_key);
        $comment_author = generate_random_polish_author();
        $comment_date = generate_random_date();

        // Użyj funkcji do sprawdzania, czy komentarz już istnieje
        if (!koment_webmiami80_gpt_comment_exists($comment_content)) {
            // Jeśli komentarz nie istnieje, dodaj go do bazy danych
            $comment_data = array(
                'comment_post_ID' => $post_id,
                'comment_author' => $comment_author,
                'comment_author_email' => 'example@email.com',
                'comment_content' => $comment_content,
                'comment_type' => '',
                'comment_parent' => 0,
                'user_id' => $user_id,
                'comment_author_IP' => '127.0.0.1',
                'comment_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                'comment_date' => $comment_date,
                'comment_approved' => 1,
                'comment_i' => $i,
            );

            wp_insert_comment($comment_data);

            // Zapisz historię komentarzy
            koment_webmiami80_gpt_update_comment_history($comment_data);
        }
    }
}
