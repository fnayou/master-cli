<?php
/**
 * This file is part of the MasterCli package.
 *
 * Copyright (c) 2016. Aymen FNAYOU <fnayou.aymen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class HelloWorldCommand.
 */
class HelloWorldCommand extends Command
{
    /**
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    protected $style;

    /**
     * {@inheritdoc}
     *
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->setName('acme:hello-world')
            ->setDescription('simple hello world command')
            ->setHelp(
                <<<'EOT'
will output a hello world messages 
EOT
            );
    }

    /**
     * {@inheritdoc}
     *
     * @see \Symfony\Component\Console\Command\Command::initialize()
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->style = new SymfonyStyle($input, $output);

        $this->style->title('Hello World MasterCli');
    }

    /**
     * {@inheritdoc}
     *
     * @see \Symfony\Component\Console\Command\Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Slave\Application $application */
        $application = $this->getApplication();
        /** @var \Slave\Utils\Bag $bag */
        $bag = $application->getBag();

        $this->style->text('to add new command just create a class suffixed with "<info>Command</info>" within any "<info>src/XXX/Command</info>" directory');
        $this->style->newLine(1);

        $this->style->text(sprintf(
            '<info>%s</info> is the value of parameter <info>something</info> defined in app/config.yml by using "<info>$application->getBag()->getParameter(\'parameters.something\')</info>"',
            $bag->getParameter('parameters.something')
        ));
        $this->style->newLine(1);
        $this->style->text('you can log message by using "<info>$application->getService(\'logger\')->addDebug(\'logged message\')</info>"');
    }
}
