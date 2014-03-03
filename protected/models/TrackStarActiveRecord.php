<?php

abstract class TrackStarActiveRecord extends CActiveRecord {
    /**
     * Prepares create_time, create_user_id, update_time and
     * update_user_ id attributes before performing validation.
     */
    protected function beforeValidate() {
        if($this->isNewRecord) {
            $this->create_time = $this->update_time = new CDbExpression('NOW()');
            $this->create_user_id = $this->update_user_id = Yii::app()->user->id;
        } else {
            // $this->create_time=$this- >update_time=date( 'Y-m-d H:i:s', time() );
            $this->update_time = new CDbExpression('NOW()');
            $this->update_user_id = Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }
}

