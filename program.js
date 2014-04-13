// Программа автоматической корректировки текста

var text_source = "";
var find_field = "";
var text_valid = "";
var find_field_valid = "";

// Функция перевода фокуса на основное поле
function focus_main_field(){
  document.getElementById("text_main_field").focus();
};

// Функция перевода фокуса на кнопку инициализации
function focus_key(){
  getElementById("key_rezult").focus();
};
  

// Функция загрузка значений из форм
function load_data(){
  text_source = document.getElementById("text_main_field").value;
  find_field = document.getElementById("text_list_field").value;
};

// Функция выгрузки результата в форму
function show_result(result_str){
  document.getElementById("text_main_field").value = result_str;
};

// Функция валидации данных с форм
function validator(){

  var str_buff = "";

  var sub_find = "\n";
  var sub_replace = "*";

  str_buff = find_field.split("\r").join("");

  find_field_valid = str_buff.split(sub_find).join(sub_replace);
};

// Библиотека кросплатформенного Ajax'a
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
};

// Функция выполнения запроса к процессору приложения
function query_init(){
  var xmlhttp = getXmlHttp();
  var params = 'text=' + text_source + '&fix_list=' + find_field_valid;
  xmlhttp.open('POST', 'processor.php', true);
  xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4){
      if(xmlhttp.status == 200){
        show_result(xmlhttp.responseText);
      };
    };
  };
  xmlhttp.send(params);
};

// Функция инициализации
function init_process(){
  load_data();
  validator();
  query_init();
};

document.getElementById("key_rezult").onclick = function(){
  init_process();
  focus_main_field();
};

window.onload = function(){
  focus_main_field();
};

