<?php

namespace AppBundle\Builder;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $Builder, array $Options)
    {
        foreach (\AppBundle\Entity\Message::getFormFields() as $Field) {
            $FieldOptions = array ();

            if (array_key_exists("Label", $Field)) {
                $FieldOptions ["label"] = $Field ["Label"];
            }

            $Builder->add ($Field ["Field"], $Field ["Type"], $FieldOptions);
        }

        $Builder->add("Send", "submit");
        $Builder->setMethod("POST");
    }

    public function getName()
    {
        return "ServiceMessageForm";
    }
}
