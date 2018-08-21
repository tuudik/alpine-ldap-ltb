<?php
# ENV helper from Laravel Framework
include 'env.helper.php';
#==============================================================================
# LTB Self Service Password
#
# Copyright (C) 2009 Clement OUDOT
# Copyright (C) 2009 LTB-project.org
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# GPL License: http://www.gnu.org/licenses/gpl.txt
#
#==============================================================================

#==============================================================================
# All the default values are kept here, you should not modify it but use
# config.inc.local.php file instead to override the settings from here.
#==============================================================================

#==============================================================================
# Configuration
#==============================================================================

# Debug mode
# true: log and display any errors or warnings (use this in configuration/testing)
# false: log only errors and do not display them (use this in production)
$debug = env('DEBUG', false);

# LDAP
$ldap_url = env('LDAP_URL', 'ldap://localhost');
$ldap_starttls = env('LDAP_STARTTLS', false);
$ldap_binddn = env('LDAP_BINDDN', 'cn=manager,dc=example,dc=com');
$ldap_bindpw = env('LDAP_BINDPW', 'secret');
$ldap_base = env('LDAP_BASE', 'dc=example,dc=com');
$ldap_login_attribute = env('LDAP_LOGIN_ATTRIBUTE', 'uid');
$ldap_fullname_attribute = env('LDAP_FULLNAME_ATTRIBUTE', 'cn');
$ldap_filter = env('LDAP_FILTER', '(&(objectClass=person)($ldap_login_attribute={login}))');

# Active Directory mode
# true: use unicodePwd as password field
# false: LDAPv3 standard behavior
$ad_mode = env('AD_MODE', false);
# Force account unlock when password is changed
$ad_options['force_unlock'] = env('AD_OPTIONS_FORCE_UNLOCK', false);
# Force user change password at next login
$ad_options['force_pwd_change'] = env('AD_OPTIONS_FORCE_PWD_CHANGE', false);
# Allow user with expired password to change password
$ad_options['change_expired_password'] = env('AD_OPTIONS_CHANGE_EXPIRED_PASSWORD', false);

# Samba mode
# true: update sambaNTpassword and sambaPwdLastSet attributes too
# false: just update the password
$samba_mode = env('SAMBA_MODE', false);
# Set password min/max age in Samba attributes
#$samba_options['min_age'] = 5;
#$samba_options['max_age'] = 45;

# Shadow options - require shadowAccount objectClass
# Update shadowLastChange
$shadow_options['update_shadowLastChange'] = env('SHADOW_OPTIONS_UPDATE_SHADOWLASTCHANGE', false);
$shadow_options['update_shadowExpire'] = env('SHADOW_OPTIONS_UPDATE_SHADOWEXPIRE', false);

# Default to -1, never expire
$shadow_options['shadow_expire_days'] = env('SHADOW_OPTIONS_EXPIRE_DAYS', -1);

# Hash mechanism for password:
# SSHA, SSHA256, SSHA384, SSHA512
# SHA, SHA256, SHA384, SHA512
# SMD5
# MD5
# CRYPT
# clear (the default)
# auto (will check the hash of current password)
# This option is not used with ad_mode = true
$hash = env('HASH', 'clear');

# Prefix to use for salt with CRYPT
$hash_options['crypt_salt_prefix'] = env('HASH_OPTIONS_CRYPT_SALT_PREFIX', '$6$');
$hash_options['crypt_salt_length'] = env('HASH_OPTIONS_CRYPT_SALT_LENGTH', '6');

# Local password policy
# This is applied before directory password policy
# Minimal length
$pwd_min_length = env('PWD_MIN_LENGTH', 0);
# Maximal length
$pwd_max_length = env('PWD_MAX_LENGTH', 0);
# Minimal lower characters
$pwd_min_lower = env('PWD_MIN_LOWER', 0);
# Minimal upper characters
$pwd_min_upper = env('PWD_MIN_UPPER', 0);
# Minimal digit characters
$pwd_min_digit = env('PWD_MIN_DIGIT', 0);
# Minimal special characters
$pwd_min_special = env('PWD_MIN_SPECIAL', 0);
# Definition of special characters
$pwd_special_chars = env('PWD_SPECIAL_CHARS', '^a-zA-Z0-9');
# Forbidden characters
#$pwd_forbidden_chars = "@%";
# Don't reuse the same password as currently
$pwd_no_reuse = env('PWD_NO_REUSE', true);
# Check that password is different than login
$pwd_diff_login = env('PWD_DIFF_LOGIN', true);
# Complexity: number of different class of character required
$pwd_complexity = env('PWD_COMPLEXITY', 0);
# use pwnedpasswords api v2 to securely check if the password has been on a leak
$use_pwnedpasswords = env('USE_PWNEDPASSWORDS', false);
# Show policy constraints message:
# always
# never
# onerror
$pwd_show_policy = env('PWD_SHOW_POLICY', 'never');
# Position of password policy constraints message:
# above - the form
# below - the form
$pwd_show_policy_pos = env('PWD_SHOW_POLICY_POS', 'above');

