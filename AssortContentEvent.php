<?php
namespace Plugin\AssortContent;

use Eccube\Event\EventArgs;
use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Entity\Product;
use Eccube\Event\TemplateEvent;
use Plugin\AssortContent\Entity\AssortContent;
use Plugin\AssortContent\Entity\AssortProductContent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class Assort
{
    public $name;
    public $image;
}

class AssortContentEvent
{
    
    /**
     * プラグインが追加するフォーム名
     */
     
    const ASSORT_CONTENT_PREFIX = 'plg_assort_';
    const ASSORT_COUNT = 12;        //アソートの種類数の上限
    const ASSORT_DISPLAY_COUNT = 6; //設定できるアソートの数
    
    const ASSORT_ENABLE_TAG = 'セット商品';
    
    const ASSORT_CONTENT_AREA_NAME1 = 'plg_assort_name1';
    const ASSORT_IMAGE_AREA_NAME1 = 'plg_assort_image1';
    
    const ASSORT_CONTENT_AREA_NAME2 = 'plg_assort_name2';
    const ASSORT_IMAGE_AREA_NAME2 = 'plg_assort_image2';
    
    const ASSORT_CONTENT_AREA_NAME3 = 'plg_assort_name3';
    const ASSORT_IMAGE_AREA_NAME3 = 'plg_assort_image3';
    
    const ASSORT_CONTENT_AREA_NAME4 = 'plg_assort_name4';
    const ASSORT_IMAGE_AREA_NAME4 = 'plg_assort_image4';
    
    const ASSORT_CONTENT_AREA_NAME5 = 'plg_assort_name5';
    const ASSORT_IMAGE_AREA_NAME5 = 'plg_assort_image5';
    
    const ASSORT_CONTENT_AREA_NAME6 = 'plg_assort_name6';
    const ASSORT_IMAGE_AREA_NAME6 = 'plg_assort_image6';
    
    const ASSORT_CONTENT_AREA_NAME7 = 'plg_assort_name7';
    const ASSORT_IMAGE_AREA_NAME7 = 'plg_assort_image7';
    
    const ASSORT_CONTENT_AREA_NAME8 = 'plg_assort_name8';
    const ASSORT_IMAGE_AREA_NAME8 = 'plg_assort_image8';
    
    const ASSORT_CONTENT_AREA_NAME9 = 'plg_assort_name9';
    const ASSORT_IMAGE_AREA_NAME9 = 'plg_assort_image9';
    
    const ASSORT_CONTENT_AREA_NAME10 = 'plg_assort_name10';
    const ASSORT_IMAGE_AREA_NAME10 = 'plg_assort_image10';
    
    const ASSORT_CONTENT_AREA_NAME11 = 'plg_assort_name11';
    const ASSORT_IMAGE_AREA_NAME11 = 'plg_assort_image11';
    
    const ASSORT_CONTENT_AREA_NAME12 = 'plg_assort_name12';
    const ASSORT_IMAGE_AREA_NAME12 = 'plg_assort_image12';
    
