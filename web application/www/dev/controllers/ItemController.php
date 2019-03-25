<?php

namespace dev\controllers;


use app\models\Bv;
use app\models\Item;
use yii\data\Pagination;
use Yii;

class ItemController extends Controller
{

    public function actionIndex($page = 1, $pageSize = 20)
    {
        $keyword = Yii::$app->request->get("keyword");
        $query = Item::find();
        if ($keyword) {
            $query->where(["like", "title", $keyword]);
        }

        $pagination = new Pagination();
        $pagination->pageSize = $pageSize;
        $pagination->totalCount = $query->count();

        $data = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return [
            "data" => $data,
            "pages" => [
                "page" => $page,
                "pageSize" => $pageSize,
                "total" => $pagination->totalCount
            ]
        ];
    }


    public function actionKeyword()
    {
        $keyword = Yii::$app->request->get('keyword');
        return Item::find()
            ->select(['title', 'uri'])
            ->where(["like", "title", $keyword])
            ->all();
    }

    public function actionResult($page = 1, $pageSize = 20)
    {
        $uri = Yii::$app->request->get('uri');
        $arr = explode('/', $uri);
        $bvKey = str_replace('>', '', end($arr));
        //link to query result

        $query = Bv::find()
            ->where(["like", 'uri', $bvKey]);
        $pagination = new Pagination();
        $pagination->pageSize = $pageSize;
        $pagination->totalCount = $query->count();

        $data = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy(["rank" => SORT_ASC])
            ->all();

        return [
            "data" => $data,
            "pages" => [
                "page" => $page,
                "pageSize" => $pageSize,
                "total" => $pagination->totalCount
            ]
        ];
    }

    public function actionRecommended()
    {
        //score 排序大到小
        $query = Bv::find();

        $query->orderBy(["rank" => SORT_ASC]);
        return $query->all();
    }

}