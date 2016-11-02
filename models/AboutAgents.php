<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "olit_about_agents".
 *
 * @property integer $agent_id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $city
 * @property string $company
 * @property string $photo
 * @property string $phone
 */
class AboutAgents extends \yii\db\ActiveRecord
{
    const TOP_STATUS = 10;
    const DEF_STATUS = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_about_agents';
    }

    /**
     * @inheritdoc
     */
    
   
            
    public function rules()
    {
        return [
            //[['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['birthday'], 'required' , 'on' => 'reg'],
            [['agent_id', 'experience', 'status'], 'integer'],
            [['firstname', 'surname', 'patronymic',  'city', 'company',  'phone', 'photo', 'ins_type', 'gender'], 'string', 'on' => 'reg, searchindex'],
            
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'birthday' => 'Дата рождения',
            'agent_id' => 'Agent ID',
            'firstname' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'city' => 'Город',
            'company' => 'Компания',
            'photo' => 'Фото',
            'phone' => 'Телефон',
            'gender' => 'Пол',
            'status' => 'Топ статус',
            'ins_type' => 'Вид страховой деятельности',
        ];
    }
    /**
     * 
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 29.08.2016
     * @return void
     * 
     */
    public function beforeValidate() {
        
        if($this->birthday != '') $this->birthday = date('Y-m-d H:i:s', strtotime($this->birthday));        
        if(is_array($this->ins_type)) $this->ins_type = implode(",", $this->ins_type);
        if(is_array($this->company)) $this->company = implode(",", $this->company);
        return parent::beforeValidate();
        
    }

     /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * @return void
     * 
     */
    
    public function addAccount($user_id)
    {
        $this->agent_id = $user_id;        
        $this->save();
    }
   
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 31.08.2016
     * @return  Array данные для dropDownList HTML хелпера по умолчанию
     * @param array $arr 
     */
    public function selectedHtml($str)
    {
        $arr = explode("," , $str);
        foreach ($arr as $k => $v):
            $opt[$v] = ['selected'=>'selected'];
        endforeach;
        
        return $opt;
    }
    
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['photo'] = ['photo'];
        $scenarios['search'] = ['firstname', 'surname', 'patronymic', 'city', 'company', 'photo', 'ins_type', 'gender', 'status'];
        $scenarios['reg'] = ['firstname', 'surname', 'patronymic',  'city', 'company',  'phone',  'ins_type', 'gender', 'birthday'];
        $scenarios['indexsearch'] = ['firstname', 'surname', 'patronymic', 'city', 'company', 'photo', 'ins_type', 'gender', 'status', 'experience', 'birthday'];
        return $scenarios;
    }
    
    public function search()
    {
        $surname = \Yii::$app->request->get('surname');
        $firstname = \Yii::$app->request->get('firstname');
        $city = \Yii::$app->request->get('city');
        $company = \Yii::$app->request->get('company');
        $status = \Yii::$app->request->get('status');
        $photo = \Yii::$app->request->get('photo');
        $ins_type = \Yii::$app->request->get('ins_type');
        $agent_id = \Yii::$app->request->get('agent_id');
        $rows = AboutAgents::find();
        $rows->FilterWhere(['and', ['agent_id'=>$agent_id, 'surname'=>$surname, 'firstname'=>$firstname, 'city'=>$city, 'status'=>$status]]);
        $rows->FilterWhere(['or like', 'ins_type', $ins_type]);
        if($company[0]!='') $rows->andfilterWhere(['or like', 'company', $company]);
        if($photo) $rows->FilterWhere (['!=', 'photo', '']);
        
        return $rows;
    }
    
    
    
}
