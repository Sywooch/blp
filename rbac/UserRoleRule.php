<?php
namespace app\rbac;
 
use app\models\Rbac;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\rbac\Rule;
use Yii;
 
/**
 * Класс описывающий роль пользователя.
 */

class UserRoleRule extends Rule
{
    public $name = 'userRole';
 
    /**
     * Сравниваем текущую роль из сессии
     * с возможными ролями на сайте
     * @author Peskov Sergey
     * @date 26/09/2016
     * @return true/false
     */
    public function execute($user, $item, $params)
    {
            if(isset(Yii::$app->user->identity->user_group)){
                $role = (int) Yii::$app->user->identity->user_group;
            }else{
                $role = '';
                Yii::$app->user->logout();
            }
            
 
            if ($item->name === 'admin') {
                return $role === Rbac::ROLE_ADMIN;
            } elseif ($item->name === 'user') {
                return $role === Rbac::ROLE_ADMIN || $role === Rbac::ROLE_USER;
            } elseif ($item->name === 'company') {
                return $role === Rbac::ROLE_ADMIN || $role === Rbac::ROLE_COMPANY;
            } elseif ($item->name === 'agent') {
                return $role === Rbac::ROLE_ADMIN || $role === Rbac::ROLE_AGENT;
            } elseif ($item->name === 'expert') {
                return $role === Rbac::ROLE_ADMIN || $role === Rbac::ROLE_EXPERT;
            }
 
        return false;
    }
}