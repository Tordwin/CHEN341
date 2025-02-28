<?php
    namespace DB\Tools;
    use DateTime;
    
    const MYCONST1 = "DB\tools\MYCONST1";

    class Foo {
        const MYCONST2 = "DB\tools\MYCONST2";
    
        public function saySomething() {
            echo "Hi Foo! <br />";

            $dt = new \DateTime();
            echo $dt->getTimeStamp()."<br />";
        }

    }