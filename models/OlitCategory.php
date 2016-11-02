<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "olit_category".
 *
 * @property integer $id
 * @property integer $parentid
 * @property integer $posi
 * @property string $name
 * @property string $alt_name
 * @property string $icon
 * @property string $skin
 * @property string $descr
 * @property string $keywords
 * @property string $news_sort
 * @property string $news_msort
 * @property integer $news_number
 * @property string $short_tpl
 * @property string $full_tpl
 * @property string $metatitle
 * @property string $color
 */
class OlitCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'posi', 'news_number'], 'integer'],
            [['keywords'], 'required'],
            [['keywords'], 'string'],
            [['name', 'alt_name', 'skin'], 'string', 'max' => 50],
            [['icon', 'descr'], 'string', 'max' => 200],
            [['news_sort'], 'string', 'max' => 10],
            [['news_msort'], 'string', 'max' => 4],
            [['short_tpl', 'full_tpl'], 'string', 'max' => 40],
            [['metatitle'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'posi' => 'Posi',
            'name' => 'Name',
            'alt_name' => 'Alt Name',
            'icon' => 'Icon',
            'skin' => 'Skin',
            'descr' => 'Descr',
            'keywords' => 'Keywords',
            'news_sort' => 'News Sort',
            'news_msort' => 'News Msort',
            'news_number' => 'News Number',
            'short_tpl' => 'Short Tpl',
            'full_tpl' => 'Full Tpl',
            'metatitle' => 'Metatitle',
            'color' => 'Color',
        ];
    }
}
