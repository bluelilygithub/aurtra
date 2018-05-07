<?php
/*

Template Name:  logoutForm

*/

  wp_logout(); 
  wp_redirect( home_url( '/login' ) );
  exit();
