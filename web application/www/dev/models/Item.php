<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $title
 * @property string $uri
 * @property string $creator
 * @property string $year
 * @property string $publisiher
 * @property string $type
 * @property string $subject
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'uri', 'author', 'year', 'publisher', 'type'], 'required'],

            [['title', 'uri', 'author', 'publisher', 'type'], 'string', 'max' => 255],
            [['year'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'uri' => 'Uri',
            'author' => 'Author',
            'year' => 'Year',
            'publisher' => 'Publisher',
            'type' => 'Type',

        ];
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }
}
