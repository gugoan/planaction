<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property int $id
 * @property int $organization_id
 * @property string $name
 * @property int $user_owner
 * @property int $user_responsible
 * @property string $start_date
 * @property string $finish_date
 * @property int $status_id
 * @property string $observation
 * @property int $created
 * @property int $updated
 *
 * @property Organization $organization
 * @property Status $status
 */
class Action extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization_id', 'name', 'user_owner', 'user_responsible', 'start_date', 'finish_date', 'status_id', 'created', 'updated'], 'required'],
            [['organization_id', 'user_owner', 'user_responsible', 'status_id', 'created', 'updated'], 'integer'],
            [['start_date', 'finish_date'], 'safe'],
            [['observation'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'organization_id' => Yii::t('app', 'Organization ID'),
            'name' => Yii::t('app', 'Name'),
            'user_owner' => Yii::t('app', 'User Owner'),
            'user_responsible' => Yii::t('app', 'User Responsible'),
            'start_date' => Yii::t('app', 'Start Date'),
            'finish_date' => Yii::t('app', 'Finish Date'),
            'status_id' => Yii::t('app', 'Status ID'),
            'observation' => Yii::t('app', 'Observation'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
