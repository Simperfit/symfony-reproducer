<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ProcessTest extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function configure(): void
    {
        $this
            ->setName('app:test:process')
            ->setDescription('testProcess');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        //This returns an output
        var_dump(shell_exec('ls'));

        $process = new Process('ls');
        $process->mustRun();
        //These return empty strings
        var_dump(
            $process->getOutput(),
            $process->getErrorOutput()
        );

    }
}
