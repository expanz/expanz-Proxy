<?PHP

// Dead Simple PHP POST proxy
// author: Adam Tait (http://about.me/adamtait)
// ############################################################################

   $url = $_POST['url'];
   
   $ch = curl_init( $url );
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   if( isset( $_POST['data'] ) ){
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));

      $data = str_replace( '\"', '"', $_POST['data'] );
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data );
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
   } 
   $response = curl_exec( $ch );
   curl_close( $ch );

   print $response;

?>
