<?php
namespace app\admin\command;
use think\Cache;
use think\console\Command;
use think\console\Input;
use think\console\Output;
/**
 * Created by PhpStorm.
 * Power by Mikkle
 * QQ:776329498
 * Date: 2017/6/12
 * Time: 15:07
 */
class Mikkle extends Command
{
    protected $sleep = 3;
    protected function configure()
    {
        $this->setName('mikkle')->setDescription('Here is the mikkle\'s command ');
    }

    protected function execute(Input $input, Output $output)
    {

        while(true){
            $output->writeln(json_encode($this->checkDo()));
            sleep($this->sleep);
        }


    }

    protected function checkDo(){
        $state = false;
        $int = Cache::inc("Command",1);
        
        //这里根据查询的缓存内容 或者时间 写你的逻辑代码
        //----------------
        //   you code
        //--------------
        
        return $int;
    }



}