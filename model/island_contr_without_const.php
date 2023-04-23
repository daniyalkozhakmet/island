<?php
class IslandContrWithoutConst extends IslandContr
{
    public $island_id;
    public function __construct($island_id)
    {
        $this->island_id = $island_id;
    }
    public function getPreviousIsland()
    {

        return $this->getPreviousIslandDb($this->island_id);
    }
    public function qtyIsland()
    {

        return $this->getQtyIslandDb($this->island_id);
    }
}
