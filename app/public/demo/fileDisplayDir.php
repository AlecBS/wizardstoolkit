<?php
$gloLoginRequired = false;
define('_RootPATH', '../');
require('../wtk/wtkLogin.php');

$pgHtm  = '<h4>File Display Demo</h4><br>' . "\n";
$pgHtm .= wtkFormHidden('HasImage', 'Y');

$pgPDFs  = wtkReadDir('.','pdf');    // current folder and all subfolders
$pgFiles = wtkReadDir('.', 'image'); // current folder and all subfolders
//$pgFiles = wtkReadDir('pets', 'image'); // can limit to single subfolder
$pgVideos = wtkReadDir('.', 'video');
$pgAllFiles = array_merge_recursive($pgFiles, $pgPDFs, $pgVideos);

$pgHtm .= wtkFileDisplay($pgAllFiles, 'Y'); // remove last parameter to let it pick optimal
//$pgHtm .= wtkFileDisplay($pgAllFiles, 'Y', 3); // remove last parameter to let it pick optimal

wtkProtoType($pgHtm);
wtkSearchReplace('wtkDark.css','wtkLight.css'); // change from Dark to Light Mode
wtkSearchReplace('m4 offset-m4 s12','m10 offset-m1 s12'); // for minibox adjustment
wtkMergePage($pgHtm, 'File Display', '../wtk/htm/minibox.htm');
?>
