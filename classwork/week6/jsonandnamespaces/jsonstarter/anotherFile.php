<?php
    //require "Foo.php";

    spl_autoload_register(function($class){
        //convert the namespace to full file path if we're using
        //folders to match our namespaces
        //in our case its in the same folder so we strip the namespace info
        var_dump($class);
        $class = substr($class,strrpos($class, '\\')+1).".php";
        require_once($class);
    });

    //use DB\Tools\Foo as SomeFooClass;
    use DB\Tools\Foo;

    //$foo = new Foo();
    $foo = new DB\Tools\Foo();
    //$foo = new SomeFooClass();

    echo DB\Tools\MYCONST1."<br />";
    $foo->saySomething();
    echo $foo::MYCONST2."<br />";
    //  echo Foo::MYCONST2."<br />";
    echo DB\Tools\Foo::MYCONST2."<br />";
?>