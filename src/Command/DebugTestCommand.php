<?php


namespace App\Command;

use AppBundle\Repository\ChatbotStorageRepository;
use AppBundle\Repository\ProjectRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\DependencyInjection\ExpressionLanguage;

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
        $sf = new SymfonyStyle($input, $output);
        var_dump($sf->choice( 'Please select your favorite colors (defaults to red and blue)',
            array('red', 'blue', 'yellow'),
            'red'));
    }
}
