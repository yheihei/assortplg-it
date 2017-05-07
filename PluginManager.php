<?php

namespace Plugin\AssortContent;

use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\Filesystem\Filesystem;

class PluginManager extends AbstractPluginManager
{

    /**
     * @var string コピー元リソースディレクトリ
     */
    private $origin;

    /**
     * @var string コピー先リソースディレクトリ
     */
    private $target;
    
    /**
     * @var string コピー元のコアファイルディレクトリ
     */
    private $core_origin;
    
    /**
     * @var string 対象コアファイルのリスト
     */
    private $core_files;

    public function __construct()
    {
        // コピー元のassetsディレクトリ
        $this->origin = __DIR__.'/Resource/assets';
        // コピー先のassetsディレクトリ
        $this->target = '/AssortContent';
        
        // コピー元のコアファイルディレクトリ
        $this->core_origin = __DIR__.'/Eccube';
        // コアファイルのバックアップディレクトリ
        $this->core_backup = __DIR__.'/backup';
        
        // プラグイン用に置き換えるコアファイルリスト
        $this->core_files = $this->getFileList($this->core_origin);
    }
    
    private function getFileList($dir) {
        $files = scandir($dir);
        $files = array_filter($files, function ($file) {
            return !in_array($file, array('.', '..'));
        });
     
        $list = array();
        foreach ($files as $file) {
            $fullpath = rtrim($dir, '/') . '/' . $file;
            if (is_file($fullpath)) {
                $list[] = $fullpath;
            }
            if (is_dir($fullpath)) {
                $list = array_merge($list, $this->getFileList($fullpath));
            }
        }
     
        return $list;
    }
    
    /**
     * リソースファイル等をコピー
     *
     * @param Application $app
     */
    private function copyAssets(Application $app)
    {
        $file = new Filesystem();
        $file->mirror($this->origin, $app['config']['plugin_html_realdir'].$this->target.'/assets');
    }

    /**
     * コピーしたリソースファイルなどを削除
     *
     * @param Application $app
     */
    private function removeAssets(Application $app)
    {
        $file = new Filesystem();
        $file->remove($app['config']['plugin_html_realdir'].$this->target);
    }
    
    /**
     * プラグインフォルダを削除
     *
     * @param Application $app
     */
    private function removePlugin(Application $app)
    {
        $file = new Filesystem();
        $file->remove(__DIR__);
    }

    // インストール時にマイグレーションの「up」メソッドを実行します
    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code']);
        // リソースファイルのコピー
        $this->copyAssets($app);
        //コアファイルのバックアップをとる
        $this->doBackupCore($app);
    }

    // アンインストール時にマイグレーションの「down」メソッドを実行します
    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code'], 0);
        // リソースファイルの削除
        $this->removeAssets($app);
        //プラグインで使用するコアファイルをプラグイン有効化前に戻す
        $this->doRevertCore($app);
        //プラグインフォルダを削除する
        $this->removePlugin($app);
    }

    // プラグイン有効時に、指定の処理 (ファイルのコピーなど) を実行できます。
    public function enable($config, $app)
    {
        //プラグインで使用するコアファイルを展開する前に
        //app/Plugin/AssortContent/backup配下に
        //コアファイルのバックアップをとる
        $this->doBackupCore($app);
        //プラグインで使用するコアファイルをsrc/Eccube配下に展開する
        $this->doReplaceCore($app);
    }
    
    // 対象のコアファイルをプラグインのbackupフォルダにコピーする
    private function doBackupCore($app) {
        $target_core_files = null;
        foreach($this->core_files as $file) {
            $file = str_replace(__DIR__.'/Eccube', '', $file);
            $target_core_files[] = $file;
        }
        //dump($target_core_files);
        foreach($target_core_files as $file) {
            $fs = new Filesystem();
            $fs->copy($app['config']['root_dir'].'/src/Eccube'.$file,
                $app['config']['plugin_realdir'].'/AssortContent/backup'.$file);
        }
    }
    
    // 対象のsrc/Eccube配下のコアファイルをプラグイン用に置き換える
    private function doReplaceCore($app) {
        $target_core_files = null;
        foreach($this->core_files as $file) {
            $file = str_replace(__DIR__.'/Eccube', '', $file);
            $target_core_files[] = $file;
        }
        //dump($target_core_files);
        foreach($target_core_files as $file) {
            $fs = new Filesystem();
            $fs->copy($app['config']['plugin_realdir'].'/AssortContent/Eccube'.$file,
                $app['config']['root_dir'].'/src/Eccube'.$file);
        }
    }
    
    // 対象のsrc/Eccube配下のコアファイルをプラグイン有効化前に戻す
    private function doRevertCore($app) {
        $target_core_files = null;
        foreach($this->core_files as $file) {
            $file = str_replace(__DIR__.'/Eccube', '', $file);
            $target_core_files[] = $file;
        }
        //dump($target_core_files);
        foreach($target_core_files as $file) {
            $fs = new Filesystem();
            $fs->copy($app['config']['plugin_realdir'].'/AssortContent/backup'.$file,
                $app['config']['root_dir'].'/src/Eccube'.$file);
        }
    }

    // プラグイン無効時に、指定の処理 ( ファイルの削除など ) を実行できます。
    public function disable($config, $app)
    {
        //プラグインで使用するコアファイルをプラグイン有効化前に戻す
        $this->doRevertCore($app);
    }

    // プラグインアップデート時に、指定の処理を実行できます。
    public function update($config, $app)
    {
        
    }
}