<?php

/**
 * Active Directory(AD) authentication using PHP LDAP
 * Make sure you have mod_ldap enabled in apache config
 * @author Anil Kumar (https://github.com/anil-ajax)
 * 
 */

if(isset($_POST['username']) && isset($_POST['password'])){

    $ad_server = "ldap://mydomain.com"; // ask your networking team for this
	
    $ldap = ldap_connect($ad_server, 389); // 389 is LDAP port, change as per your configurations
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = 'local_domain' . "\\" . $username;  // ask your networking team for your "local_domain"

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


    if ($bind) {
        // authentication successful
    }
}
