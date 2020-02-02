<?php
    include_once('curl_query.php');
    include_once('simple_html_dom.php');
     echo date('l jS \of F Y h:i:s A'). "<br>";
    $session_img_num = 1;

// функция транслитеоации
    function translit($d)
    {
        $d = (string) $d; // преобразуем в строковое значение
        $d = strip_tags($d); // убираем HTML-теги
        $d = str_replace(array("\n", "\r"), " ", $d); // убираем перевод каретки
        $d = preg_replace("/\s+/", ' ', $d); // удаляем повторяющие пробелы
        $d = trim($d); // убираем пробелы в начале и конце строки
        $d = strtr($d, array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'j',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ы' => 'y',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            'ъ' => '',
            'ь' => '',
            'А' => 'a',
            'Б' => 'b',
            'В' => 'v',
            'Г' => 'g',
            'Д' => 'd',
            'Е' => 'e',
            'Ё' => 'e',
            'Ж' => 'j',
            'З' => 'z',
            'И' => 'i',
            'Й' => 'y',
            'К' => 'k',
            'Л' => 'l',
            'М' => 'm',
            'Н' => 'n',
            'О' => 'o',
            'П' => 'p',
            'Р' => 'r',
            'С' => 's',
            'Т' => 't',
            'У' => 'u',
            'Ф' => 'f',
            'Х' => 'h',
            'Ц' => 'c',
            'Ч' => 'ch',
            'Ш' => 'sh',
            'Щ' => 'shch',
            'Ы' => 'y',
            'Э' => 'e',
            'Ю' => 'yu',
            'Я' => 'ya',
            'Ь' => '',
            'Ъ' => ''
        ));
        $d = preg_replace("/[^0-9a-z-_ ]/i", "", $d); // очищаем строку от недопустимых символов
        $d = str_replace(" ", "-", $d); // заменяем пробелы знаком минус
        return $d; // возвращаем результат
    }

//устанавливаем соединение с базой      
    $connection = mysqli_connect('xn--90aiatehnyl.xn--p1ai', a0191289_dandy, u3000sab, a0191289_dandy, 3306); //создаем соединение с бд

    
    $max_product_id_select = mysqli_fetch_all(mysqli_query($connection, "SELECT product_id FROM `oc_order_product` WHERE `order_id` = 28 "));
        foreach ($max_product_id_select as $key => $value) {

            //echo "$key = $value <br>";
            foreach ($value as $ke => $val) {
                //echo 'product_kod = ' . "$ke = $val <br>"; 
                //echo 'product_id= '. $val . "<br>";
                


                $id = 0; 

                $product_kod_select = mysqli_fetch_all(mysqli_query($connection, "SELECT text FROM `oc_product_attribute` WHERE `product_id` = $val "));
                foreach ($product_kod_select as $key => $value) {
                //echo "$key = $value <br>";
                    
                    foreach ($value as $ke => $val) {
                        $id = $id+1;
                        //echo $id . "<br>";
                        if ($id == 4 ) {
                            //echo 'product_kod = ' . "$ke = $val <br>"; 
                            echo 'Штрих код = '. $val . "<br>";            
                            //echo date('l jS \of F Y h:i:s A'). "<br>";
                            }    
                        
                    }
   
                }



                
                

                //echo date('l jS \of F Y h:i:s A'). "<br>";
            }
   
        }

    
    
    

    

   