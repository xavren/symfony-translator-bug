<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        parent::__construct();
        $this->translator = $translator;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->translator->trans('test', ['name' => 'World']));
        $output->writeln($this->translator->trans('test', ['name' => 'World'], 'messages+intl-icu'));
        $output->writeln($this->translator->trans('test', ['name' => 'World'], 'messages'));

        return 0;
    }
}
