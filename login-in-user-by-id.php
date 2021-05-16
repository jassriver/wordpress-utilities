<?php
// Function to automatically authenticate the user on the account with only the user's user id
function auto_login() {
    if (!is_user_logged_in()) {
        // determine WordPress user account to impersonate
        $user_login = 'account_target';

        // get the user id
        $user = get_userdatabylogin( $user_login );
        $user_id = $user->ID;

        // autologin
        wp_set_current_user($user_id, $user_login);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $user_login);
    }
}
