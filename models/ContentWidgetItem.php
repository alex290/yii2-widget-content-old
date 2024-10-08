<?php

namespace alex290\widgetContentOld\models;

use Yii;

/**
 * This is the model class for table "content_widget_item".
 *
 * @property int $id
 * @property int $contentId
 * @property string|null $data
 *
 * @property ContentWidget $content
 */
class ContentWidgetItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_widget_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contentId'], 'required'],
            [['contentId'], 'integer'],
            [['data'], 'safe'],
            [['contentId'], 'exist', 'skipOnError' => true, 'targetClass' => ContentWidget::className(), 'targetAttribute' => ['contentId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contentId' => 'Content ID',
            'data' => 'Data',
        ];
    }

    /**
     * Gets query for [[Content]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(ContentWidget::className(), ['id' => 'contentId']);
    }
}
