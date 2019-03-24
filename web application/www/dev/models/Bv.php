<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bv".
 *
 * @property string $title
 * @property string $uri
 * @property string $year
 * @property string $publisher
 * @property string $type
 * @property string $subject
 * @property string $creator
 * @property string $author
 * @property string $score
 * @property string $same property
 */
class Bv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'uri', 'uri_can','year', 'publisher', 'type', 'author', 'score', 'r1', 'r2', 'r3', 'r4', 'required'],
            [['subject'], 'string'],
            [['title', 'uri', 'publisher', 'type', 'uri_can', 'r1',  'r3','author'], 'string', 'max' => 255],
            [['r2', 'r4'], 'string', 'max' => 1024],
            [['year', 'score', 'same property'], 'int', 'max' => 50],
        ]];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'uri' => 'Uri',
            'uri_can' => 'Uri_can',
            'year' => 'Year',
            'publisher' => 'Publisher',
            'type' => 'Type',
            'r1' => 'r1',
            'r2' => 'r2',
            'author' => 'Author',
            'score' => 'Score',
            'r3' => 'r3',
            'r4' => 'r4',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BvQuery(get_called_class());
    }
}
