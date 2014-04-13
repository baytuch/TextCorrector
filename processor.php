<?php

// Процессор

// Объявление переменных
$trig_a = false;
$i = 0;
$n = 0;
$k = 0;
$text_source = "";
$source_list_fix = "";

$str_buff = "";

// Список констант
define("ERROR_MESS", "Ошибка выполнения запроса. Пожалуйста, обратитесь к администратору.");
define("START_DOC", "<!-- html-шаблон «Универсальный». Matrix.ua (c) -->");
define("END_DOC", "<!-- Конец шаблона -->");

// Получение данных от пользователя
if ( isset($_POST['text']) ){
  $text_source = $_POST['text'];
};
if ( isset($_POST['fix_list']) ){
  $source_list_fix = $_POST['fix_list'];
};

// Парсинг списка замены
$array_list = explode("*", $source_list_fix);

// Предкоррекция документа
$i = 0;
$n = 0;
$k = 0;
if ( substr($text_source, 0, strlen(START_DOC)) == START_DOC ){
  $str_buff = substr_replace($text_source, "", 0, 115);
  $str_buff = substr_replace($str_buff, "", strlen($str_buff) - 42);
  $str_buff = str_replace("<br />", "\n", $str_buff);
  $str_buff = strip_tags($str_buff);
  }else{
  $str_buff = trim($text_source);
  $str_buff = strip_tags($str_buff);
};

// Выделение жирным шрифтом указанных слов
$trig_a = false;
$i = 0;
$n = 0;
$k = 0;
$n = count($array_list);
if ( $n > 0 ){
  for ($i = 0; $i < $n; $i++){
    $trig_a = false;
    $k = 0;
    for ( $k = 0; $k < $i; $k++){
      if ( $array_list[$k] ==  $array_list[$i] ){
        $trig_a = true;
      };
    };
    if ( $trig_a == false ){
      $str_buff = str_replace($array_list[$i], "<strong>".$array_list[$i]."</strong>", $str_buff);
    };
  };
};

$str_buff = str_replace("\n", "<br />", $str_buff);



// Вывод данных
header("Content-Type: text/html; charset=UTF-8");

// Создание документа
echo START_DOC."\n\n";
echo "<!-- Тело документа -->\n";

echo "<p>\n";

echo  $str_buff;

echo "\n";
echo "</p>\n\n";

echo END_DOC."\n";

?>
