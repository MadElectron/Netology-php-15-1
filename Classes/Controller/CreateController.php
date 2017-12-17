<?php 
    
namespace Controller;

use \Controller\Controller;

class CreateController extends Controller 
{
    private $columnsCount = 4;

    public function __construct($pdo)
    {
        parent::__construct($pdo);

        $columnsCount = 4;
        $isCreated = $_POST['create'] ?? '';
        $tabName = $_POST['table_name'] ?? '';

        if($isCreated && $tabName) {
            $columns = [];

            for($i = 0; $i < $columnsCount; $i++) {
                $columnName = $_POST['name'.$i] ?? '';

                if($columnName) {
                    $columns[] = [
                        'name' => $columnName,
                        'key' => $_POST['key'.$i] ?? '',
                        'type' => $_POST['type'.$i] ?? '',
                        'value' => $_POST['type_value'.$i] ?? '',
                        'nullable' => $_POST['nullable'.$i] ?? '',
                    ];
                }
            }

            if($columns) {
                $this->db->createTable($tabName, $columns);
                header("Location:index.php");
            }
        }
    }

    public function getColumnsCount()
    {
        return $this->columnsCount;
    }

    public function setColumnsCount($columnsCount)
    {
        $this->columnsCount = $columnsCount;

        return $this;
    }    
}