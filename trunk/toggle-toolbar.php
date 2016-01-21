<?php
/*
Plugin Name:	Toggle Toolbar
Plugin URI: 	http://dublue.com/plugins/toggle-toolbar/
Description: 	Easily toggle the WordPress Toolbar by adding commands to the end of your URL while logged in.
Author: 		Michael Tran
Author URI: 	http://dublue.com/
Text Domain:	toggle-toolbar
Domain Path:	/languages
Version: 		1601
License:		GPL2
*/

/*  Copyright 2016  Michael Tran  (michael@dublue.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'init', function() {
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();

        if ( $user_id !== 0 ) {
            if ( isset($_GET['nobar']) || isset($_GET['hidebar']) )
                update_user_meta( $user_id, 'show_admin_bar_front', 'false' );

            if ( isset($_GET['yesbar']) || isset($_GET['showbar']) )
                update_user_meta( $user_id, 'show_admin_bar_front', 'true' );
        }
    }
});
