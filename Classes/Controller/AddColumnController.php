<?php 
namespace Controller;

use \Controller\Controller;

class AddColumnController extends Controller 
{
    private $tabName;

    public function __construct($pdo)
    {
        parent::__construct($pdo);

        $this->setTabName($_GET['table'] ?? '');

        if(!in_array($this->tabName, array_column($this->db->showTables(),0))) {
            echo "Таблицы {$this->tabName} не существует!";
            exit;
        }

        $addColumn = $_POST['add_column'] ?? '';

        $name = $_POST['name'] ?? '';
        $type = $_POST['type'] ?? '';
        $value = $_POST['type_value'] ?? '';
        $nullable = $_POST['nullable'] ?? '';

        if ($addColumn && $name) {
            $this->db->addColumn($this->tabName, $name, $type, $value, $nullable);
            header("Location:table.php?table=".$this->tabName);
        }
    }

    public function getTabName()
    {
        return $this->tabName;
    }

    public function setTabName($tabName)
    {
        $this->tabName = $tabName;

        return $this;
    }    
}