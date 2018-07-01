---

title: Hide Wordpress menu options
tags:
-   wordpress
-   php
excerpt: I recently had to work with a Wordpress 'hand-me-down' with a rather large Admin menu The problem with giving the user too much choice is that they become overwhelmed and quickly the responsibility of looking after a website fall back

---

I recently had to work with a **Wordpress** 'hand-me-down' with a rather large [Admin menu](https://twitter.com/millard_/status/556122750247796737). 

The problem with giving the user too much choice is that they become overwhelmed and quickly the responsibility of looking after a website fall back to the developer.

So in order to give the user a system they can maintain themselves it might be worth removing some of the unnecessary menu options that only a developer/Admin would need.

    function edit_admin_menus() {
    	global $menu;
    	global $submenu;
    	global $user_ID;

    	//page keys to be removed
    	$pages = array(
    			'edit.php?post_type=acf',
    			'tools.php',
    			'wpcf7',
    		);

    	if(current_user_can('[role]')){
    		foreach($pages as $p){
    			remove_menu_page($p);
    		}
    	}

    	return;
    }

    add_action('admin_menu', 'edit_admin_menus');

_Note: sometimes you will need to check the $menu object to get the key you need for the menu option you wish to hide._
