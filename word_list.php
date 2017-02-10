<?php
  $words = '';
  //If the word list json file exists, just open it
  if (file_exists('word_list.json')) {
    $words = json_decode(file_get_contents('word_list.json'));
  }
  else { //Otherwise we need to process a word list website and create the list file
    $word_url = "http://www.ef.com/english-resources/english-vocabulary/top-1000-words/";
    $wordsite_content = file_get_contents($word_url);
    $start = strpos($wordsite_content, 'a<br />'); //Get position of first word in listing
    if ($start !== false) {
       //length of string to extract is the end index - start index
      $length = strpos($wordsite_content, '</div></div></div>')-$start;
      $words = substr($wordsite_content, $start, $length);
    }
    //split into an array of words
    $words = explode('<br />', $words);

    //Remove leading and trailing whitespace
    for ($i = 0; $i <count($words)-1; $i++){
      $words[$i]=strtolower(trim($words[$i]));

    }
    //Write word list to a json file.
    file_put_contents("word_list.json",json_encode($words));
  }
  $result = ""; //Result will be built up
  if ($_GET) {
    $count = $_GET["word_count"];
    //Set gap between words
    $gap = $_GET["gap_type"];
    $sep = "";
    switch($gap) {
      case "spaces":
        $sep = " ";
        break;
      case "dashes":
        $sep = "-";
        break;
      case "underscores":
        $sep = "_";
        break;
      default:
        $sep = "";
    }

    $numwords=count($words)-1;//number of words in the dictionary

    //Add special character to beginning of result if box checked
    if (isset($_GET["begin_special"])) {
      $specials = array("!","@","#","$","%","^","&","*","~","?");
      $result.=$specials[rand(0,count($specials)-1)];
    }

    for ($i = 0; $i < $count; $i++) {
      $next = rand(0, $numwords-1);
      if ($sep != "") { //If true, then spaces, dashes, or underscores
        if ($i != $count-1){
          $result.=$words[$next].$sep;
        }
        else {
          $result.=$words[$next];
        }
      }
      else { //If here, then format result in camelCase
        if ($i!=0){
          $result.=ucfirst($words[$next]);
        }
        else {
          $result.=$words[$next];
        }
      }
    }
    //Add a random number 0-999 to end if box checked
    if (isset($_GET["end_number"])) {
      $result.=rand(0,999);
    }
  }
?>
