<?

namespace app\data\migrations;

use framework\data\migration;
use framework\utils\logs\logs;

class user extends migration
{
    public function up()
    {
        logs::info('app\datat\migration\user created');

        $this->createTable('users', [
            'id' => 'INT AUTO_INCREMENT',
            'name' => 'VARCHAR(255)',
            'email' => 'VARCHAR(255) UNIQUE',
            'password' => 'VARCHAR(255)',
            'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->addPrimaryKey('users', ['id']);

        logs::info('table created');
    }

    public function down()
    {

        logs::info('app\data\migration\user started');

        $sql = "DROP TABLE IF EXISTS users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        logs::info('table removed');
    }
}
