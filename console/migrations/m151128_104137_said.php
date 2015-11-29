<?php

use yii\db\Schema;
use yii\db\Migration;

class m151128_104137_said extends Migration
{

    public function up()
    {
        $said_comment = '{{%said_comment}}';
        $said_time    ='{{%said}}';
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $said_tag='{{%said_tag}}';
        //said_time
        $this->createTable($said_time, [
            'id' => Schema::TYPE_PK,
            //'post_meta_id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '版块ID'",
            'user_id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '作者ID'",
            'title' => Schema::TYPE_STRING . " NOT NULL COMMENT '标题'",
            'author' => Schema::TYPE_STRING . "(100) DEFAULT NULL COMMENT '作者'",
            'excerpt' => Schema::TYPE_STRING . " DEFAULT NULL COMMENT '摘要'",
            'image' => Schema::TYPE_STRING . " DEFAULT NULL COMMENT '封面图片'",
            'content' => Schema::TYPE_TEXT . " NOT NULL COMMENT '内容'",
            'tags' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '标签 用英文逗号隔开'",
            'view_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '查看数'",
            'comment_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论数'",
            'favorite_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '收藏数'",
            'like_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '喜欢数'",
            'thanks_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '感谢数'",
            'hate_count' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '讨厌数'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '1' COMMENT '状态 1:发布 0：草稿'",
            'order' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '999' COMMENT '排序 0最大'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'",
        ],$tableOptions);
       // $this->createIndex('post_meta_id', $tableName, 'post_meta_id');
        $this->createIndex('tags',$said_time, 'tags');
        $this->createIndex('user_id',$said_time, 'user_id');
        //Pk need?
        //$this->addForeignKey('FK_said_comment', '{{%said}}', 'catalog_id', '{{%blog_catalog}}', 'id', 'CASCADE', 'CASCADE');
        //$this->addForeignKey('FK_said_user', $said_time, 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        //comment
        $this->createTable($said_comment, [
            'id' => Schema::TYPE_PK,
            //'parent' => Schema::TYPE_INTEGER . " UNSIGNED DEFAULT NULL COMMENT '父级评论'",
            'said_id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL COMMENT '文章ID'",
            'comment' => Schema::TYPE_TEXT . " NOT NULL COMMENT '评论'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '1' COMMENT '1为正常 0为禁用'",
            'user_id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL COMMENT '用户ID'",
            'to_user_id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL COMMENT 'to用户ID'",
            //'ip' => Schema::TYPE_STRING . " NOT NULL COMMENT '评论者ip地址'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
        ], $tableOptions);
        $this->createIndex('said_id', $said_comment, 'said_id');
        $this->createIndex('user_id', $said_comment, 'user_id');
        $this->createIndex('to_user_id', $said_comment, 'to_user_id');
        //Fk
        //$this->addForeignKey('FK_said_comment', $said_comment, 'said_id', $said_time, 'id', 'CASCADE', 'CASCADE');

        // table blog_tag
        $this->createTable(
            $said_tag,
            [
                'id' => Schema::TYPE_PK,
                'name' => Schema::TYPE_STRING . '(128) NOT NULL',
                'frequency' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
            ],
            $tableOptions
        );




    }

    public function down()
    {
        echo "m151128_104137_said cannot be reverted.\n";
        $this->dropTable('{{%post_comment}}');
        $this->dropTable('{{%said}}');
        $this->dropTable('{{%blog_tag}}');

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
