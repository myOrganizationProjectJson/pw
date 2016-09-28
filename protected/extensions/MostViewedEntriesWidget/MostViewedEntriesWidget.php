<?php

class MostViewedEntriesWidget extends CWidget
{

    /**
     * @var string
     */
    public $title = 'Most Viewed';

    public function run()
    {
        // criteria for last entries
        $c = new CDbCriteria();
        $c->order = 't.viewCount DESC';
        /** @noinspection PhpUndefinedMethodInspection */
        $c->limit = Setting::model()->name(Setting::MOST_VIEWED_ENTRIES_WIDGET_COUNT)->find()->value;

        // get entries
        $models = Entry::model()->findAll($c);

        // render view
        $this->render('mostViewed', array('models' => $models));
    }
}