    /** @var \Eccube\Application $app */
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onAdminProductInit(EventArgs $event)
    {
        log_info('アソートレイアウト！');
        /** @var Product $Product */
        $Product = $event->getArgument('Product');
        //dump($event);
        $id = $Product->getId();
        //dump($id);
        
        $AssortContent = null;
        $AssortContents = null;
        $AssortProductContents = null;

        // IDの有無で登録か編集かを判断
        if ($id) {
            // 商品編集時はその商品IDにひもつくアソートIDの初期値を取得
            $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
           //dump($AssortProductContents);
            
            for($i = 0; $i < count($AssortProductContents); $i++) {
                $AssortContents[] = $this->app['assort_content.repository.assort_content']
                ->findBy(array('assort_id' => $AssortProductContents[$i]->getAssortId()))[0];
            }
        }
        
       //dump($AssortContents);

         // 商品新規登録またはアソートが未登録の場合
        //if (is_null($AssortContent)) {
        //    $AssortContent = new AssortContent(null, null);
        //}

        // フォームの追加
        /** @var FormInterface $builder */
        // FormBuildeの取得
        $builder = $event->getArgument('builder');
        // 項目の追加
        $builder
        ->add(
            self::ASSORT_CONTENT_AREA_NAME1,
            'text',
            array(
                'label' => 'アソート名1',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME1,
            'file',
            array(
                'label' => 'アソート画像1',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME2,
            'text',
            array(
                'label' => 'アソート名2',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME2,
            'file',
            array(
                'label' => 'アソート画像2',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME3,
            'text',
            array(
                'label' => 'アソート名3',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME3,
            'file',
            array(
                'label' => 'アソート画像3',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME4,
            'text',
            array(
                'label' => 'アソート名4',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME4,
            'file',
            array(
                'label' => 'アソート画像4',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME5,
            'text',
            array(
                'label' => 'アソート名5',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME5,
            'file',
            array(
                'label' => 'アソート画像5',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME6,
            'text',
            array(
                'label' => 'アソート名6',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME6,
            'file',
            array(
                'label' => 'アソート画像6',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME7,
            'text',
            array(
                'label' => 'アソート名7',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME7,
            'file',
            array(
                'label' => 'アソート画像7',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME8,
            'text',
            array(
                'label' => 'アソート名8',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME8,
            'file',
            array(
                'label' => 'アソート画像8',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME9,
            'text',
            array(
                'label' => 'アソート名9',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME9,
            'file',
            array(
                'label' => 'アソート画像9',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME10,
            'text',
            array(
                'label' => 'アソート名10',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME10,
            'file',
            array(
                'label' => 'アソート画像10',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME11,
            'text',
            array(
                'label' => 'アソート名11',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME11,
            'file',
            array(
                'label' => 'アソート画像11',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME12,
            'text',
            array(
                'label' => 'アソート名12',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME12,
            'file',
            array(
                'label' => 'アソート画像12',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ;

        // 初期値を設定
        //dump($builder);
        if(!empty($AssortContents)) {
            //$builder->get(self::ASSORT_CONTENT_AREA_NAME1)->setData($AssortContent->getName());
            //$builder->get(self::ASSORT_IMAGE_AREA_NAME1)->setData($AssortContent->getImageFileName());
            for($i = 1; $i < count($AssortContents) + 1; $i++) {
                $builder->get(self::ASSORT_CONTENT_PREFIX . 'name' . $i)->setData($AssortContents[$i-1]->getName());
                $builder->get(self::ASSORT_CONTENT_PREFIX . 'image' . $i)->setData($AssortContents[$i-1]->getImageFileName());
            }
            
        }
            
    }
    
    /**
     * 管理画面：商品登録画面で、登録処理を行う.
     *
     * @param EventArgs $event
     */
    public function onAdminProductEditComplete(EventArgs $event)
    {
        /** @var Application $app */
        $app = $this->app;
        /** @var Category $target_category */
        //$TargetCategory = $event->getArgument('TargetCategory');
        $Product = $event->getArgument('Product');
        /** @var FormInterface $form */
        $form = $event->getArgument('form');
        //dump($form);
        //dump($form[self::ASSORT_CONTENT_AREA_NAME1]);
        //dump($form[self::ASSORT_IMAGE_AREA_NAME1]);
        
        // 商品IDが渡ってこない場合何もせず終了
        $id = $Product->getId();
        if(is_null($id)) {
            log_info('product_id is nothing. exit.');
            return;
        }
        
        $images = null;
        $update_assorts = null;
        for($i = 1; $i < self::ASSORT_COUNT + 1; $i++) {
            $assort = new Assort();
            $assort->name = $form[self::ASSORT_CONTENT_PREFIX . 'name' . $i]->getData();
            //if($assort->name === null) continue;
            $assort->image = $form[self::ASSORT_CONTENT_PREFIX . 'image' . $i]->getData();
            //dump($assort);
            $update_assorts[] = $assort;
            //$images[$i] = $form[self::ASSORT_CONTENT_PREFIX . 'image' . $i]->getData();
        }
        //dump($images);
        //dump($update_assorts);
        
        if (!empty($update_assorts)) {
            //画像をアップロード
            foreach($update_assorts as $a){
                //ファイルフォーマット検証
                if(empty($a->image)) continue; //画像登録がなければスキップ
                $mimeType = $a->image[0]->getMimeType();
                if (0 !== strpos($mimeType, 'image')) {
                    throw new UnsupportedMediaTypeHttpException('ファイル形式が不正です');
                }
                $filename = $a->image[0]->getClientOriginalName();
                //$filename = date('mdHis') . '_' . $filename;
                $a->image[0]->move($app['config']['image_save_realdir'], $filename);
                //dump('uploaded! '. $filename);
            }
        }
        
        $AssortContent = null;
        $AssortProductContent = null;
        
        $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
                
        //dump($AssortProductContents);
        
        //if(!empty($AssortProductContents[0])) {
        $AssortContents = null;
        for ($i = 0; $i < count($AssortProductContents); $i++) {
            $AssortContents[] = $AssortProductContents[$i]->getAssortContent();
        }
        //dump($AssortContents);
        
        $currentCount = count($AssortContents);
       //dump($currentCount);
       //dump($update_assorts);
        for($i = 0; $i < count($update_assorts); $i++) {
            if ($currentCount > $i) {
                $imgFileName = null;
                if(!empty($update_assorts[$i]->image)) {
                    $imgFileName = $update_assorts[$i]->image[0]->getClientOriginalName();
                }
                $AssortContents[$i]->setName($update_assorts[$i]->name);
                if($imgFileName != null) $AssortContents[$i]->setImageFileName($imgFileName);
                // DB更新
                $app['orm.em']->persist($AssortContents[$i]);
                $app['orm.em']->flush($AssortContents[$i]);
                
                //dump($AssortContents[$i]);
                
                $AssortProductContents[$i]
                    ->setAssortContent($AssortContents[$i])
                    ->setAssortId($AssortContents[$i]->getId())
                    ->setProduct($Product)
                    ->setProductId($Product->getId());
                    
                //dump($AssortProductContent);
                // DB更新
                $app['orm.em']->persist($AssortProductContents[$i]);
                $app['orm.em']->flush($AssortProductContents[$i]);
            } else {
                //新規アソートの場合追加
                //dump($update_assorts[$i]);
                $imgFileName = null;
                if(!empty($update_assorts[$i]->image)) {
                    $imgFileName = $update_assorts[$i]->image[0]->getClientOriginalName();
                }
                $AssortContents[] = new AssortContent(
                        $update_assorts[$i]->name,
                        $imgFileName
                    );
                // DB更新
                $app['orm.em']->persist($AssortContents[$i]);
                $app['orm.em']->flush($AssortContents[$i]);
                
                //dump($AssortContents[$i]);
                
                $AssortProductContents[] = new AssortProductContent(
                        $AssortContents[$i],
                        $AssortContents[$i]->getId(),
                        $Product,
                        $Product->getId()
                    );
                //dump($AssortProductContents[$i]);
                // DB更新
                $app['orm.em']->persist($AssortProductContents[$i]);
                $app['orm.em']->flush($AssortProductContents[$i]);
            }
        }

    }

    /**
     * 商品登録画面にアソートの注意書きを表示する.
     *
     * @param TemplateEvent $event
     */
    public function onRenderAdminProductDetail(TemplateEvent $event)
    {
        //dump($event->getSource());
        
        $snipet = '<p class="assort_note" style="color: red">アソート機能を有効にするにはタグに「' . self::ASSORT_ENABLE_TAG . '」を指定してください</p>';
        $snipet .= '<p class="assort_note2" style="color: red">アソート名を空欄にするとそのアソートは削除されます</p>';
        $search = '<div class="extra-form">';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        //dump($source);
        $event->setSource($source);
    }
    
    /**
     * 商品画面にアソート画像を表示する.
     *
     * @param TemplateEvent $event
     */
    public function onRenderProductDetail(TemplateEvent $event)
    {
        //dump('商品画面レイアウト!twig表示！');
        /** @var Application $app */
        $app = $this->app;
        $parameters = $event->getParameters();
        
        //dump($parameters);
        $Product = $parameters["Product"];
        //dump($Product);

        //タグに「セット商品」が設定されているか確認
        $isAssortTag = false;
        $tag = $Product->getProductTag();
        foreach ($tag as $k => $val){
            if ($val->getTag() == self::ASSORT_ENABLE_TAG ) $isAssortTag = true;
        }
        //タグに「セット商品」が設定されてなければAssort機能は使わない
        if(!$isAssortTag) return;
        
        $id = $Product->getId();
        //dump($id);
        
        $AssortContents = null;
        $AssortProductContents = null;

        // IDの有無を念のためチェック
        if ($id) {
            // その商品IDにひもつくアソートIDを取得
            $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
            //dump($AssortProductContents);
            
            // その商品のアソート情報をすべて取得する
            for($i = 0; $i < count($AssortProductContents); $i++) {
                $AssortContents[] = $this->app['assort_content.repository.assort_content']
                ->findBy(array('assort_id' => $AssortProductContents[$i]->getAssortId()))[0];
            }
        }
        
        //dump($AssortContents);
        
        // 有効なアソートを取得する
        $validAssorts = null;
        foreach($AssortContents as $Assort) {
            if($Assort->getName() != null) {
                $validAssorts[] = $Assort;
            }
        }
        
        // 有効なアソートが一つもない場合 アソートのデータを追加せずreturn
        if(empty($validAssorts)) {
            return;
        }
        
        // twigコードにAssort機能に必要なcssを挿入
        $snipet = null;
        $snipet .= '{% block stylesheet %}
        <!-- for plg_assort theme Plugin-->
<link rel="stylesheet" href="{{ app.config.root }}plugin/AssortContent/assets/js/image-picker.css">
<link rel="stylesheet" href="{{ app.config.root }}plugin/AssortContent/assets/css/style.css">
{% endblock %}
';
        //$snipet = $app['twig']->getLoader()->getSource('AssortContent/Resource/template/css.twig');
        $search = '{% block javascript %}';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        //dump($source);
        $event->setSource($source);
        
        // twigコードに商品画像の上にアソートのオーバーレイエリアを挿入
        /* 下記のような形式
        $snipet = '<div id="selected_assort_image">'
                    . '<div id="assort1" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    . '<div id="assort2" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    . '<div id="assort3" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    . '<div id="assort4" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    . '<div id="assort5" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    . '<div id="assort6" style="background-image:url('
                    . "'{{ app.config.root }}upload/save_image/craft.png');". ' background-size: contain;' . ' "></div>'
                    .'</div>';
        */
        $snipet = '<div id="selected_assort_image">';
        // デフォルトは一つ目の有効なアソートを全て選択して表示
        for($i = 0; $i < self::ASSORT_DISPLAY_COUNT; $i++) {
            /*
            $snipet .= '<div id="assort' . $i+1 . '" style="background-image:url('
                    . "'{{ app.config.image_save_urlpath }}/"
                    . $AssortContents[0]->getImageFileName()
                    . "');"
                    . ' background-size: contain;'
                    . ' "></div>';
            */
            $snipet .= '<div id="assort';
            $snipet .= $i+1;
            $snipet .= '" style="background-image:url(';
            foreach($validAssorts as $Assort) {
                if($Assort->getName() != null) {
                    $snipet .= "'{{ app.config.image_save_urlpath }}/";
                    $snipet .= $Assort->getImageFileName();
                    break;
                }
            }
            $snipet .= "');";
            $snipet .= ' background-size: contain;';
            $snipet .= ' "></div>';
                    
        }
        $snipet .= '</div>';
        $search = '<div id="detail_image_box__item--{{ loop.index }}"><img src="{{ app.config.image_save_urlpath }}/{{ ProductImage|no_image_product }}"/>';
        $replace = $search.$snipet;
        $source = str_replace($search, $replace, $event->getSource());
        //dump($source);
        $event->setSource($source);
        
        // twigコードにアソート選択/商品キャプチャのjavascriptを挿入
        $snipet = null;
        $snipet = '{% block plg_assort_javascript %}
            <script src="{{ app.config.root }}plugin/AssortContent/assets/js/image-picker.js" type="text/javascript"></script>
            <script>
                $(document).ready(function () {
                    $(';
        $snipet .=  '"select.image-picker").imagepicker({
                        hide_select: true
                    });
                });
            </script>
            <script src="{{ app.config.root }}plugin/AssortContent/assets/js/sync-image.js" type="text/javascript"></script>
            <script src="{{ app.config.root }}plugin/AssortContent/assets/js/html2canvas.js"></script>
            <script src="{{ app.config.root }}plugin/AssortContent/assets/js/show-assort.js"></script>
            {% endblock %}';
        $search = '<p id="detail_description_box__item_range_code"';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
        
        // twigコードにアソート選択エリアを挿入
        $snipet = null;
        
        for($i = 0; $i < self::ASSORT_DISPLAY_COUNT; $i++) {
            $snipet .= '<div class="assort_select_box ';
            $snipet .= 'id_';
            $snipet .= $i+1;
            $snipet .= ' ">';
            $snipet .= '<p class="assort_label">アソート';
            $snipet .= $i+1;
            $snipet .= '</p>';
            $snipet .= '<select name="assort';
            $snipet .= $i+1;
            $snipet .= '" id="assort';
            $snipet .= $i+1;
            $snipet .= '" class="image-picker show-html">';
            foreach ($validAssorts as $AssortContent) {
                $snipet .= '<option data-img-src="{{ app.config.image_save_urlpath }}/';
                $snipet .= $AssortContent->getImageFileName();
                $snipet .= '" data-img-class="first" data-img-alt="';
                $snipet .= $AssortContent->getName();
                $snipet .= '" value="{{ app.config.image_save_urlpath }}/';
                $snipet .= $AssortContent->getImageFileName();
                $snipet .= '">';
                $snipet .= $AssortContent->getName();
                $snipet .= '</option>';
            }
            
            $snipet .= '</select>';
            $snipet .= '</div>';   
        }
        
        /* アソート選択エリアは下記のような内容
        $snipet = '
        <div class="assort_select_box">
                        <p class="assort_label">アソート1</p>
                        <select name="assort1" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                        </select>
                    </div>
                    <div class="assort_select_box">
                        <p class="assort_label">アソート2</p>
                        <select name="assort2" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                        </select>
                    </div>
                    <div class="assort_select_box">
                        <p class="assort_label">アソート3</p>
                        <select name="assort3" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                        </select>
                    </div>
                    <div class="assort_select_box">
                        <p class="assort_label">アソート4</p>
                        <select name="assort4" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                                    </select>
                    </div>
                    <div class="assort_select_box">
                        <p class="assort_label">アソート5</p>
                        <select name="assort5" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                            </select>
                    </div>
                    <div class="assort_select_box">
                        <p class="assort_label">アソート6</p>
                        <select name="assort6" class="image-picker show-html">
                            <option data-img-src="{{ app.config.root }}upload/save_image/craft.png" data-img-class="first" data-img-alt="クラフト" value="craft"">クラフト</option>
                            </select>
                    </div>';
        */
        
        $search = '<p id="detail_description_box__item_range_code"';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
        
        // twigパラメータにアソートコンテンツを追加
        $parameters['AssortContents'] = $validAssorts;
        $event->setParameters($parameters);
        //dump($parameters);
    }
    
    public function onProductInit(EventArgs $event)
    {
        //dump('商品詳細画面！');
        //dump($event);
        /** @var Product $Product */
        $Product = $event->getArgument('Product');
        //dump($event);
        //$id = $Product->getId();
        //タグに「セット商品」が設定されているか確認
        $isAssortTag = false;
        $tag = $Product->getProductTag();
        foreach ($tag as $k => $val){
            if ($val->getTag() == self::ASSORT_ENABLE_TAG ) $isAssortTag = true;
        }
        //タグに「セット商品」が設定されてなければAssort機能は使わない
        if(!$isAssortTag) return;

        // フォームの追加
        /** @var FormInterface $builder */
        // FormBuildeの取得
        $builder = $event->getArgument('builder');
        $builder
        ->add('assort1','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort2','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort3','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort4','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort5','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort6','hidden',
            array(
                'data' => null,
            )
        )
        ->add('assort_img','hidden',
            array(
                'data' => null,
            )
        );
            
    }
    
    public function onCartInitComplete(EventArgs $event)
    {
        //dump('カート画面！');
        //dump($event);
        /** @var FormInterface $form */
        //dump($event);
        /** @var Product $Product */
        //$Product = $event->getArgument('Product');
        //dump($event);
        //$id = $Product->getId();
            
    }
    
    /**
     * カート画面にアソート情報を表示する.
     *
     * @param TemplateEvent $event
     */
    public function onRenderCartIndex(TemplateEvent $event)
    {
        //dump('カート画面レイアウト!twig表示！');
        /** @var Application $app */
        $app = $this->app;
        $parameters = $event->getParameters();
        
        //dump($parameters);
        //$Product = $parameters["Product"];
    }
    
     /**
     * レジ画面にアソート情報を表示する.
     *
     * @param TemplateEvent $event
     */
    public function onRenderShoppingInit(TemplateEvent $event)
    {
        //dump('レジ画面表示！');
        /** @var Application $app */
        $app = $this->app;
        $parameters = $event->getParameters();
        
        //dump($parameters);
        //$Product = $parameters["Product"];
        /*
        foreach($parameters["AssortCartItems"] as $Item) {
            // Assortの商品があるかチェック
            if(!is_null($Item->getAssort1())) {
                // Assortの商品があればその表示箇所にアソート情報を追記する
                $id = $Item->getObject()->getProduct()->getId();
                $name = $Item->getObject()->getProduct()->getName();
                dump($id);
                dump($name);
                $snipet = '<br>'. $Item->getAssort1();
                $search = '[商品id:{{ orderDetail.Product.id }}] {{ orderDetail.productName }}';
                $replace = $search.$snipet;

                $source = str_replace($search, $replace, $event->getSource());
                $event->setSource($source);
            }
        }
        dump($event->getSource($source));
        */
        
        
        /* [商品id:xx] 商品名*/
    }
}