<?php


namespace App\Command;

use AppBundle\Repository\ChatbotStorageRepository;
use AppBundle\Repository\ProjectRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProgressBarTestCommand extends Command
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
            ->setName('app:test:progressBar')
            ->setDescription('testProgressBar');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "1\n2\n3\n";
        sleep(1);

        $progressBar = new ProgressBar($output, 100);
        $progressBar->setFormat("hello\nworld\n");
        $progressBar->display();
        $progressBar->clear();
        $progressBar->display();
    }
}