# Who changes the password?
# Also applicable for question/answer save
# user: the user itself
# manager: the above binddn
$who_change_password = env('WHO_CHANGE_PASSWORD', 'user');

## Standard change
# Use standard change form?
$use_change = env('USE_CHANGE', true);

## SSH Key Change
# Allow changing of sshPublicKey?
$change_sshkey = env('CHANGE_SSHKEY', false);

# What attribute should be changed by the changesshkey action?
$change_sshkey_attribute = env('CHANGE_SSHKEY_ATTRIBUTE', 'sshPublicKey');

# Who changes the sshPublicKey attribute?
# Also applicable for question/answer save
# user: the user itself
# manager: the above binddn
$who_change_sshkey = env('WHO_CHANGE_SSHKEY', 'user');

# Notify users anytime their sshPublicKey is changed
## Requires mail configuration below
$notify_on_sshkey_change = env('NOTIFY_ON_SSHKEY_CHANGE', false);

## Questions/answers
# Use questions/answers?
# true (default)
# false
$use_questions = env('USE_QUESTIONS', true);

# Answer attribute should be hidden to users!
$answer_objectClass = env('ANSWER_OBJECTCLASS', 'extensibleObject');
$answer_attribute = env('ANSWED_ATTRIBUTE', 'info');

# Crypt answers inside the directory
$crypt_answers = env('CRYPT_ANSWERS', true);

# Extra questions (built-in questions are in lang/$lang.inc.php)
#$messages['questions']['ice'] = "What is your favorite ice cream flavor?";

## Token
# Use tokens?
# true (default)
# false
$use_tokens = env('USE_TOKENS', true);
# Crypt tokens?
# true (default)
# false
$crypt_tokens = env('CRYPT_TOKENS', true);
# Token lifetime in seconds
$token_lifetime = env('TOKEN_LIFETIME', '3600');

## Mail
# LDAP mail attribute
$mail_attribute = env('MAIL_ATTRIBUTE', 'mail');
# Get mail address directly from LDAP (only first mail entry)
# and hide mail input field
# default = false
$mail_address_use_ldap = env('MAIL_ADDRESS_USE_LDAP', false);
# Who the email should come from
$mail_from = env('MAIL_FROM', 'admin@example.com');
$mail_from_name = env('MAIL_FROM_NAME', 'Self Service Password');
$mail_signature = env('MAIL_SIGNATURE', '');
# Notify users anytime their password is changed
$notify_on_change = env('NOTIFY_ON_CHANGE', false);
# PHPMailer configuration (see https://github.com/PHPMailer/PHPMailer)
$mail_sendmailpath = env('MAIL_SENDMAILPATH', '/usr/sbin/sendmail');
$mail_protocol = env('MAIL_PROTOCOL', 'smtp');
$mail_smtp_debug = env('MAIL_STMP_DEBUG', 0);
$mail_debug_format = env('MAIL_DEBUG_FORMAT', 'error_log');
$mail_smtp_host = env('MAIL_SMTP_HOST', 'localhost');
$mail_smtp_auth = env('MAIL_SMTP_AUTH', false);
$mail_smtp_user = env('MAIL_SMTP_USER', '');
$mail_smtp_pass = env('MAIL_SMTP_PASS', '');
$mail_smtp_port = env('MAIL_SMTP_PORT', 25);
$mail_smtp_timeout = env('MAIL_SMTP_TIMEOUT', 30);
$mail_smtp_keepalive = env('MAIL_SMTP_KEEPALIVE', false);
$mail_smtp_secure = env('MAIL_SMTP_SECURE', 'tls');
$mail_smtp_autotls = env('MAIL_SMTP_AUTOTLS', true);
$mail_contenttype = env('MAIL_CONTENTTYPE', 'text/plain');
$mail_wordwrap = env('MAIL_WORDWRAP', 0);
$mail_charset = env('MAIL_CHARSET', 'utf-8');
$mail_priority = env('MAIL_PRIORITY', 3);
$mail_newline = env('MAIL_NEWLINE', PHP_EOL);

