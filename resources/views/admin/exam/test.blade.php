<?php

$myfile = fopen("test.blade.php", "w") or die("unable to open file!");
$txt = "@extends('default')\n";
fwrite($myfile, $txt);
$txt = "@section('header1')\n";
fwrite($myfile, $txt);
    $txt = "<meta name=\"description\" content=\"Chantos eschool\" />\n";
fwrite($myfile, $txt);
	$txt = "<title>Best responsive ecommerce web application developers in english and espanol</title>\n";
fwrite($myfile, $txt);
  
$txt = "@endsection\n";
fwrite($myfile, $txt);

$txt = "@section('content')\n";
fwrite($myfile, $txt);
  $txt = "<div class=\"panel-body\"> <table class=\"table table-bordered\">\n";
fwrite($myfile, $txt);
      $txt = "<thead>\n";
fwrite($myfile, $txt);
        $txt = "<tr>\n";
fwrite($myfile, $txt);
      $txt = "<th>#</th>\n";
fwrite($myfile, $txt);
         $txt = " <th>UserNames</th>\n";
fwrite($myfile, $txt);
          $txt = "<th>Regno</th>\n";
fwrite($myfile, $txt);
    $txt = "{{@foreach($subject as $s)}}";
fwrite($myfile, $txt);
          $txt = "<th>{{$s -> name}}</th>\n";
fwrite($myfile, $txt);
       $txt = "@endforeach \n";
fwrite($myfile, $txt);
        $txt = "</tr> \n";
fwrite($myfile, $txt);
      $txt = "</thead>\n";
fwrite($myfile, $txt);
      $txt = "<tbody>\n";
fwrite($myfile, $txt);
    $txt = '@foreach ($results as $r)';
fwrite($myfile, $txt);
       $txt = "\n <tr>\n";
fwrite($myfile, $txt);
        $txt = '<td>{{$s -> username}}</td>';
fwrite($myfile, $txt);
       $txt = "\n";
fwrite($myfile, $txt);
        $txt = '<td>{{$s -> regno}}</td>';
fwrite($myfile, $txt);
       $txt = "\n";
fwrite($myfile, $txt);
           $txt = '@foreach($subject as $s)';
fwrite($myfile, $txt);
          $txt = '<td>{{$r ->';
fwrite($myfile, $txt);
       $txt = "\n";
fwrite($myfile, $txt);

          $txt = '{{$s -> name}}}}';
fwrite($myfile, $txt);
       $txt = "\n";
fwrite($myfile, $txt);

       $txt = "</td>\n";
fwrite($myfile, $txt);
            $txt = " @endforeach\n";
fwrite($myfile, $txt);
        $txt = "</tr>\n";
fwrite($myfile, $txt);
     $txt = "@endforeach\n";
fwrite($myfile, $txt);
      $txt = "</tbody>\n";
fwrite($myfile, $txt);
    $txt = "</table>\n";
fwrite($myfile, $txt);
$txt = "</div>\n";
fwrite($myfile, $txt);
$txt = "@endsection\n";
fwrite($myfile, $txt);
?>