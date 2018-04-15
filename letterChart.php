<?php
/**
 * Created by IntelliJ IDEA.
 * User: raahil
 * Date: 4/13/2018
 * Time: 2:32 PM
 */
Class letterChart{
    public function decrypt($word){
        //Setting paths
        $py_script = 'C:\\wamp\\www\\apiwork\\singleWord.py';
        $python_path = 'C:\\Users\raahil\\AppData\\Local\\Programs\\Python\\Python36\\python.exe';
        $myDict = array("output" => substr(shell_exec("$python_path $py_script decrypt $word 2>&1"), 0 , -1));

        //Running the python script, and taking the output
        return $myDict;
    }
    public function encrypt($word){
        //Setting paths
        $py_script = 'C:\\wamp\\www\\apiwork\\singleWord.py';
        $python_path = 'C:\\Users\raahil\\AppData\\Local\\Programs\\Python\\Python36\\python.exe';
        //Running the python script, and taking the output
        $myDict = array("output" => substr(shell_exec("$python_path $py_script encrypt $word 2>&1"), 0, -1));

        //Running the python script, and taking the output
        return $myDict;
    }
}