## SMS
# Use sms
$use_sms = env('USE_SMS', true);
# SMS method (mail, api)
$sms_method = env('SMS_METHOD', 'mail');
$sms_api_lib = env('SMS_API_LIB', 'lib/smsapi.inc.php');
# GSM number attribute
$sms_attribute = env('SMS_ATTRIBUTE', 'mobile');
# Partially hide number
$sms_partially_hide_number = env('SMS_PARTIALLY_HIDE_NUMBER', true);
# Send SMS mail to address
$smsmailto = env('SMSMAILTO', '{sms_attribute}@service.provider.com');
# Subject when sending email to SMTP to SMS provider
$smsmail_subject = env('SMSMAIL_SUBJECT', 'Provider code');
# Message
$sms_message = env('SMS_MESSAGE', '{smsresetmessage} {smstoken}');
# Remove non digit characters from GSM number
$sms_sanitize_number = env('SMS_SANITIZE_NUMBER', false);
# Truncate GSM number
$sms_truncate_number = env('SMS_TRUNCATE_NUMBER', false);
$sms_truncate_number_length = env('SMS_TRUNCATE_NUMBER_LENGTH', 10);
# SMS token length
$sms_token_length = env('SMS_TOKEN_LENGTH', 6);
# Max attempts allowed for SMS token
$max_attempts = env('MAX_ATTEMPTS', 3);

# Encryption, decryption keyphrase, required if $crypt_tokens = true
# Please change it to anything long, random and complicated, you do not have to remember it
# Changing it will also invalidate all previous tokens and SMS codes
$keyphrase = env('KEYPHRASE', 'secret');

# Reset URL (if behind a reverse proxy)
#$reset_url = $_SERVER['HTTP_X_FORWARDED_PROTO'] . "://" . $_SERVER['HTTP_X_FORWARDED_HOST'] . $_SERVER['SCRIPT_NAME'];

# Display help messages
$show_help = env('SHOW_HELP', true);

# Default language
$lang = env('LANG', 'en');

# List of authorized languages. If empty, all language are allowed.
# If not empty and the user's browser language setting is not in that list, language from $lang will be used.
$allowed_lang = array();

# Display menu on top
$show_menu = env('SHOW_MENU', true);

# Logo
$logo = env('LOGO', 'images/ltb-logo.png');

# Background image
$background_image = env('BACKGROUND_IMAGE', 'images/unsplash-space.jpeg');

# Where to log password resets - Make sure apache has write permission
# By default, they are logged in Apache log
#$reset_request_log = "/var/log/self-service-password";

# Invalid characters in login
# Set at least "*()&|" to prevent LDAP injection
# If empty, only alphanumeric characters are accepted
$login_forbidden_chars = env('LOGIN_FORBIDDEN_CHARS', '*()&|');

## CAPTCHA
# Use Google reCAPTCHA (http://www.google.com/recaptcha)
$use_recaptcha = env('USE_RECAPTCHA', false);
# Go on the site to get public and private key
$recaptcha_publickey = env('RECAPTCHA_PUBLICKEY', '');
$recaptcha_privatekey = env('RECAPTCHA_PRIVATEKEY', '');
# Customization (see https://developers.google.com/recaptcha/docs/display)
$recaptcha_theme = env('RECAPTCHA_THEME', 'light');
$recaptcha_type = env('RECAPTCHA_TYPE', 'image');
$recaptcha_size = env('RECAPTCHA_SIZE', 'normal');
# reCAPTCHA request method, null for default, Fully Qualified Class Name to override
# Useful when allow_url_fopen=0 ex. $recaptcha_request_method = '\ReCaptcha\RequestMethod\CurlPost';
$recaptcha_request_method = env('RECAPTCHA_REQUEST_METHOD', null);

## Default action
# change
# sendtoken
# sendsms
$default_action = env('DEFAULT_ACTION', 'change');

## Extra messages
# They can also be defined in lang/ files
#$messages['passwordchangedextramessage'] = NULL;
#$messages['changehelpextramessage'] = NULL;

# Launch a posthook script after successful password change
#$posthook = "/usr/share/self-service-password/posthook.sh";
$display_posthook_error = ;env('DISPLAY_POSTHOOK_ERROR', true);

# Hide some messages to not disclose sensitive information
# These messages will be replaced by badcredentials error
$obscure_failure_messages = env('OBSCURE_FAILURE_MESSAGES', array("mailnomatch"));

# Allow to override current settings with local configuration
if (file_exists (__DIR__ . '/config.inc.local.php')) {
    require __DIR__ . '/config.inc.local.php';
}
