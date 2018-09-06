function is_login_page() {
    if ( $GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register' )
        return true;
    return false;
}

function my_redirect() {  
    //Don't redirect if user is logged in or user is trying to sign up or sign in
    if( !is_login_page() && !is_admin() && !is_user_logged_in()){
	
      wp_redirect( 'https://domain/wp-login.php' );
      exit;
    }
}
add_action( 'template_redirect', 'my_redirect' );