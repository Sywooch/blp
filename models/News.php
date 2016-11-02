<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\Pagination;
use app\models\Myfunctions;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/**
 * Модель новосей
 * News model
 */
class News extends ActiveRecord {

    /** @var */
    public $image;

    /**
     *
     * @inheritdoc
     */
    public static function tableName() {
        return 'olit_post';
    }

    /**
     *
     * @inheritdoc
     */
    public function rules() {


        return [
            [['title', 'category', 'short_story', 'alt_name', 'date'], 'required', 'on' => 'add_post'],
            ['title', 'editorFilter', 'on' => 'add_post'],
            ['category', 'integer', 'on' => 'add_post'],
            [['short_story', 'full_story'], 'editorFilter', 'on' => 'add_post']
        ];
    }

    /**
     *
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'date',
            'title',
            'short_story',
            'full_story',
            'photo',
            'category',
            'alt_name',
            'xfields',
            'tags',
            'descr',
            'approve'
        ]);
    }

    /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['add_post'] = [
            'date',
            'title',
            'short_story',
            'full_story',
            'category',
            'alt_name',
            'xfields'
        ];
        return $scenarios;
    }


    /**
     * фильтрует значение поля, которое присылает редактор(оставлят некоторые теги)
     * @author Kovalchuk Alexander
     * @date 14.10.2015
     * 
     * @param string значение поля
     * @return string отфильтрованое значение 
     */
    public function editorFilter($attribute) {
        return addslashes(trim(strip_tags($this->$attribute, '<b><br/><br><ul><ol><i><u><li>')));
    }

    /**
     * @author Kovalchuk Alexander
     * @date 09/10/15
     * 
     * get meta info for one static page by id
     * получить мета-информация для статической страницы по ид
     * 
     * @param id id static page id
     * @param string $this->alt_name Альтернативное имя новости
     * 
     * @return array array contains info with title, keywords, and desctiption
     */
    public function getMetaInfo() {


        $sql_response = (new Query)
                ->select(['olit_post.metatitle',
                    'olit_post.descr',
                    'olit_post.keywords'])
                ->from('olit_post')
                ->andWhere(['olit_post.id' => $this->id, 'olit_post.alt_name' => $this->alt_name])
                ->one();
        return (!$sql_response) ? [
            'title' => '',
            'description' => '',
            'keywords' => ''
                ] : [
            'title' => $sql_response['metatitle'],
            'description' => $sql_response['descr'],
            'keywords' => $sql_response['keywords']
        ];
    }

    /**
     * @author Sergey Kulikov
     * @date 14.09.2015
     * 
     * @param int $this->id ИД новости
     * @param string $this->alt_name Альт.имя новости
     * 
     * @return array detail info about one new, list with related news
     */
    public function getDetail($id,$altname) {
        //$this->alt_name = HtmlPurifier::process(html_entity_decode($this->alt_name));
        $sql_response = (new Query)
                ->select(['olit_post.id',
                    'olit_post.title',
                    'olit_post.full_story',
                    'olit_post.short_story',
                    'olit_post.tags',
                    'olit_post.date',
                    'olit_post.descr',
                    'olit_post.keywords',
                    'olit_post.alt_name',
                    'olit_post.category AS category_id',
                    'olit_category.name AS category_name',
                    'olit_category.alt_name AS category_altname',
                    'olit_post.xfields',
                    'olit_post.photo',
                    'olit_post_extras.news_read AS count',
                    'olit_post.type as type'])
                ->from('olit_post')
                ->leftJoin('olit_category', 'olit_post.category = olit_category.id')
                ->leftJoin('olit_post_extras','olit_post_extras.news_id = olit_post.id')
                ->andWhere(['olit_post.id' => $id, 'olit_post.alt_name' => $altname, 'olit_post.approve' => 1])
                ->one();

        if (!$sql_response)
            return [
                'id' => 0,
                'title' => '',
                'full_story' => '',
                'short_story' => '',
                'date' => '',
                'category_id' => 0,
                'category_name' => '',
                'category_altname' => '',
                'image' => '',
                'type' => '',
                'tags' => '',
                'photo' => '',
                'alt_name' => ''
            ];

        $tags = [];
        if(isset($sql_response['tags']) && !empty($sql_response['tags'])){
            $tags_row = explode(',', $sql_response['tags']);
            
            foreach ($tags_row as $tag)
                $tags[trim($tag)] = '/news/tag/' . urlencode(trim($tag));            
        }

        /* ~~~~~~смотрим, если заполнено новое поле photos, то берем фото оттуда,
         * если нет, то со старого хранилища~~~~~~ */
        $photo = @json_decode($sql_response['photo'])->big;
        preg_match("/image-news\\|(.*)/", $sql_response['xfields'], $matches);
        $matches = isset($matches[1]) ? $matches[1] : '';
        $photo = isset($photo) ? $photo : $matches;


        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        return [
            'id' => (int) $sql_response['id'],
            'title' => $sql_response['title'],
            'full_story' => str_replace('\"', '"', $sql_response['full_story']),
            'short_story' => strip_tags(html_entity_decode(str_replace('\"', '"', $sql_response['short_story']))),
            'date' => Yii::$app->formatter->asDate($sql_response['date'], 'dd.MM.yyyy'),
            'category_id' => (int) $sql_response['category_id'],
            'category_name' => $sql_response['category_name'],
            'category_altname' => $sql_response['category_altname'],
            'image' => isset($photo) ? $photo : '',
            'type' => explode(",", $sql_response['type']),
            'tags' => $tags,
            'count' => $sql_response['count'],
            'photo' => $photo,
            'alt_name' => $sql_response['alt_name'],
            'description' => $sql_response['descr'],
            'keywords' => $sql_response['keywords']
        ];
    }

