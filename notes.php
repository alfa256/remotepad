<?php
/*
Copyright (c) 2012 Consebola, Alfredo.

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

//settings
$tags = array("links", "notes", "snippet", "funny"); //categories to use with strict on
$username = 'Somebody'; //owner
$strict = 0; // strict is 1
?>

<html>
<style>
@font-face {
	font-family: Museo;
	src: url("./fonts/Museo300-Regular.otf") format("opentype");
}

body{
	color: #666;
	font-family: Calibri, sans-serif;
	text-shadow: 0px 1px 0px #ccc;
}
h1
{
font-family: "Museo";
color: white; 
text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff00de, 0 0 70px #ff00de, 0 0 80px #ff00de, 0 0 100px #ff00de, 0 0 150px #ff00de;
font-size: 60;
}
h2 {
font-family:Museo, sans-serif;
text-shadow: 0 0 10px #00ff00,
             0 0 20px #00ff00,
             0 0 30px #00ff00,
              0 0 40px #00ff00,
              0 0 70px #00ff00,
              0 0 80px #00ff00,
             0 0 100px #00ff00,
             0 0 150px #00ff00;
color: black;
}
body{ background-color: #000000;}



</style>
<?php

echo "<head><title>{$username}'s notes</title><meta charset=\"UTF-8\"></head><body>";
	if( preg_match('/([a-zA-Z]+)<(.+)/', $_GET['add'], $results))
	{
		
		if(in_array($results[1],$tags))
		{
			$myFile = $results[1] . ".txt";
			$fh = fopen($myFile, 'a') or die("Can't open file, some server error.");
			$stringData = "@". date("F j, Y, g:i a") . " -from:{$_SERVER['REMOTE_ADDR']}- ::\n" . $results[2] . "\n";
			fwrite($fh, $stringData);
			fclose($fh);
			echo "<p>Your entry @". $results[1] . " is : " . $results[2] . "<br/> And it was stored successfully</p>";
		}
		elseif($strict != 1)
		{
			$myFile = $results[1] . ".txt";
			$fh = fopen($myFile, 'a') or die("Can't open file, some server error.");
			$stringData = "<u>@". date("F j, Y, g:i a") ." -from:{$_SERVER['REMOTE_ADDR']}- ::</u>\n" . $results[2] . "\n";
			fwrite($fh, $stringData);
			fclose($fh);
			echo "<p>Your entry @ new category ". $results[1] . " is : " . $results[2] . "<br/> And it was stored successfully</p>";
		}
		else
		{
			echo "<p>CATEGORY " . $results[1] . " NOT FOUND.</p>";
		}
	}
	elseif (preg_match('/([a-zA-Z]+)>$/', $_GET['add'], $results)) {
		if(in_array($results[1],$tags)){
		        echo "<h1 style=\"text-align: center;\">{$username}'s notes @<u>" . $results[1] . "</u></h1>";
			$data = file_get_contents($results[1] . ".txt");
			$data = str_replace("\n", "</p>\n<p>", '<p>'.$data.'</p>');
			echo $data;
		}
		elseif($strict != 1)
		{
			echo "<h1 style=\"text-align: center;\">{$username} notes @<u>" . $results[1] . "</u></h1>";
			$data = file_get_contents($results[1] . ".txt");
			$data = str_replace("\n", "</p>\n<p>", '<p>'.$data.'</p>');
			echo $data;
		}
		else
		{
			echo "<p>CATEGORY ". $results[1] . " NOT FOUND.</p>";
		}
	}
	echo "TAGS:<br/>";
	foreach ($tags as $key => $value) {
	        echo "<a href=\"notes.php?add=$value>\">{$value}</a><br/>";
	}
?>
<div style="text-align: center;" ><p>End of line.</p></div>
<div style="text-align: center;"><p>©2013 Alfredo Consebola </p></div>
</body>
</html>
