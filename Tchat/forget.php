<?php

require_once('config.php');
require_once('incl/main.php');

neutral_dbconnect(); $settings=get_settings();
if(isset($_COOKIE[$xcookie_dn_mode[0]]) && $_COOKIE[$xcookie_dn_mode[0]] === '0'){$settings['style_delivery']=$mode0css;$settings['tinting_c']='#241f31';$settings['tinting_o']='#fff';}
if(isset($_COOKIE[$xcookie_dn_mode[0]]) && $_COOKIE[$xcookie_dn_mode[0]] === '1'){$settings['style_delivery']=$mode1css;$settings['tinting_c']='#000000';$settings['tinting_o']='#000';}

get_language(); 
if(function_exists('customphp')){customphp();} 
if($settings['dfg_on']!=='1'){redirect('index.php');die();}

if(isset($_COOKIE[$xcookie_uidhash[0]])){ require_once 'incl/cookieauth.php'; } else{ redirect('account.php');die(); }
if(!isset($xuser['id'])){print '...';die();}

if(isset($_GET['delete'])){
$uid=(int)$xuser['id'];
if($uid>1){

$res=neutral_query('SELECT image FROM '.$dbss['prfx']."_uxtra WHERE id=$uid");
while($row=neutral_fetch_array($res)){if($row['image']!='' && strpos($row['image'],$xpath_at_dir)===0){@unlink($row['image']);}}

neutral_query('DELETE FROM '.$dbss['prfx']."_users WHERE id=$uid");
neutral_query('DELETE FROM '.$dbss['prfx']."_social WHERE userid=$uid");
neutral_query('DELETE FROM '.$dbss['prfx']."_ufake WHERE id=$uid");
neutral_query('DELETE FROM '.$dbss['prfx']."_geoloc WHERE id=$uid");
neutral_query('DELETE FROM '.$dbss['prfx']."_uxtra WHERE id=$uid");
} redirect('index.php');die(); }

require_once('templates/forget.pxtm'); 

?>