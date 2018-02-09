<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\MarkingStore\SingleStateMarkingStore;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

class TestToto extends Command
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
            ->setName('test-toto')
            ->setDescription('testProcess');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $definitionBuilder = new DefinitionBuilder();
        $definition = $definitionBuilder->addPlaces(['draft', 'review', 'rejected', 'published'])
            // Transitions are defined with a unique name, an origin place and a destination place
            ->addTransition(new Transition('to_review', 'draft', 'review'))
            ->addTransition(new Transition('publish', 'review', 'published'))
            ->addTransition(new Transition('reject', 'review', 'rejected'))
            ->build()
        ;

        $marking = new SingleStateMarkingStore('currentState');
        $workflow = new Workflow($definition, $marking);
    }
}
