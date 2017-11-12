<?php


namespace App\Command;

use AppBundle\Repository\ChatbotStorageRepository;
use AppBundle\Repository\ProjectRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Debug\Debug;

class DebugTestCommand extends Command
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
            ->setName('app:test:debug')
            ->setDescription('testProgressBar');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        Debug::enable();
        $a = new \stdClass();
        $a->foo = 'bar';
        var_export($a['foo']);

    }
}
