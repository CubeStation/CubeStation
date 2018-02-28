<?php
/**
 * @since 3.5.3
 */ 
class WPBDP__Views__Manage_Recurring extends WPBDP__View {

    private $subscriptions = array();


    public function __construct() { }

    public function dispatch() {
        if ( ! is_user_logged_in() ) {
            return wpbdp_render( 'parts/login-required', array(), false );
        }

        $action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : 'index';

        if ( 'cancel-subscription' == $action ) {
            return $this->do_cancel_subscription();
        }

        return $this->render_subscription_list();
    }

    private function do_cancel_subscription() {
        if ( ! empty( $_GET['listing'] ) ) {
            $listing_id = absint( $_GET['listing'] );
            $listing = wpbdp_get_listing( $listing_id );
        } else {
            $listing_id = 0;
            $listing = null;
        }

        if ( ! $listing ) {
            $message = _x( "The listing with id = <listing-id> doesn't exists.", 'manage subscription', 'WPBDM' );
            $message = str_replace( '<listing-id>', $listing_id, $message );

            return wpbdp_render_msg( $message, 'error' );
        }

        if ( ! empty( $_GET['nonce'] ) ) {
            $cancel_subscription_nonce = $_GET['nonce'];
        } else {
            $cancel_subscription_nonce = '';
        }

        if ( ! $cancel_subscription_nonce || wp_create_nonce( 'cancel-subscription-' . $listing->get_id() ) != $cancel_subscription_nonce ) {
            $message = _x( 'You are not authorized to cancel this subscription. The link you followed is invalid.', 'manage subscriptions', 'WPBDM' );
            return wpbdp_render_msg( $message, 'error' );
        }

        try {
            $subscription = new WPBDP__Listing_Subscription( $listing->get_id() );
        } catch ( Exception $e ) {
            $subscription = null;
        }

        if ( ! $subscription ) {
            return wpbdp_render_msg( _x( 'Invalid subscription.', 'manage subscriptions', 'WPBDM' ), 'error' );
        }

        if ( ! empty( $_POST['return-to-subscriptions'] ) ) {
            $this->_redirect( remove_query_arg( array( 'action', 'listing', 'nonce' ) ) );
        }

        if ( ! empty( $_POST['cancel-subscription'] ) ) {
            return $this->cancel_subscription( $listing, $subscription );
        }

        return $this->render_cancel_subscription_page( $listing, $subscription );
    }

    public function cancel_subscription( $listing, $subscription ) {
        global $wpbdp;

        try {
            $wpbdp->payments->cancel_subscription( $listing, $subscription );
        } catch ( Exception $e ) {
            return wpbdp_render_msg( $e->getMessage(), 'error' );
        }

        return wpbdp_render_msg( _x( 'Your subscription was canceled.', 'manage subscriptions', 'WPBDM' ) );
    }

    public function render_cancel_subscription_page( $listing, $subscription ) {
        $params = array(
            'listing' => $listing,
            'plan' => $listing->get_fee_plan(),
            'subscription' => $subscription,
        );

        return wpbdp_render( 'manage-recurring-cancel', $params );
    }

    private function render_subscription_list() {
        $listings = $this->get_recurring_listings();

        if ( ! $listings ) {
            return wpbdp_render_msg( _x( 'You are not on recurring payments for any of your listings.', 'manage listings', 'WPBDM' ) );
        }

        return wpbdp_render( 'manage-recurring', array( 'listings' => $listings ), false );
    }

    private function get_recurring_listings() {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->posts} p ";
        $sql.= "LEFT JOIN {$wpdb->prefix}wpbdp_listings l ON ( p.ID = l.listing_id ) ";
        $sql.= 'WHERE post_type = %s AND post_author = %d AND is_recurring = %d ';

        $listings = $wpdb->get_col( $wpdb->prepare( $sql, WPBDP_POST_TYPE, get_current_user_id(), true ) );

        return array_map( 'wpbdp_get_listing', $listings );
    }
}
