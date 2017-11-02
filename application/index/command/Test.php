<?php
namespace app\index\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class Test extends Command
{
    protected function configure()
    {
        $this->setName('test')->setDescription('This is test');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln("my name is xiaolizi");
    }
}