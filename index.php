<?php

// Программа автоматической корректировки текста
$title_str = "";
$title_str_sub = "Пример";


// Список констант
define("PROGRAM_NAME", "Утилита для автоматического форматирования текста");
define("SITE_NAME", "ИТ-Хобби");
$title_str = PROGRAM_NAME;

// Запуск сессии
session_start();


// Функция создания заголовка страницы
function title_create($title_str_sub){
  $title_page = "";

  $title_page = SITE_NAME." / ".PROGRAM_NAME;
  if ( $title_str_sub != "" ){
     $title_page = $title_page." :: ".$title_str_sub;
  };
  return $title_page; 
};

// Генерация документа

$title_str = title_create($title_str_sub);

// Создание заголовка документа
header("Content-Type: text/html; charset=UTF-8");

echo "<!DOCTYPE html>\n";
echo "<html>\n";
echo "  <head>\n";
echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
echo "    <title>\n";
echo "      ".$title_str."\n";
echo "    </title>\n";
echo "    <link href=\"style.css\" rel=\"stylesheet\" media=\"all\" />\n";
echo "  </head>\n";

echo "\n";

// Создание документа
echo "  <body>\n";

echo "  <div class=\"main_block\">\n";

echo "    <div class=\"text_main_field_div\">\n";
echo "      <textarea id=\"text_main_field\" class=\"text_main_field\">".file_get_contents("readme.txt")."</textarea>\n";
echo "    </div>\n";

echo "    <hr>\n";

echo "    <div class=\"text_list_field_div\">\n";
echo "      <textarea id=\"text_list_field\" class=\"text_list_field\">Это рыба.</textarea>\n";
echo "      <div class=\"key_rezult\" id=\"key_rezult\">Обработать</div>\n";
echo "    </div>\n";
echo "    <div style=\"clear: both; margin-bottom: 15px\"></div>\n";

echo "    <hr>\n";

/*

echo "    <div class=\"parametrs\" id=\"parametrs\">\n";
echo "    </div>\n";

echo "    <hr>\n";

*/

echo "    <div class=\"info\">\n";

echo "      <p>\n";
echo "        <a href=\"http://validator.w3.org/check?uri=referer\" title=\"Valid HTML 5.0\">
                <img
                  style=\"border: 0px; width: 88px; height: 31px\"
                  src=\"images/w3c-valid-html5.png\"
                  alt=\"Valid HTML 5.0\"></a>\n";

echo "        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\n";

echo "        <a href=\"http://jigsaw.w3.org/css-validator/check/referer\" title=\"Правильный CSS!\">
                <img
                  style=\"border: 0px; width: 88px; height: 31px\"
                  src=\"http://jigsaw.w3.org/css-validator/images/vcss\"
                  alt=\"Правильный CSS!\"></a>\n";

echo "      </p>\n";

echo "      <p style=\"color: #70709F; margin-top: 25px; text-shadow: 0px 0px 0px black, 0 0 1em #5555DD\">\n";
echo "        TextCorrector &copy; 2014\n";
echo "      </p>\n";

echo "    </div>\n";

echo "  </div>\n";

echo "  <script src=\"program.js\" type=\"text/javascript\"></script>\n";

echo "  </body>\n";
echo "</html>\n";





?>
