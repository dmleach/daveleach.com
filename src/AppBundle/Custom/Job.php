<?php

namespace AppBundle\Custom;

class Job extends BaseEntity
{
    public function endMonth()
    {
        return ($this->enddate === null ? null : $this->enddate->format("F Y"));
    }

    public function startMonth()
    {
        return ($this->startdate === null? null : $this->startdate->format("F Y"));
    }
}

?>
