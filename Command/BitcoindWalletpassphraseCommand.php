<?php

namespace Matrunchyk\Bundle\BitcoindBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BitcoindWalletpassphraseCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bitcoind:walletpassphrase')
            ->setDescription('')
            ->setDefinition(array(
            ))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $bitcoind  = $container->get('bitcoind');
    }

}


