<?php 

// Ensure WordPress core is loaded
// Include necessary WordPress files if needed

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
    register_rest_route('university/v1', 'search', array(
        'methods' => \WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults'
    ));
}

function universitySearchResults($data) {
    $professors = new WP_Query(array(
        'post_type' => 'professor', // Corrected post type
        's' => sanitize_text_field($data['term']) // Adding search term support
    ));

$professorResults = array();

    return $professors->posts; // Returning the results inside the function
}

?>
