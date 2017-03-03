<?php

interface Stack {
    function push($item);
    function pop();
    function size();
}

class MyStack implements Stack {
        var $stackArray = array();

        function push($item) {
            $this->stackArray[]=$item;
        }

        function pop() {
            return array_pop($this->stackArray);
        }

        function size() {
            return count($this->stackArray);
        }
}

//this is an instanceOf!
function func(Stack $f_stack) {
        return 0;
}

$stack = new MyStack();

echo $stack instanceOf Stack;
echo " ";
echo $stack instanceOf MyStack;


?>