    /**
     * @author Sergey Kulikov
     * @date 14.09.2015
     * 
     * Возвращает список новостей
     * @param string $category_name
     * @param string $tag
     * @return array
     */
    public function getList($category_name = 'index', $tag = '', $limit = 0) {
        $querySumm = (new Query)
            ->select(['COUNT(olit_post.id) as count',
                'olit_category.alt_name'])
                ->from('olit_post')
                ->leftJoin('olit_category', 'olit_post.category = olit_category.id');
        $query = (new Query)
                ->select(['olit_post.id',
                    'olit_post.descr',
                    'olit_post.title',
                    'olit_post.date',
                    'olit_post.short_story',
                    'olit_post.alt_name',
                    'olit_post.category',
                    'olit_category.name',
                    'olit_category.color as category_color',
                    'olit_category.alt_name AS category_altname',
                    'olit_post.xfields',
                    'olit_post_extras.news_read AS count',
                    'olit_post.photo',])
                ->from('olit_post')
                ->leftJoin('olit_category', 'olit_post.category = olit_category.id')
                ->leftJoin('olit_post_extras','olit_post_extras.news_id = olit_post.id')
                ->andWhere(['olit_post.approve' => 1]);
        if ($category_name != 'index') {
            $category_name = strip_tags(HtmlPurifier::process(html_entity_decode($category_name)));
            $query->andWhere(['olit_category.alt_name' => $category_name]);
            $querySumm->andWhere(['olit_category.alt_name' => $category_name]);
        }
        if ($tag != '') {
            $tag = strip_tags(HtmlPurifier::process(html_entity_decode($tag)));
            $tag_encoded = $tag;
            $query->andWhere(['or like', 'olit_post.tags', [
                    $tag_encoded . ',%',
                    '%, ' . $tag_encoded . ',%',
                    '%,' . $tag_encoded,
                    $tag_encoded
                ], false]);
            $querySumm->andWhere(['or like', 'olit_post.tags', [
                    $tag_encoded . ',%',
                    '%, ' . $tag_encoded . ',%',
                    '%,' . $tag_encoded,
                    $tag_encoded
                ], false]);
        }

        $someArr = $querySumm->one();
        //print_r($someArr);
                //$querySumm->from('olit_post');
                //$querySumm->one();
        $query->addOrderBy(['id' => SORT_DESC]);
        //$countQuery = clone $query;
        //$pages = new Pagination(['totalCount' => count($countQuery->all()),'pageSize' => 20]);
        $pages = new Pagination(['totalCount' => $someArr['count'],'pageSize' => 20]);
        //print_r($pages);
        if ($limit != 0)
            $query->limit($limit);
        else
            //$query->limit($limit);
            $query->offset($pages->offset)->limit($pages->limit);
        $sql_response = $query->all();
        //$result = ['pages' => 1];
        $result = ['pages' => $pages];
        $result['tag'] = $tag;
        $result['news'] = [];
        $modelNews = new OlitPostExtras();
        foreach (is_null($sql_response) ? [] : $sql_response as $new) {
            $photo_type = 'small';
            $photo = @json_decode($new['photo'])->$photo_type;
            preg_match("/image-news\\|(.*)/", $new['xfields'], $matches);
            $matches = isset($matches[1]) ? $matches[1] : '';
            $photo = isset($photo) ? $photo : $matches;
            if (substr($photo, 0, 4) != 'http' && (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo) || $photo == '')) {
                $photo = '/images/news-main/' . $new['category'] . '.jpg';
                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo))
                    $photo = '/images/news-main/4.jpg';
            }
            //$count = $modelNews->getViewCount($new['id']);
            //$result['count'] = $countQuery->count();

            $stringLength = 125;
            $stringEncoding = 'UTF-8';
            $postfix = '...';
            $short_in = strip_tags($new['short_story']);
            if (mb_strlen($short_in, $stringEncoding) <= $stringLength) {
                $short_story = $short_in;
            }
         
            $tmp = mb_substr($short_in, 0, $stringLength, $stringEncoding);
            $short_story = mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $stringEncoding), $stringEncoding) . ' ' . $postfix;

            $url = Url::to(['news/detail', 'id' => (int) $new['id'],'cat'=>$new['category_altname'],'altname'=>$new['alt_name']]);
            $fullURL = Url::toRoute($url,true);

            $result['news'][] = [
                'count' => $new['count'],
                'id' => (int) $new['id'],
                'time' => date_format(date_create($new['date']), 'H:i'),
                'date' => Yii::$app->formatter->asDate($new['date'], 'dd.MM.yyyy'),
                //'time' => Yii::$app->formatter->asDate($new['date'], 'HH:mm'),
                'title' => $new['title'],
                'short_story' => str_replace('\"', '"', $short_story),
                'alt_name' => $new['alt_name'],
                'url' => $fullURL,
                'category_id' => (int) $new['category'],
                'category' => $new['name'],
                'category_altname' => $new['category_altname'],
                'category_color' => $new['category_color'],
                'descr' => str_replace('\"', '"', $new['descr']),
                'image' => isset($photo) ? $photo : ''
            ];
        }
        return $result;
    }

    /**
     * 
     * @author Sergey Kulikov
     * @date 14.09.2015
     * 
     * Возвращает список новостей для доп.блоков
     * @param string $category_name имя категории
     * @param int $limit количество новостей
     * @param string $page тип страницы для которой генерятся новости 'main', 'innews'
     * @param int $exclude_new_id Исключить ИД
     * @return array
     */
    public function getLastNews($category_name = 'index', $limit = 8, $page = 'main', $current_new = ['id' => 0], $only_this_category = true) {
        $query = (new Query)
                ->select(['olit_post.id',
                    'olit_post.xfields',
                    'olit_post.photo',
                    'olit_post.title',
                    'olit_post.date',
                    'olit_post.short_story',
                    'olit_post.full_story',
                    'olit_post.alt_name',
                    'olit_post.category AS category',
                    'olit_category.name AS category_name',
                    'olit_post_extras.news_read AS count',
                    'olit_category.alt_name AS category_altname'])
                ->from('olit_post')
                ->leftJoin($only_this_category ? 'olit_category' : 'olit_category', 'olit_post.category = olit_category.id')
                ->leftJoin('olit_post_extras','olit_post_extras.news_id = olit_post.id')
                ->where(['olit_post.approve' => 1])
                ->andWhere(['>','olit_post_extras.news_read','0'])
                ->andWhere(['!=', 'olit_post.id', $current_new['id']]);
        if ($current_new['id'] != 0 && isset($current_new['category_id']) && $only_this_category)
            $query->andWhere(['olit_post.category' => $current_new['category_id']]);
        if ($category_name != 'index')
            $query->andWhere(['olit_category.alt_name' => $category_name]);
        $query->addOrderBy(['id' => SORT_DESC]);
        $query->limit($limit);
        $sql_response = $query->all();
        $result = [];
        //$modelNews = new OlitPostExtras();
        foreach (is_null($sql_response) ? [] : $sql_response as $new) {

            /* ~~~~~~смотрим, если заполнено новое поле photos, то берем фото оттуда,
             * если нет, то со старого хранилища~~~~~~ */
            $photo_type = $page == 'main' ? 'small' : 'innews';
            $photo = @json_decode($new['photo'])->$photo_type;
            preg_match("/image-news\\|(.*)/", $new['xfields'], $matches);
            if (!isset($matches[1])) {
                $matches[1] = '/images/news-main/' . $new['category'] . '.jpg';
            }
            $matches = isset($matches[1]) ? $matches[1] : '';
            $photo = isset($photo) ? $photo : $matches;
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
         
           //Кол-во просмотров новости
 
            //$count = $modelNews->getViewCount($new['id']);
     
            $result[] = [
                'count' => $new['count'],
                'id' => $new['id'],
                'date' => Yii::$app->formatter->asDate($new['date'], 'dd.MM.yyyy'),
                'title' => strip_tags($new['title']),
                'category' => $new['category_name'],
                'url' => '/news/' . $new['category_altname'] . '/' . $new['id'] . '-' . $new['alt_name'] . '.html',
                'image' => isset($photo) ? $photo : '',
                'short_story' => strip_tags($new['short_story'], '<b><u><i><li><ul><il>'),
                'full_text' => strip_tags($new['full_story'], '<b><u><i><li><ul><il>'),
                'alt_name' => $new['alt_name'],
                'category_altname' => $new['category_altname'],
                'category_id' => $new['category']
            ];
        }
        return $result;
    }

    /**
     * получаем имена (названия) категорий
     * @author Sergey Kulikov
     * @date 14.09.2015
     * 
     * @return array get name of categories
     */
    public function getCategories($ids = null) {
        $query = (new Query)
                ->select(['name', 'id', 'color', 'alt_name'])
                ->from('olit_category');
        if ($ids) {
            $query->where(['id' => $ids]);
            $query->orderBy([new \yii\db\Expression('FIELD (id, ' . implode(',', $ids) . ')')]);
        }

        $sql_response = $query->all();
        $result = [];
        foreach (is_null($sql_response) ? [] : $sql_response as $cat) {
            $result[] = [
                'id' => (int) $cat['id'],
                'name' => $cat['name'],
                'color' => $cat['color'],
                'alt_name' => $cat['alt_name'],
            ];
        }
        return $result;
    }

    /**
     * Готовая функция перевода в транслит
     * @param string $st
     * @return string
     */
    public function encodestring($st) {
        // Сначала заменяем "односимвольные" фонемы.
        $st = strtr($st, "абвгдеёзийклмнопрстуфхъыэ_", "abvgdeeziyklmnoprstufh'iei");
        $st = strtr($st, "АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_", "ABVGDEEZIYKLMNOPRSTUFH'IEI");
        // Затем - "многосимвольные".
        $st = strtr($st, array(
            "ж" => "zh", "ц" => "ts", "ч" => "ch", "ш" => "sh",
            "щ" => "shch", "ь" => "", "ю" => "yu", "я" => "ya",
            "Ж" => "ZH", "Ц" => "TS", "Ч" => "CH", "Ш" => "SH",
            "Щ" => "SHCH", "Ь" => "", "Ю" => "YU", "Я" => "YA",
            "ї" => "i", "Ї" => "Yi", "є" => "ie", "Є" => "Ye"
                )
        );
        // Возвращаем результат.
        return $st;
    }

    /**
     *
     * @interhitdoc
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $this->title = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->title)));
        $this->category = (int) HtmlPurifier::process(htmlspecialchars_decode($this->category));
        $this->short_story = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->short_story)), '<b><i><u><li><ul><il>');
        $this->full_story = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->full_story)), '<b><i><u><li><ul><il>');
        $this->xfields = 'image-news|' . HtmlPurifier::process(htmlspecialchars_decode($this->image));
        $this->tags = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->tags)), '<b><i><u><li><ul><il>');
        $this->alt_name = strip_tags($this->encodestring(HtmlPurifier::process(htmlspecialchars_decode($this->alt_name))), '<b><i><u><li><ul><il>');

        return true;
    }

    /**
     * Пользователь добавляет новость (которую потом дожен подтвердить админ т.к.
     * aprrove по дефолту = 0)
     * 
     * @return type
     */
    public function AddPost() {
        $this->approve = 0;
        return $this->save();
    }

    /**
     * получить похожие новости для отображения на статической странице
     * (по признаку категория)
     * 
     * @author Sergey Kulikov
     * @date 14.09.2015
     * 
     * @param int $category
     * @return string
     */
    public function getListForStatic($category) {
        if ($category == 0)
            return [];
        $query = new Query;
        $res = $query->select(['post.date date',
                    'post.id id',
                    'post.photo',
                    'post.xfields',
                    'post.alt_name',
                    'post.title',
                    'post.short_story',
                    'category.name AS category_name',
                    'category.alt_name category'])
                ->from('olit_post post')
                ->leftJoin('olit_category category', 'post.category = category.id')
                ->andWhere('`type` LIKE "%' . $category . '%"')
                ->andWhere(['approve' => 1])
                ->addOrderBy(['id' => SORT_DESC])
                ->limit(4)
                ->all();
        $result = [];
        $modelNews = new OlitPostExtras();
        foreach (is_null($res) ? [] : $res as $new) {

            /* ~~~~~~смотрим, если заполнено новое поле photos, то берем фото оттуда,
             * если нет, то со старого хранилища~~~~~~ */
            //$photo_type = 'small';
            $photo = @json_decode($new['photo'])->small;
            preg_match("/image-news\\|(.*)/", $new['xfields'], $matches);
            if (!isset($matches[1])) {
                $matches[1] = '/images/news-main/' . $new['category'] . '.jpg';
            }
            $matches = isset($matches[1]) ? $matches[1] : '';
            $photo = isset($photo) ? $photo : $matches;
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

            $count = $modelNews->getViewCount($new['id']);
            $result[] = [
                'count' => $count,
                'date' => Yii::$app->formatter->asDate($new['date'], 'dd.MM.yyyy'),
                'title' => $new['title'],
                'image' => $photo,
                'category' => $new['category_name'],
                'category_altname' => $new['category'],
                'short_story' => $new['short_story'],
                'url' => '/news/' . $new['category'] . '/' . $new['id'] . '-' . $new['alt_name'] . '.html'
            ];
        }
        return $result;
    }

    /**
     * Возвращает список новостей для доп.блоков
     * @param string $category_name
     * @param int $limit
     * @return array
     */
    public function getRssNews($category_name = 'index', $limit = 8) {
        $query = (new Query)
                ->select(['olit_post.id',
                    'olit_post.xfields',
                    'olit_post.title',
                    'olit_post.date',
                    'olit_post.short_story',
                    'olit_post.full_story',
                    'olit_post.alt_name',
                    'olit_post.category AS category',
                    'olit_category.name AS category_name',
                    'olit_category.alt_name AS category_altname'])
                ->from('olit_post')
                ->leftJoin('olit_category', 'olit_post.category = olit_category.id');
        if ($category_name != 'index')
            $query->andWhere(['olit_category.alt_name' => $category_name, 'olit_post.approve' => 1]);
        $query->addOrderBy(['id' => SORT_DESC]);
        $query->limit($limit);
        $sql_response = $query->all();
        $result = [];
        foreach (is_null($sql_response) ? [] : $sql_response as $new) {
            preg_match("/image-news\\|(.*)/", $new['xfields'], $matches);
            if (!isset($matches[1])) {
                $matches[1] = 'http://711.ru/images/news-main/' . $new['category'] . '.jpg';
            }
            preg_match("/^http/", $matches[1], $full_url);
            $fullUrl = !isset($full_url[0]) ? 'http://711.ru' : '';
            $result[] = [
                'date' => date_format(date_create($new['date']), DATE_RFC2822),
                'title' => $new['title'],
                'category' => $new['category_name'],
                'url' => '/news/' . $new['category_altname'] . '/' . $new['id'] . '-' . $new['alt_name'] . '.html',
                'image' => isset($matches[1]) ? $matches[1] : '',
                'short_story' => htmlspecialchars((stripcslashes(strip_tags($new['short_story'])))),
                'full_story' => htmlspecialchars((stripcslashes(strip_tags($new['full_story']))))
            ];
        }
        return $result;
    }


    /**
    * @author Peskov Sergey
    * @date 20.09.2016
    * Переписан запрос обновления счетчика просмотров
    * так как такой подход делает всего одно обращение к базе
    * штатные срдества Yii2 делают лишние запросы
    * @param $newsId - идентификатор новости, $count - счетчик обработанный в котролере +1
    * @return true запись в БД
    */
    public function setViewCountNews($newsId , $count){
        Yii::$app->db->createCommand("UPDATE olit_post_extras SET news_read=:count WHERE news_id=:id")
        ->bindValues([':id' => $newsId,':count'=>$count])
        ->execute();
    }   

}
