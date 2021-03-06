<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * bp_like_process_ajax()
 *
 * Runs the relevant function depending on what AJAX call has been made.
 *
 */
function bp_like_process_ajax() {
  //  global $bp;

    $id = preg_replace( "/\D/" , "" , $_POST['id'] );

    if ( $_POST['type'] == 'activity_update like' ) {
        bp_like_add_user_like( $id , 'activity_update' );
        //add_action( 'view_who_likes' , 'bp_like_get_some_likes' );
    }

    if ( $_POST['type'] == 'activity_update unlike' ) {
        bp_like_remove_user_like( $id , 'activity_update' );
    }

    if ( $_POST['type'] == 'activity_comment like' ) {
        bp_like_add_user_like( $id , 'activity_comment' );
    }

    if ( $_POST['type'] == 'activity_comment unlike' ) {
        bp_like_remove_user_like( $id , 'activity_comment' );
    }

    if ( $_POST['type'] == 'button view-likes' ) {
        bp_like_get_some_likes( $id , 'activity' );
    }

    if ( $_POST['type'] == 'button like_blogpost' ) {
        bp_like_add_user_like( $id , 'blogpost' );
    }

    if ( $_POST['type'] == 'button unlike_blogpost' ) {
        bp_like_remove_user_like( $id , 'blogpost' );
    }

    if ( $_POST['type'] == 'acomment-reply bp-primary-action view-likes' ) {
        bp_like_get_some_likes( $id , 'activity' );
    }

    die();

}

add_action( 'wp_ajax_activity_like' , 'bp_like_process_ajax' );
