<?php

use yii\db\Schema;
use yii\db\Migration;

class m151113_143531_paper extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%paper}}', [
            'id'=>Schema::TYPE_PK,
            'createdbyid' => Schema::TYPE_STRING,
            'article'=>Schema::TYPE_TEXT,
           // 'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_DATE . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATE . ' NOT NULL',
            //'PRIMARY KEY(id)',
            //'FOREING KEY(createdbyid)  REFERNCES '.user.' (id) ON DELETE CASCADE ON UPDATE CASCADE',
           // 'FOREIGN KEY (createdbyid) REFERENCES ' . $authManager->itemTable . ' (name) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

    }

    public function down()
    {
        //echo "m151113_143531_paper cannot be reverted.\n";

        $this->dropTable('{{%paper}}'); 
        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}



    
