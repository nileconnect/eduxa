<?php

use yii\db\Migration;

/**
 * Class m200613_162724_editPages
 */
class m200613_162724_editPages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(2048) NOT NULL,
  `title` varchar(512) NOT NULL,
  `body` text NOT NULL,
  `view` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'about', 'About', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', null, '1', '1564754243', '1564754243');
INSERT INTO `page` VALUES ('2', 'how-we-work', 'How we work', 'How we work', null, '1', '1564754243', '1564754243');
INSERT INTO `page` VALUES ('3', 'terms', 'Terms & Policy', 'Terms & Policy', null, '1', '1564754243', '1564754243');
INSERT INTO `page` VALUES ('4', 'privacy', 'Privacy', 'privacy', null, '1', '1564754243', '1564754243');
INSERT INTO `page` VALUES ('5', 'contact', 'Contact', 'contact', null, '1', '1564754243', '1564754243');
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200613_162724_editPages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200613_162724_editPages cannot be reverted.\n";

        return false;
    }
    */
}
