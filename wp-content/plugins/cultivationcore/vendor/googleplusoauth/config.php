<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header,$apiConfig;
/**
 * Get theme setting data
 */
$cultivation_theme_data = '';
if (function_exists('fw_get_db_settings_option')):	
    $cultivation_theme_data = fw_get_db_settings_option();
endif; 
$googleplus_app_name = '';
if(!empty($themeoption_data['google_app_name'])):
$googleplus_app_name= $themeoption_data['google_app_name'];
endif;  
$google_login_client_id = '';
if(!empty($themeoption_data['google_login_client_id'])):
$google_login_client_id = $themeoption_data['google_login_client_id'];
endif;  
$google_login_client_secret = '';
if(!empty($themeoption_data['google_login_client_secret'])):
$google_login_client_secret = $themeoption_data['google_login_client_secret'];
endif; 
$apiConfig = array(
    // True if objects should be returned by the service classes.
    // False if associative arrays should be returned (default behavior).
    'use_objects' => false,
  
    // The application_name is included in the User-Agent HTTP header.
    'application_name' => 'cultivation',

    // OAuth2 Settings, you can get these keys at https://code.google.com/apis/console
    'oauth2_client_id' => '298858770123-5jep6j01vvnqdimk7o3l9l01rsaioqeb.apps.googleusercontent.com', 
    'oauth2_client_secret' => 'W2RLAH-bBPFgoCgxnsT1T1xM', 
    
    'oauth2_redirect_uri' => get_site_url() . '/wp-admin/admin-ajax.php?action=cultivation_googleplus_oauth_callback',
  
   // The developer key, you get this at https://code.google.com/apis/console
    'developer_key' => '', 

    // OAuth1 Settings.
    // If you're using the apiOAuth auth class, it will use these values for the oauth consumer key and secret.
    // See http://code.google.com/apis/accounts/docs/RegistrationForWebAppsAuto.html for info on how to obtain those
    'oauth_consumer_key'    => 'app consumer key',
    'oauth_consumer_secret' => 'app conusmer secret',
  
    // Site name to show in the Google's OAuth 1 authentication screen.
    'site_name' => 'clouds.9lessons.info',

    // Which Authentication, Storage and HTTP IO classes to use.
    'authClass'    => 'apiOAuth2',
    'ioClass'      => 'apiCurlIO',
    'cacheClass'   => 'apiFileCache',

    // If you want to run the test suite (by running # phpunit AllTests.php in the tests/ directory), fill in the settings below
    'oauth_test_token' => '', // the oauth access token to use (which you can get by runing authenticate() as the test user and copying the token value), ie '{"key":"foo","secret":"bar","callback_url":null}'
    'oauth_test_user' => '', // and the user ID to use, this can either be a vanity name 'testuser' or a numberic ID '123456'

    // Don't change these unless you're working against a special development or testing environment.
    'basePath' => 'https://www.googleapis.com',

    // IO Class dependent configuration, you only have to configure the values for the class that was configured as the ioClass above
    'ioFileCache_directory'  =>
        (function_exists('sys_get_temp_dir') ?
            sys_get_temp_dir() . '/apiClient' :
        '/tmp/apiClient'),
    'ioMemCacheStorage_host' => '127.0.0.1',
    'ioMemcacheStorage_port' => '11211',

    // Definition of service specific values like scopes, oauth token URLs, etc
    'services' => array(
      'books' => array('scope' => 'https://www.googleapis.com/auth/books'),
      'buzz' => array('scope' => 'https://www.googleapis.com/auth/buzz', 'authorization_token_url' => 'https://www.google.com/buzz/api/auth/OAuthAuthorizeToken'),
      'latitude' => array(
          'scope' => array(
              'https://www.googleapis.com/auth/latitude.all.best',
              'https://www.googleapis.com/auth/latitude.all.city',
          )
      ),
      'moderator' => array('scope' => 'https://www.googleapis.com/auth/moderator'),
      'plus' => array('scope' => 'https://www.googleapis.com/auth/plus.me'),
      'easyhybrid' => array('scope' => 'https://www.googleapis.com/auth/userinfo#email'),
      'siteVerification' => array('scope' => 'https://www.googleapis.com/auth/siteverification'),
      'tasks' => array('scope' => 'https://www.googleapis.com/auth/tasks'),
      'urlshortener' => array('scope' => 'https://www.googleapis.com/auth/urlshortener')
    )
);