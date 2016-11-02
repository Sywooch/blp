<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "olit_insurance_rating".
 *
 * @property integer $rating_id
 * @property integer $company_id
 * @property integer $one_star
 * @property integer $two_star
 * @property integer $three_star
 * @property integer $four_star
 * @property integer $five_star
 * @property integer $count
 * @property double $average
 */
class InsuranceRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_insurance_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id', 'one_star', 'two_star', 'three_star', 'four_star', 'five_star', 'count'], 'integer'],
            [['average'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating_id' => 'Rating ID',
            'company_id' => 'Company ID',
            'one_star' => 'One Star',
            'two_star' => 'Two Star',
            'three_star' => 'Free Star',
            'four_star' => 'Four Star',
            'five_star' => 'Five Star',
            'count' => 'Count',
            'average' => 'Average',
        ];
    }
    
    /**     
     * Обновление рейтинга
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 19.09.2016
     * @param int $name Оценка, выставленная компании
     * @return boolean 
     */
    public function updateRating($mark)
    {
        $query = $this->findOne(['company_id'=>$this->company_id]);
        if(is_object($query)):
            switch ($mark):
                case 1: 
                    $query->updateCounters(['one_star'=>1, 'count'=>1]); break;
                case 2: 
                    $query->updateCounters(['two_star'=>1, 'count'=>1]); break;
                case 3: 
                    $query->updateCounters(['three_star'=>1, 'count'=>1]); break;
                case 4: 
                    $query->updateCounters(['four_star'=>1, 'count'=>1]); break;
                case 5: 
                    $query->updateCounters(['five_star'=>1, 'count'=>1]); break;
            endswitch;
            $query2 = new Query;
            $query->average = ($query->one_star*1+$query->two_star*2+$query->three_star*3+$query->four_star*4+$query->five_star*5)/($query->count);
            $query->save();
            else: 
                return false;
        endif;
                
    }
}
