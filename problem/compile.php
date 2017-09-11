<?php
        $CC="gcc";
        $out="./a.out";
        $code=$_POST["code"];
        $input=$_POST["input"];
        $filename_code="main.c";
        $filename_in="input.txt";
        $filename_error="error.txt";
        $executable="a.out";
        $command=$CC." -lm ".$filename_code;
        $command_error=$command." 2>".$filename_error;

        $file_code=fopen($filename_code,"w+");
        fwrite($file_code,$code);
        fclose($file_code);
        $file_in=fopen($filename_in,"w+");
        fwrite($file_in,$input);
        fclose($file_in);
        exec("chmod 777 $executable");
        exec("chmod 777 $filename_error");
        shell_exec($command_error);
        $error=file_get_contents($filename_error);

        if(trim($error)=="")
        {
                if(trim($input)=="")
                {
                        $output=shell_exec($out);
                }
                else
                {
                        $out=$out." < ".$filename_in;
                        $output=shell_exec($out);
                }
                echo "$output";
        }
        else if(!strpos($error,"error"))
        {
                echo "$error";
                if(trim($input)=="")
                {
                        $output=shell_exec($out);
                }
                else
                {
                        $out=$out." < ".$filename_in;
                        $output=shell_exec($out);
                }
                echo "$output";
        }
        else
        {
                echo "$error";
        }
        exec("rm $filename_code");
        exec("rm *.txt");
        exec("rm $executable");
?>
