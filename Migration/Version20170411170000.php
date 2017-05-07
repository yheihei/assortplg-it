<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\Filesystem\Filesystem;

class Version20170411170000 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->createPluginTable($schema);
        //$path = '../../../../html' . $config['const']['save_dir'];
        // アソート画像保存用ディレクトリ作成
        //$file = new Filesystem();
        //$file->mkdir($path);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('plg_assort');
        $schema->dropTable('plg_assort_product');
    }
    
    protected function createPluginTable(Schema $schema)
    {
        // assortIDの内容を定義するテーブルを作成
        $table = $schema->createTable("plg_assort");
        $table->addColumn('assort_id', 'integer',
            array('autoincrement' => true));
        $table->addColumn('name', 'text', array('notnull' => false));
        $table->addColumn('image_file_name', 'text', array('notnull' => false));
        $table->setPrimaryKey(array('assort_id'));
        
        // assortIDと商品を紐付けるテーブルを作成
        $table = $schema->createTable("plg_assort_product");
        $table->addColumn('assort_id', 'integer');
        $table->addColumn('product_id', 'integer');
    }
}