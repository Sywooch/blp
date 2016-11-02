<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\rbac\PhpManager;
use \app\rbac\UserGroupRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll();
 
        // Создаем роли
        $guest  = $authManager->createRole('guest');
        $client  = $authManager->createRole('client');
        $agent = $authManager->createRole('agent');
        $admin  = $authManager->createRole('admin');
 
        // Создаем права
        //client quest
        $index  = $authManager->createPermission('index');
        $SearchAgents  = $authManager->createPermission('searchagents');
        $AgentInfo = $authManager->createPermission('agentinfo');
        //client
        $SendOrder  = $authManager->createPermission('sendorder');
        $AddRewiev = $authManager->createPermission('addrewiev');
        //agent
        $AddInfo  = $authManager->createPermission('addinfo');
        $CommentOrder   = $authManager->createPermission('commentorder');
        $CommentRewiew = $authManager->createPermission('commentreview');
        //admin
        $ShowAgents = $authManager->createPermission('showagents');
        $AddAgents = $authManager->createPermission('addagents');
 
        //Добавляем права
        $authManager->add($index);
        $authManager->add($SearchAgents);
        $authManager->add($AgentInfo);
        $authManager->add($SendOrder);
        $authManager->add($AddRewiev);
        $authManager->add($AddInfo);
        $authManager->add($CommentOrder);
        $authManager->add($CommentRewiew);
        $authManager->add($ShowAgents);
        $authManager->add($AddAgents);
        
 
 
        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);
 
        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $client->ruleName  = $userGroupRule->name;
        $agent->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;
 
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($client);
        $authManager->add($agent);
        $authManager->add($admin);
 
        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $SearchAgents);
        $authManager->addChild($guest, $AgentInfo);
        
 
        // client
        $authManager->addChild($client, $SendOrder);
        $authManager->addChild($client, $AddRewiev);
        $authManager->addChild($client, $guest);
 
        // agent
        $authManager->addChild($agent, $AddInfo);
        $authManager->addChild($agent, $CommentOrder);
        $authManager->addChild($agent, $CommentRewiew);
        $authManager->addChild($agent, $guest);
 
        // Admin
        $authManager->addChild($admin, $client);
        $authManager->addChild($admin, $agent);
        $authManager->addChild($admin, $ShowAgents);
        $authManager->addChild($admin, $AddAgents);
    }
}


