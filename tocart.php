<?php   
$xml= new DomDocument;
$xml->Load('links.xml');
$x=$xml->getElementsByTagName('pages')->item(0);//root
$stud=$x->getElementsByTagName('link');//children
session_start();
$itemid=$_SESSION['nam'];
$exist=0;
$found=0;
for($y=0;$y<$stud->length;$y++){
$id1=$stud[$y]->getElementsByTagName("title")->item(0)->nodeValue;
    if($id1==$itemid){
        $name=$stud[$y]->getElementsByTagName("title")->item(0)->nodeValue;
        echo $name;
        $name2=$name;
        $found=1;
break;
    }
}
if($found==1){
$xml= new DomDocument;
$xml->formatOutput=true;
$xml->preserveWhiteSpace=false;
$xml->Load('cart.xml');
$x=$xml->getElementsByTagName('product')->item(0);//root
$stud=$x->getElementsByTagName('products');//children
    }
if($exist==0){
$new_student=$xml->createElement('products');
$new_student->appendChild($xml->createElement('title',$name2));
$xml->getElementsByTagName('product')->item(0)->appendChild($new_student);
$test=$xml->Save('cart.xml');
if($test){    
    echo"<script>alert('sucess fully added')</script>";
  //  header ("refresh:0.1 url=cart.php");
}
}
else{
        echo "<script>alert('value already added')</script>";
 //   header ("refresh:0.1 url=cart.php");
    }
?>