<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\File;
use \yii\web\UploadedFile;
use yii\helpers\Url;

class Agent extends ActiveRecord {

    /**
     *
     * @var UploadedFile
     */
    private $_uploaded_avatar_file;

    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%agents}}';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name', 'first_name', 'middle_name'], 'string', 'max' => 200],
            [['AvatarFile'], 'file', 'extensions' => 'gif, jpg, png']
        ];
    }

    public function scenarios() {
        return [
            'upload_avatar' => ['AvatarFile'],
        ];
    }

    public function afterSave($insert) {
        if ($this->_uploaded_avatar_file) {
            $file = $this->getAvatar();

            if (!$file->isNewRecord) {
                $file->delete();
            }
            $dir = "uploads/{$this->user_id}/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $path = $dir . 'avatar.' . $this->_uploaded_avatar_file->extension;

            if ($this->_uploaded_avatar_file->saveAs($path)) {
                $file = new File();
                $file->bind_id = $this->user_id;
                $file->filename = $this->_uploaded_avatar_file->name;
                $file->type = 'avatar';
                $file->path = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . $path;
                $file->url = Url::to("@web/{$path}");
                $file->save();
            }
        }
        return parent::beforeSave($insert);
    }

    /**
     * 
     * @return File
     */
    public function getAvatarFile() {
        return $this->_uploaded_avatar_file;
    }

    public function getAvatar() {
        $f = File::findOne(['bind_id' => $this->user_id, 'type' => 'avatar']);
        if (!$f)
            $f = new File ();
        return $f;
    }

    public function setAvatarFile(UploadedFile $file) {
        $this->_uploaded_avatar_file = $file;
    }

    public function addCity($city_id) {
        if (!$this->isNewRecord) {
            $db = Yii::$app->db;
            return $db->createCommand()
                            ->insert('{{%agent_cities}}', [
                                'agent_user_id' => $this->user_id,
                                'city_id' => $city_id,])
                            ->execute();
        }
    }

    //-=-=-=-=-=-=-=-=-
    public function getCompanies() {
        return $this->hasMany(Company::className(), ['user_id' => 'company_user_id'])->viaTable('{{%agent_companies}}', ['agent_user_id' => 'user_id']);
    }

    public function addCompany($company_id) {
        if (!$this->isNewRecord) {
            $company = (new \yii\db\Query())
                    ->select(['agent_user_id'])
                    ->from('{{%agent_companies}}')
                    ->where([
                        'agent_user_id' => $this->user_id,
                        'company_user_id' => $company_id])
                    ->one();
            if ($company)
                return false;
            $db = Yii::$app->db;
            return $db->createCommand()
                            ->insert('{{%agent_companies}}', [
                                'agent_user_id' => $this->user_id,
                                'company_user_id' => $company_id,])
                            ->execute();
        }
    }

    public function deleteCompany($company_user_id) {
        $db = Yii::$app->db;
        return $db->createCommand()
                        ->delete('{{%agent_companies}}', [
                            'agent_user_id' => $this->user_id,
                            'company_user_id' => $company_user_id])
                        ->execute();
    }

    //-=-=-=-=-=-=-=-=-
    public function getInsurances() {
        return $this->hasMany(Insurance::className(), ['id' => 'insurance_id'])->viaTable('{{%agent_insurances}}', ['agent_user_id' => 'user_id']);
    }

    public function addInsurance($insurance_id) {
        if (!$this->isNewRecord) {
            $db = Yii::$app->db;
            $insurance = (new \yii\db\Query())
                    ->select(['agent_user_id'])
                    ->from('{{%agent_insurances}}')
                    ->where([
                        'agent_user_id' => $this->user_id,
                        'insurance_id' => $insurance_id])
                    ->one();
            if ($insurance)
                return false;
            return $db->createCommand()
                            ->insert('{{%agent_insurances}}', [
                                'agent_user_id' => $this->user_id,
                                'insurance_id' => $insurance_id,])
                            ->execute();
        }
    }

    public function deleteInsurance($insurance_id) {
        $db = Yii::$app->db;
        return $db->createCommand()
                        ->delete('{{%agent_insurances}}', [
                            'agent_user_id' => $this->user_id,
                            'insurance_id' => $insurance_id])
                        ->execute();
    }

    public function addBranch($branch_id) {
        if (!$this->isNewRecord) {
            $db = Yii::$app->db;
            return $db->createCommand()
                            ->insert('{{%agent_branch}}', [
                                'agent_user_id' => $this->user_id,
                                'branch_id' => $branch_id])
                            ->execute();
        }
    }

    public function addAddress($city_id, $address, $lat, $lng) {
        if (!$this->isNewRecord) {
            $db = Yii::$app->db;
            return $db->createCommand()
                            ->insert('{{%agent_address}}', [
                                'agent_user_id' => $this->user_id,
                                'city_id' => $city_id,
                                'address' => $address,
                                'point' => new CDbExpression("GeomFromText('POINT(:lat :lng)')", array(':lat' => $lat, ':lng' => $lng))
                            ])
                            ->execute();
        }
    }

}
