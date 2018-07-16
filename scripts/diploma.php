<?php
    require_once ( "text-on-image.php" );

    class Diploma {
        /**Диплом 1 степени */
        const TYPE_DIPLOMA_1         = 1;

        /**Диплом 2 степени */
        const TYPE_DIPLOMA_2         = 2;

        /**Диплом 3 степени */
        const TYPE_DIPLOMA_3         = 3;

        /**Сертификат участника */
        const TYPE_SERTIFICATE       = 4;

        /**Благодарственное письмо школе */
        const TYPE_THANKS_SCHOOL     = 5;

        /**Благодарственное письмо учителю - организатору */
        const TYPE_THANKS_TEACHER    = 6;

        /**Благодарственное письмо за подготовку призера */
        const TYPE_THANKS_FOR_WINNER = 7;

        /**Параметры */
        const X              = 'x';
        const Y              = 'y';
        const IS_CENTER_X    = 'isCenterX';
        const IS_CENTER_Y    = 'isCenterY';

        private $rootDirectory  = false;
        private $font           = "fonts/Firasansmedium.ttf";
        private $fontSize       = 40;
        private $fontColor      = "#383838";

        /**
         * rootSiteDirectory - Корневая папка сайта
         */
        public function __construct ( $rootSiteDirectory ) {
            $this->rootDirectory = $rootSiteDirectory;
        }

        /**
         * Получить диплом
         */
        public function diploma (
            $filePath,  // Адрес исходой картинки, FALSE если берем по умолчанию
            $savePath,  // Куда сохранять; путь от КОРНЕВОЙ ДИРЕКТОРИИ САЙТА
            $values,    // Значения для заполнения
            $type       // Тип бланка - TYPE_DIPLOMA_1, TYPE_DIPLOMA_2 и т.д.
        ) {
            // Если среди настроек нет запрошеной или количество полей для
            // вывода превышает максимально возможное для этого бланка, то
            // не можем выполнить операцию
            if ( !isset( $this->settings[ $type ] ) or
                count( $this->settings[ $type] ) < count( $values ) ) return false;

            //Получаем путь по умолчанию, если надо
            if ( $filePath == FALSE ) {
                $filePath = $this->getPath ( $type );
            }

            $settings = $this->settings[$type];

            //Создаем объект картинки
            $img = new TextOnImage($filePath);
            //Если не удалось создать
            if ( !$img ) return false;
            $img->setFont ( $this->getFont(), $this->getFontSize(), $this->getFontColor() );

            //Заполняем
            for ( $i = 0; $i < count($values); $i++ ) {
                //Это для % в сертификате
                if( $type == self::TYPE_SERTIFICATE and $i == 3 ) {
                    $img->setFontSize( 120 );
                    $img->setColor( "#E88178" );
                }
                $img->write ( 
                    $settings   [$i][self::X],
                    $settings   [$i][self::Y],
                    $values     [$i],
                    $settings   [$i][self::IS_CENTER_X],
                    $settings   [$i][self::IS_CENTER_Y]
                );
                if( $type == self::TYPE_SERTIFICATE and $i == 3 ) {
                    $img->setFontSize( $this->getFontSize() );
                    $img->setColor( $this->getFontColor );
                }
            }

            //Выводим
            $img->output ( $this->rootDirectory . "/" . $savePath );
        }

        public function getFont () {
            return $this->rootDirectory . "/" . $this->font;
        }

        public function getFontColor () {
            return $this->fontColor;
        }

        public function getFontSize () {
            return $this->fontSize;
        }

        private function getPath ( $type ) {
            return $this->rootDirectory . "/" . $this->ways[ $type ];
        }

        /**
         * Пути к файлам по умолчанию, от корневой директории
         */
        private $ways = array (
            self::TYPE_DIPLOMA_1          => "images/diploma/1.jpg",
            self::TYPE_DIPLOMA_2          => "images/diploma/2.jpg",
            self::TYPE_DIPLOMA_3          => "images/diploma/3.jpg",
            self::TYPE_SERTIFICATE        => "images/diploma/4.jpg",
            self::TYPE_THANKS_FOR_WINNER  => "images/diploma/5.jpg",
            self::TYPE_THANKS_SCHOOL      => "images/diploma/6.jpg",
            self::TYPE_THANKS_TEACHER     => "images/diploma/7.jpg"
        );

        /** Настройки: X, Y, необходимость центровать по X, необходимость центровать по Y */
        private $settings = array (
            self::TYPE_DIPLOMA_1 => array (
                //Имя
                array (
                    self::X           => 1230,
                    self::Y           => 1480,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город, ОУ
                array (
                    self::X           => 1230,
                    self::Y           => 1675,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Конкурс
                array (
                    self::X           => 1230,
                    self::Y           => 1880,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            ),

            self::TYPE_DIPLOMA_2 => array (
                //Имя
                array (
                    self::X           => 1230,
                    self::Y           => 1500,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город, ОУ
                array (
                    self::X           => 1230,
                    self::Y           => 1697,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Конкурс
                array (
                    self::X           => 1230,
                    self::Y           => 1900,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            ),

            self::TYPE_DIPLOMA_3 => array (
                //Имя
                array (
                    self::X           => 1230,
                    self::Y           => 1450,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город, ОУ
                array (
                    self::X           => 1230,
                    self::Y           => 1645,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Конкурс
                array (
                    self::X           => 1230,
                    self::Y           => 1850,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            ),

            self::TYPE_SERTIFICATE => array (
                //Имя
                array (
                    self::X           => 180,
                    self::Y           => 780,
                    self::IS_CENTER_X => false,
                    self::IS_CENTER_Y => false
                ),
                //Школа, класс
                array (
                    self::X           => 180,
                    self::Y           => 940,
                    self::IS_CENTER_X => false,
                    self::IS_CENTER_Y => false
                ),
                //Конкурс
                array (
                    self::X           => 180,
                    self::Y           => 1092,
                    self::IS_CENTER_X => false,
                    self::IS_CENTER_Y => false
                ),
                //% баллов
                array (
                    self::X           => 1660,
                    self::Y           => 1560,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => true
                )
            ),
            
            self::TYPE_THANKS_SCHOOL => array (
                //ОУ
                array (
                    self::X           => 1300,
                    self::Y           => 1770,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город
                array (
                    self::X           => 1300,
                    self::Y           => 2015,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            ),
            
            self::TYPE_THANKS_TEACHER => array (
                //ОУ
                array (
                    self::X           => 1250,
                    self::Y           => 1475,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город
                array (
                    self::X           => 1250,
                    self::Y           => 1715,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            ),
            
            self::TYPE_THANKS_FOR_WINNER => array (
                //ОУ
                array (
                    self::X           => 1215,
                    self::Y           => 1540,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                ),
                //Город
                array (
                    self::X           => 1215,
                    self::Y           => 1747,
                    self::IS_CENTER_X => true,
                    self::IS_CENTER_Y => false
                )
            )
        );
    }
?>