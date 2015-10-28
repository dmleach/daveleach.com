<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\User;

class UserAddCommand extends ContainerAwareCommand
{
    const ARG_USERNAME = "username";
    const ARG_PASSWORD = "password";

    protected function configure()
    {
        $this->setName("user:add");
        $this->setDescription("Add website user");
        $this->addArgument(self::ARG_USERNAME, InputArgument::REQUIRED, "Username");
        $this->addArgument(self::ARG_PASSWORD, InputArgument::REQUIRED, "Password");
    }

    protected function execute(InputInterface $Input, OutputInterface $Output)
    {
        $Container = $this->getContainer();
        $Doctrine = $Container->get("doctrine");
        $EntityManager = $Doctrine->getEntityManager();

        // ENCODING THE PASSWORD, WHICH SEEMS LIKE IT SHOULD BE DONE IN THE USER
        // ENTITY INSTEAD
        // $factory = $this->getContainer()->get('security.encoder_factory');
        // $encoder = $factory->getEncoder($user);
        // $encodedPassword = $encoder->encodePassword($password, $user->getSalt());

        $User = new User();
        $User->setUsername($Input->getArgument(self::ARG_USERNAME));
        $User->setPassword($Input->getArgument(self::ARG_PASSWORD));

        $EntityManager->persist($User);
        $EntityManager->flush();

        $Output->writeln("Added user {$User->getUsername()}");
    }
}
