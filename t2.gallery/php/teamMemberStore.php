<?php
   if(isset($_POST['team_members'])){
   	/*$xmlfileName = $_POST['xmlfileName'];*/
   	$memberName = $_POST['memberName'];
   	$memberRole = $_POST['memberRole'];
   	$profPic = $_POST['profPic'];
      $infoHeading = $_POST['infoHeading'];
      $infoDesc = $_POST['infoDesc'];
   	$xml_dec = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";

/* After gathering all data from the form then, I created a variable to hold all the data entered by
user in string format.  */
      $rootELementStart = "<member>";
      $rootElementEnd = "</member>";
      $xml_doc=  $xml_dec;
      $xml_doc .=  $rootELementStart;
      $xml_doc .=  "<membername>";
      $xml_doc .=  $memberName;
      $xml_doc .=  "</membername>";
      $xml_doc .=  "<memberrole>";
      $xml_doc .=  $memberRole;
      $xml_doc .=  "</memberrole>";
      $xml_doc .=  "<profPic>";
      $xml_doc .=  $profPic;
      $xml_doc .=  "</profPic>";
      $xml_doc .=  "<infoHeading>";
      $xml_doc .=  $infoHeading;
      $xml_doc .=  "</infoHeading>";
      $xml_doc .=  "<infoDesc>";
      $xml_doc .=  $infoDesc;
      $xml_doc .=  "</infoDesc>";
      $xml_doc .=  $rootElementEnd;
      $default_dir = "/datastore/";
      $default_dir .=   "team_memebers.xml";
      /*Here I have taken default directory as xml_files directory.
      After creating string representation of member data, I have used following PHP script to store in the file */
      $fp = fopen($default_dir,'w');
      $write = fwrite($fp,$xml_doc);
      echo "member Data Posted";
   }
?>